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
                                style="top:0.8rem;right:2rem;" href="/admin/users/add">
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
                                                        <a href="/admin/user/{{ \App\Helpers\Helpers::encode($user->id) }}">
                                                            {{ $user->fullname }}
                                                        </a>
                                                    </td>
                                                    <td> {{ $user->email }} </td>
                                                    <td> {{ $user->user_role->description }} </td>
                                                    <td> {{ $user->status ?? 'Unverified' }} </td>
                                                    <td>
                                                        <a href="/admin/user/{{ \App\Helpers\Helpers::encode($user->id) }}" class="btn btn-primary rounded btn-sm">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="/admin/users/{{ \App\Helpers\Helpers::encode($user->id) }}" class="btn btn-danger rounded btn-sm">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
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
@endsection