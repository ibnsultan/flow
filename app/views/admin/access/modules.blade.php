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
                            <a class="btn btn-primary rounded position-absolute" style="top:0.8rem;right:2rem;"
                                data-bs-toggle="modal" data-bs-target="#addNewModule">
                                {{__('Add New')}}
                            </a>              
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- filter search -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchModules" placeholder="{{__('Search Modules')}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        @if($modules->count() > 0)
                            <div class="row">
                                
                                @foreach($modules as $module)
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card mb-3">
                                            <div class="card-body position-relative">
                                                <h5 class="card-title"> {{ ucfirst($module->name) }} </h5>
                                                <p class="card-text"> {{ $module->description }} </p>

                                                <!-- switch: 'active'|'inactive' -->
                                                <div class="form-check form-switch position-absolute" style="top:1.6rem; right: 1rem;">
                                                    <input class="form-check form-switch module-switch" type="checkbox"
                                                        {{ $module->is_core ? 'disabled' : 'data-module='.$helpers::encode($module->id) }}
                                                        {{ $module->status  ? 'checked' : '' }}>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
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
    <div class="modal fade" id="addNewModule" tabindex="-1" aria-labelledby="addNewModuleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewModuleLabel"> {{__('Register a Module')}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="addNewModule" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"> {{__('Name')}} </label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"> {{__('Description')}} </label>
                                    <textarea name="description" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"> {{__('Primary Permissions')}} </label> <br>
                                    <!-- inline checkboxes: all, added, owned, both, none -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="create" name="permissions[]">
                                        <label class="form-check-label" for="inlineCheckbox1"> {{__('Create')}} </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="read" name="permissions[]">
                                        <label class="form-check-label" for="inlineCheckbox2"> {{__('Read')}} </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="update" name="permissions[]">
                                        <label class="form-check-label" for="inlineCheckbox3"> {{__('Update')}} </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="delete" name="permissions[]">
                                        <label class="form-check-label" for="inlineCheckbox2"> {{__('Delete')}} </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary w-100"> {{__('Save')}} </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // search modules
            $('#searchModules').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('.card').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // module switch
            $('.module-switch').on('change', function() {
                var module = $(this).data('module');
                var status = $(this).prop('checked') ? 1 : 0;
                var url = "/admin/access/modules/status";
                var data = {
                    module: module,
                    status: status
                };
                $.post(url, data, function(response) {
                    if(response.status === 'success') {
                        iziToast.success({
                            message: response.message,
                            position: 'bottomCenter'
                        });
                    } else {
                        iziToast.error({
                            message: response.message,
                            position: 'bottomCenter'
                        });
                    }
                });
            });
        });
    </script>
@endsection