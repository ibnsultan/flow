@extends('layouts.admin')	
@section('content')
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 position-relative">
                            <h5>
                                {{ __($title) }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    @if($addRolePermission->status)
                        <a class="btn btn-primary rounded text-white"
                            data-bs-toggle="modal" data-bs-target="#addNewUserRole">
                            {{__('Create New Role')}}
                        </a>
                    @endif
                    @if($addPermissionPermission->status)
                        <a class="btn btn-warning rounded text-white"
                            data-bs-toggle="modal" data-bs-target="#addNewRolePermission">
                            {{__('Add New Permission')}}
                        </a>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        @if($roles->count() > 0)
                            @foreach($roles as $role)
                                <div class="card">
                                    <div class="card-body position-relative">
                                        <h5> {{ $role->description }} </h5>
                                        <div class="position-absolute end-20 top-20">
                                            <button class="btn btn-light list-permissions" data-role-id="{{$role->id}}" data-role="{{$role->name}}" type="button">
                                                <i class="fa-duotone fa-person-military-pointing"></i> &nbsp; {{ __('Permissions') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="d-grid align-items-center w-100">
                                <div class="text-center">
                                    <p><i class="bi bi-exclamation-triangle text-warning alert-icon"></i></p>
                                    <p> {{__('No Records Found')}} </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- modal: new user role -->
    @if($addPermissionPermission->status)
        <div class="modal fade" id="addNewRolePermission" tabindex="-1" aria-labelledby="addNewRolePermissionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewRolePermissionLabel"> {{__('Add New Role Permission')}} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.access.forms.add-role-permission')
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- add new user role -->
    @if($addRolePermission->status)
        <div class="modal fade" id="addNewUserRole" tabindex="-1" aria-labelledby="addNewUserRoleLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewUserRoleLabel"> {{__('Add New User Role')}} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.access.forms.add-user-role')
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- permissions offcanvas -->
    <div class="offcanvas offcanvas-end min-w75" tabindex="-1" id="offcanvasPermissions" aria-labelledby="offcanvasPermissionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasPermissionsLabel"> {{__('Permissions')}} </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- permissions list -->
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // search modules
            $('select[name="module"]').select2({
                placeholder: "{{__('Select Module')}}",
                allowClear: true
            });

            // list permissions
            $('.list-permissions').click(function() {
                
                var role = $(this).data('role');
                buttonState('.list-permissions', 'loading');

                var url = `/admin/access/permissions/list/${role}`;
                $.get(url, function(response) {
                    if(response.status === 'success') {
                        buttonState('.list-permissions', 'reset', '<i class="fa fa-key"></i> &nbsp; {{ __('Permissions') }}');
                        $('#offcanvasPermissions .offcanvas-body').html(response.data);
                        $('#offcanvasPermissions').offcanvas('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                        buttonState('.list-permissions', 'reset', '<i class="fa fa-key"></i> &nbsp; {{ __('Permissions') }}');
                    }

                });
            });

            // add new role permission
            @if($addPermissionPermission->status)
                $('#formAddRolePermission').submit(function(e) {
                    e.preventDefault();
                    buttonState('#btnAddPermission', 'loading');

                    var url = "/admin/access/permissions/add";
                    var data = $(this).serialize();
                    $.post(url, data, function(response) {
                        if(response.status === 'success') {
                            buttonState('#btnAddPermission', 'reset', 'Save');
                            iziToast.success({
                                message: response.message,
                                position: 'bottomCenter'
                            });
                            setTimeout(function() {
                                $('#formAddRolePermission').trigger('reset');
                                $('select[name="module"]').val(null).trigger('change');
                            }, 1000);
                        } else {
                            iziToast.error({
                                message: response.message,
                                position: 'bottomCenter'
                            });
                            buttonState('#btnAddPermission', 'reset', 'Save');
                        }
                    });
                });
            @endif

            // add new user role
            @if($addRolePermission->status)
                $('#formAddUserRole').submit(function(e) {
                    e.preventDefault();
                    buttonState('#btnAddUserRole', 'loading');

                    var url = "/admin/access/roles/add";
                    var data = $(this).serialize();
                    $.post(url, data, function(response) {
                        if(response.status === 'success') {
                            buttonState('#btnAddUserRole', 'reset', 'Create Role');
                            toast.success({ message: response.message, position: 'bottomCenter' });
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {
                            toast.error({ message: response.message, position: 'bottomCenter' });
                            buttonState('#btnAddUserRole', 'reset', 'Create Role');
                        }
                    });
                });
            @endif
        });
    </script>
@endsection