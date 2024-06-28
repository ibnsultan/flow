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
                            @php $add_permission = $permission::can('setting', 'add_permission'); @endphp
                            @if($add_permission->status)
                            <a class="btn btn-primary rounded text-white position-absolute" style="top:0.8rem;right:2rem;"
                                data-bs-toggle="modal" data-bs-target="#addNewRolePermission">
                                {{__('Add New')}}
                            </a>
                            @endif
                        </div>
                    </div>
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
    @if($add_permission->status)
    <div class="modal fade" id="addNewRolePermission" tabindex="-1" aria-labelledby="addNewRolePermissionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewRolePermissionLabel"> {{__('Add New Role Permission')}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="addNewRolePermission" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"> {{__('Permission Name')}} </label>
                                    <input type="text" name="permission" class="form-control" placeholder="modify_user_permissions" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"> {{__('Description')}} </label>
                                    <textarea name="description" class="form-control" placeholder="Allow User Role Modifification" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"> {{__('Module')}} </label>
                                    <select name="module" class="form-select" required>
                                        <option value=""> {{__('Select Module')}} </option>
                                        @foreach ($modules as $module)
                                            <option value="{{$module->id}}"> {{ ucfirst($module->name) }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"> {{__('Scopes')}} </label> <br>
                                    <!-- inline checkboxes: all, added, owned, both, none -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="all" name="permissions[]" checked hidden>
                                        <input class="form-check-input" type="checkbox" value="all" name="permissions[]" checked disabled>
                                        <label class="form-check-label" for="inlineCheckbox1"> {{__('All')}} </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="owned" name="permissions[]">
                                        <label class="form-check-label" for="inlineCheckbox2"> {{__('Owned')}} </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="added" name="permissions[]">
                                        <label class="form-check-label" for="inlineCheckbox3"> {{__('Added')}} </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="both" name="permissions[]">
                                        <label class="form-check-label" for="inlineCheckbox2"> {{__('Both')}} </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="none" name="permissions[]" checked hidden>
                                        <input class="form-check-input" type="checkbox" value="none" name="permissions[]" checked disabled>
                                        <label class="form-check-label" for="inlineCheckbox3"> {{__('None')}} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button id='btnAddPermission' type="submit" class="btn btn-primary w-100"> {{__('Save')}} </button>
                                </div>
                            </div>
                        </div>
                    </form>
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

                // change button state
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
            @if($add_permission->status)
            $('form[name="addNewRolePermission"]').submit(function(e) {
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
                            $('form[name="addNewRolePermission"]').trigger('reset');
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
        });
    </script>
@endsection