@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-4 position-relative">
                            <h5>
                                {{__('Languages & Translations')}}
                            </h5>
                            <input class="form-control w-25 position-absolute" 
                                style="top:0.8rem;right:2rem;" id="languageSearch" placeholder="{{__('Search Language')}}"/>
             
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(count($languages))
                                @include('admin.translation.tables.list')
                            @else
                                @include('layouts.admin.empty')
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

@endsection
@section('scripts')

    <script>
    
        // on search
        $('#languageSearch').on('keyup', function() {
            let search = $(this).val().toLowerCase();
            $('table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1)
            });
        });

        // on language options modal
        function changeLangLayout(id){
            Swal.fire({
                title: 'Select Layout',
                input: 'select',
                inputOptions: { 'ltr': 'LTR', 'rtl': 'RTL' },
                inputAttributes: { autocapitalize: 'off' },
                showCancelButton: true,
                confirmButtonText: 'Update',
                showLoaderOnConfirm: true,
                preConfirm: (layout) => {
                    $.ajax({
                        url: "{{ route('language.layout') }}",
                        method: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            layout: layout
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({ title: 'Success', text: 'Language layout updated successfully.', icon: 'success' }).then(() => {
                                    $(`td[onclick="changeLangLayout('${id}']`).html(layout.toUpperCase());
                                });
                            }else{
                                Swal.fire({ title: 'Error', text: 'An error occurred. Please try again.', icon: 'error' });
                            }
                        }
                    });
                }
            });
        }

        function changeLangStatus(id){
            Swal.fire({
                title: "{{ __('Are you sure?') }}",
                text: "{{ __('Do you want to change the language status?') }}",
                showCancelButton: true,
                confirmButtonText: "{{ __('Confirm') }}",
                showLoaderOnConfirm: true,
                preConfirm: (status) => {
                    $.ajax({
                        url: "{{ route('language.status') }}",
                        method: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                toast.success({ message: "{{ __('Language status updated successfully.') }}", position: 'bottom-center' });
                                setInterval(() => {
                                    location.reload();
                                }, 1000);
                            }else{
                                Swal.fire({ title: 'Error', text: 'An error occurred. Please try again.', icon: 'error' });
                            }
                        }
                    });
                }
            });
        }
        

    </script>

@endsection 