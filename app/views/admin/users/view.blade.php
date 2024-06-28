@extends('layouts.admin')	
@section('content')    
	<div class="pc-container">
		<div class="pc-content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body position-relative">
                            <h5>
                                {{ __('Edit User Information') }}
                            </h5>             
                        </div>
                    </div>
                </div>
            </div>

            <form name="updateProfile" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form name="updateProfileDetails" method='post' enctype="multiart/form-data">

                                    <input type="hidden" name="user_id" value="{{ $helpers::encode($user->id) }}">
                                    <div class="row">
                                        <div class="col-sm-12 text-center mb-3">
                                            <div class="user-upload wid-75">
                                                <img src="{{ $user->avatar }}" alt="img" id="imagePreview" class="img-fluid">
                                                <label for="avatar" id="avatarUpload" class="img-avtar-upload">
                                                    <i class="ti ti-camera f-24 mb-1"></i>
                                                    <span>Upload</span>
                                                </label>
                                                <input type="file" id="avatar" name="avatar" class="d-none">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('Full Name')}}</label>
                                                <input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('Email')}}</label>
                                                <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('Phone')}}</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('User Role')}}</label>
                                                <select name="user_role" class="form-select">
                                                    <option value="{{ $user->user_role->name }}" hidden>{{ $user->user_role->description }}</option>
                                                    @foreach (\App\Models\Role::all() as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>                                                        
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('User Status')}}</label>
                                                <select name="user_status" class="form-select">
                                                    <option value="{{ $user->status ?? null }}" hidden>{{ $user->status ?? 'Unverified' }}</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Suspended</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{__('Bio')}}</label>
                                                <textarea class="form-control" name="bio">{{ auth()->user()['about'] }}</textarea>
                                            </div>
                                        </div>

                                        
                                        <div class="col-12 text-center btn-page mt-3">
                                            <button type="submit" class="btn btn-danger rounded">{{__('Update User')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection