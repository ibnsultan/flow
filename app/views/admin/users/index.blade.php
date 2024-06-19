@extends('layouts.admin')	
@section('content')    
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>
                                {{_('Users')}}
                            </h5> 
                            <a class="btn btn-primary position-absolute" 
                                style="top:0.8rem;right:2rem;" href="/admin/users/add"
                                data-bs-toggle="modal" data-bs-target="#registerNewUser">
                                {{_('Add New')}}
                            </a>              
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(count($users) > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{_('Name')}}</th>
                                                <th>{{_('Email')}}</th>
                                                <th>{{_('Role')}}</th>
                                                <th>{{_('Status')}}</th>
                                                <th>{{_('Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($users as $user)

                                                <tr>
                                                    <td>
                                                        <a href="/admin/user/{{ $helpers::encode($user->id) }}">
                                                            {{ $user->fullname }}
                                                        </a>
                                                    </td>
                                                    <td> {{ $user->email }} </td>
                                                    <td> {{ $user->user_role->description }} </td>
                                                    <td> {{ $user->status ?? 'Unverified' }} </td>
                                                    <td>
                                                        <a href="/admin/user/{{ $helpers::encode($user->id) }}" class="btn btn-primary rounded btn-sm">
                                                            <i class="ti ti-pencil"></i>
                                                        </a>
                                                        <button class="btn btn-danger rounded btn-sm" onclick="deleteUser('{{ $helpers::encode($user->id) }}')">
                                                            <i class="ti ti-trash"></i>
                                                        </button>                                                        
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    {{_('No users found')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- User Registration Modal -->
    <div class="modal fade" id="registerNewUser" tabindex="-1" aria-labelledby="registerNewUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerNewUserLabel">{{_('Register New User')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="alert bg-light-warning text-warning" role="alert">
                        {{_('User registered by admin will automatically be active')}}
                    </div>

                    <form action="post" name="userRegistrationForm">

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="fullname" class='form-control' placeholder="John Doe" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="text" name="email" class='form-control' placeholder="doe@example.com" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">User role</label>
                                    <select name="user_role" class="form-select">
                                        <option value="subscriber" hidden>{{_('Subscriber')}}</option>
                                        @foreach (\App\Models\UserRole::all() as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>                                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded w-100 ">{{_('Create User')}}</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection