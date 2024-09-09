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
                            @if($addModulePermission->status)
                                <a class="btn btn-primary rounded position-absolute" style="top:0.8rem;right:2rem;"
                                    data-bs-toggle="modal" data-bs-target="#addNewModule">
                                    {{__('Add New')}}
                                </a>
                            @endif
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
                        @if($appModules->count() > 0)
                            <div class="row">
                                
                                @foreach($appModules as $module)
                                    <div class="col-md-4 col-sm-12 card mb-3 border-0">
                                        <div class="card-body position-relative border rounded">
                                            <h5 class="card-title"> {{ ucfirst($module->name) }} </h5>
                                            <p class="card-text"> {{ $module->description }} </p>

                                            <!-- switch: 'active'|'inactive' -->
                                            <div class="form-check form-switch position-absolute" style="top:1.6rem; right: 1rem;">
                                                <input class="form-check form-switch module-switch" type="checkbox"
                                                    {{ (!$module->is_core and $editModulePermission->status) ? 'data-module='.$helpers::encode($module->id) : 'disabled' }}
                                                    {{ $module->status  ? 'checked' : '' }}>
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
    @if($addModulePermission->status)
        <div class="modal fade" id="addNewModule" tabindex="-1" aria-labelledby="addNewModuleLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewModuleLabel"> {{__('Register a Module')}} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="addNewModule" id="formAddModule" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label"> {{__('Name')}} </label>
                                        <input type="text" name="name" class="form-control" placeholder="{{__('Module Name')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label"> {{__('Description')}} </label>
                                        <input type="text" name="description" placeholder="{{__('Module Description')}}" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Scope</th>
                                                <th>C</th>
                                                <th>R</th>
                                                <th>U</th>
                                                <th>D</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (['all', 'owned', 'added', 'both', 'none'] as $scope)
                                                <tr>
                                                    <td> {{ ucfirst($scope) }} </td>
                                                    @foreach (['create', 'read', 'update', 'delete'] as $crud)
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="{{$crud}}[]" value="{{$scope}}">
                                                            </div>
                                                        </td>
                                                    @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" id="btnAddModule" class="btn btn-primary w-100"> {{__('Save Module')}} </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
            @if($editModulePermission->status)
                $('.module-switch').on('change', function() {
                    var module_id = $(this).data('module');
                    var status = $(this).prop('checked') ? 1 : 0;
                    var url = "/admin/access/modules/status";
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            module: module_id,
                            status: status
                        },
                        success: function(response) {
                            if(response.status === 'success') {
                                toast.success({ message: response.message, position: 'bottomCenter' });
                            } else {
                                toast.error({ message: response.message, position: 'bottomCenter' });
                            }
                        },
                        error: function(xhr, status, error) {
                            toast.error({ message: '{{__('An Unkown error Occured')}}', position: 'bottomCenter' });
                        }
                    });
                });
            @endif

            // add new module
            @if($addModulePermission->status)
                $('#formAddModule').on('submit', function(e) {
                    e.preventDefault();
                    buttonState('#btnAddModule', 'loading');

                    $.ajax({
                        url: '/admin/access/modules/add',
                        type: 'post',
                        data: $(this).serialize(),
                        success: function(response) {
                            if(response.status === 'success') {
                                toast.success({ message: response.message, position: 'bottomCenter' });
                                setTimeout(() => { location.reload(); }, 1000);
                            } else {
                                toast.error({ message: response.message, position: 'bottomCenter' });
                            }
                        },
                        error: function(xhr, status, error) {
                            toast.error({ message: '{{__('An Unkown error Occured')}}', position: 'bottomCenter' });
                        },
                        complete: function() {
                            buttonState('#btnAddModule', 'reset', '{{__('Save Module')}}');
                        }
                    });
                });
            @endif
        });
    </script>
@endsection