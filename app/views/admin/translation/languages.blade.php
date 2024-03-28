@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-4 position-relative">
                            <h5>
                                {{_('Languages & Translations')}}
                            </h5>
                            <input class="form-control w-25 position-absolute" 
                                style="top:0.8rem;right:2rem;" id="languageSearch" placeholder="{{_('Search Language')}}"/>
             
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
                                                <th>{{_('Language')}}</th>
                                                <th class="text-center">{{_('Code')}}</th>
                                                <th class="text-center">{{_('Layout')}}</th>
                                                <th class="text-center">{{_('Status')}}</th>
                                                <th class="text-end">{{_('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($languages as $language)
                                                <tr>
                                                    <td>{{ $language->name }}</td>
                                                    <td class="text-center">{{ strtoupper($language->iso) }}</td>
                                                    <td class="text-center cursor-pointer"
                                                        onclick="swalLangLayout('{{ \App\Helpers\Helpers::encode($language->id) }}')">
                                                        {{ strtoupper($language->layout) }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if($language->status == 'active')
                                                            <span class="badge bg-success cursor-pointer" 
                                                                onclick="swalLangStatus('{{ \App\Helpers\Helpers::encode($language->id) }}')">
                                                                {{_('Active')}}
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger cursor-pointer" 
                                                                onclick="swalLangStatus('{{ \App\Helpers\Helpers::encode($language->id) }}')">
                                                                {{_('Inactive')}}
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
                                    {{_('No languages found')}}
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
        function swalLangLayout(id){
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
                            id: id,
                            layout: layout
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({ title: 'Success', text: 'Language layout updated successfully.', icon: 'success' }).then(() => {
                                    $(`td[onclick="swalLangLayout('${id}']`).html(layout.toUpperCase());
                                });
                            }else{
                                Swal.fire({ title: 'Error', text: 'An error occurred. Please try again.', icon: 'error' });
                            }
                        }
                    });
                }
            });
        }

        function swalLangStatus(id){
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
                            id: id,
                            status: status
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                Swal.fire({ title: 'Success', text: 'Language status updated successfully.', icon: 'success' }).then(() => {
                                    $(`td[onclick="swalLangStatus('${id}']`).html(status == 'active' ? '<span class="badge bg-success cursor-pointer" onclick="swalLangStatus(\''+id+'\')">Active</span>' : '<span class="badge bg-danger cursor-pointer" onclick="swalLangStatus(\''+id+'\')">Inactive</span>');
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