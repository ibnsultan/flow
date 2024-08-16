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

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{__('Language')}}</th>
                                                <th class="text-center">{{__('Code')}}</th>
                                                <th class="text-center">{{__('Layout')}}</th>
                                                <th class="text-center">{{__('Status')}}</th>
                                                <th class="text-end">{{__('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($languages as $language)
                                                <tr>
                                                    <td>{{ $language->name }}</td>
                                                    <td class="text-center">{{ strtoupper($language->iso) }}</td>
                                                    <td class="text-center cursor-pointer"
                                                        onclick="changeLangLayout('{{ \App\Helpers\Helpers::encode($language->id) }}')">
                                                        {{ strtoupper($language->layout) }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if($language->status == 'active')
                                                            <span class="badge bg-success cursor-pointer" 
                                                                onclick="changeLangStatus('{{ \App\Helpers\Helpers::encode($language->id) }}')">
                                                                {{__('Active')}}
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger cursor-pointer" 
                                                                onclick="changeLangStatus('{{ \App\Helpers\Helpers::encode($language->id) }}')">
                                                                {{__('Inactive')}}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="/admin/translation/language/{{ \App\Helpers\Helpers::encode($language->id) }}" 
                                                            class="btn btn-primary rounded btn-sm">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <div class="text-center">
                                    {{__('No languages found')}}
                                </div>
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
                        url: '/admin/translation/layout',
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
                title: 'Select Status',
                input: 'select',
                inputOptions: { 'active': 'Active', 'inactive': 'Inactive' },
                inputAttributes: { autocapitalize: 'off' },
                showCancelButton: true,
                confirmButtonText: 'Update',
                showLoaderOnConfirm: true,
                preConfirm: (status) => {
                    $.ajax({
                        url: '/admin/translation/status',
                        method: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            status: status
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({ title: 'Success', text: 'Language status updated successfully.', icon: 'success' }).then(() => {
                                    $(`td[onclick="changeLangStatus('${id}']`).html(status == 'active' ? '<span class="badge bg-success cursor-pointer" onclick="changeLangStatus(\''+id+'\')">Active</span>' : '<span class="badge bg-danger cursor-pointer" onclick="changeLangStatus(\''+id+'\')">Inactive</span>');
                                });
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