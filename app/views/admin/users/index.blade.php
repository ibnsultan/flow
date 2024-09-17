@extends('layouts.admin')	
@section('content')    
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 position-relative">
                            <h5>
                                {{__('Users Management')}}
                            </h5> 
                            @if($canCreateUser->status)
                                <a class="btn btn-primary position-absolute" 
                                    style="top:0.8rem;right:2rem;" href="/admin/users/add"
                                    data-bs-toggle="modal" data-bs-target="#registerNewUser">
                                    {{__('Add New User')}}
                                </a>
                            @endif
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
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Email')}}</th>
                                                <th>{{__('Role')}}</th>
                                                <th>{{__('Status')}}</th>
                                                @if($canUpdateUser->status || $canDeleteUser->status)
                                                    <th></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($users as $user)

                                                <tr>
                                                    <td>
                                                        <!-- TODO: view user profile -->
                                                        <!--a href="/admin/user/{{ $helpers::encode($user->id) }}"-->
                                                            {{ $user->fullname }}
                                                        <!--/a-->
                                                    </td>
                                                    <td> {{ $user->email }} </td>
                                                    <td> {{ $user->user_role->description }} </td>
                                                    <td> {{ $user->status ?? 'Inactive' }} </td>
                                                    <td class="text-end">
                                                        @if($canUpdateUser->status)
                                                            <a href="/admin/user/{{ $helpers::encode($user->id) }}" class="btn btn-primary rounded btn-sm">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        @endif
                                                        @if($canDeleteUser->status)
                                                            <button class="btn btn-danger rounded btn-sm" onclick="deleteUser('{{ $helpers::encode($user->id) }}')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        @endif                                                        
                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-danger" role="alert">
                                    {{__('No users found')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    @if($canCreateUser->status)
        @include('admin.users.partials.add')
    @endif
    
@endsection