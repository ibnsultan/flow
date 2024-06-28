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
                                data-bs-toggle="modal" data-bs-target="#addNewUserRole">
                                {{__('Add New')}}
                            </a>              
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-body">
                        @if($roles->count() > 0)

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Description')}}</th>
                                        <th class="text-center">{{__('Users')}}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td> {{$role->name}} </td>
                                            <td> {{$role->description}} </td>
                                            <td class="text-center"> {{$role->users_count}} </td>
                                            <td class="text-end">
                                                @if(!$role->is_core)
                                                <div class="dropdown">
                                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item" href="javascript:void(0)"> {{__('Edit')}} </a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0)"> {{__('Delete')}} </a></li>
                                                    </ul>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <div class="modal fade" id="addNewUserRole" tabindex="-1" aria-labelledby="addNewUserRoleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewUserRoleLabel"> {{__('Add New User Role')}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="addNewUserRole" method="post">
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