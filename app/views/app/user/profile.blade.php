@extends('layouts.app')
@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-body py-0">
                            <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1" role="tab" aria-selected="true">
                                    <i class="ti ti-user me-2"></i>{{_('Profile')}}
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab" aria-selected="false" tabindex="-1">
                                    <i class="ti ti-file-text me-2"></i>{{_('Personal Details')}}
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab" aria-selected="false" tabindex="-1">
                                    <i class="ti ti-id me-2"></i>{{ _('API Tokens') }}
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4" role="tab" aria-selected="false" tabindex="-1">
                                    <i class="ti ti-lock me-2"></i>{{_('Security')}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">

                        <div class="tab-pane active show" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                            <div class="row">
                                <div class="col-lg-4 col-xxl-3">
                                    <div class="card h-100">
                                        <div class="card-body position-relative">
                                            <div class="position-absolute end-0 top-0 p-3">
                                                <span class="badge bg-primary">{{ auth()->user()['role'] }}</span>
                                            </div>
                                            <div class="text-center mt-3">
                                                <div class="chat-avtar d-inline-flex mx-auto">
                                                    <img class="rounded-circle img-fluid wid-70" src="{{ auth()->user()['avatar'] }}" alt="User image">
                                                </div>
                                                <h5 class="mb-0">{{ auth()->user()['fullname'] }}</h5>
                                                <p class="text-muted text-sm">{{ auth()->user()['role'] }}</p>

                                                <hr class="my-3 border border-secondary-subtle">
                                                
                                                <div class="align-items-center justify-content-start w-100 mb-3">
                                                    
                                                    <h3> {{ _('About Me') }} </h3>

                                                    <p>{{ auth()->user()['about'] ?? '' }}</p>

                                                    @if( is_null(auth()->user()['about']) )
                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
                                                    @endif
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xxl-9">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <h5>Personal Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="mb-1 text-muted">{{_('Full Name')}}</p>
                                                            <p class="mb-0">{{ auth()->user()['fullname'] }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">{{_('Email address')}}</p>
                                                            <p class="mb-0">{{ auth()->user()['email'] }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">{{_('Phone')}}</p>
                                                            <p class="mb-0">{{ auth()->user()['phone'] ?? 'Phone not set' }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <form name="updateProfile" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>{{_('Edit Personal Information')}}</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center mb-3">
                                                        <div class="user-upload wid-75">
                                                            <img src="{{ auth()->user()['avatar'] }}" alt="img" id="imagePreview" class="img-fluid">
                                                            <label for="uplfile" class="img-avtar-upload">
                                                                <i class="ti ti-camera f-24 mb-1"></i>
                                                                <span>Upload</span>
                                                            </label>
                                                            <input type="file" id="avatar" name="avatar" class="d-none">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">{{_('Full Name')}}</label>
                                                            <input type="text" name="name" class="form-control" value="{{ auth()->user()['fullname'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{_('Email')}}</label>
                                                            <input type="text" name="email" class="form-control" value="{{ auth()->user()['email'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">{{_('Phone')}}</label>
                                                            <input type="text" name="phone" class="form-control" value="{{ auth()->user()['phone'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">{{_('Bio')}}</label>
                                                            <textarea class="form-control" name="bio">{{ auth()->user()['about'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center btn-page">
                                        <div class="btn btn-primary rounded w-25">Update Profile</div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header position-relative">
                                            <h5>General Settings</h5>
                                            <button class="btn btn-primary position-absolute" style="top:0.8rem;right:2rem;">Create Key</button>
                                        </div>
                                        <div class="card-body">
                                        
                                            @if(count($apiKeys))
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">API Key</th>
                                                                <th scope="col">Created At</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($apiKeys as $key)
                                                            <tr>
                                                                <td>{{ $key['key'] }}</td>
                                                                <td>{{ $key['created_at'] }}</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">View</a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="alert alert-light" role="alert">
                                                    <h4 class="alert-heading">No API Key Found</h4>
                                                    <p>It seems you have not created any API Key yet. You can create one by clicking the button below.</p>
                                                </div>
                                            @endif
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Password</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Old Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>New password must contain:</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><i class="ti ti-circle-check text-success f-16 me-2"></i> At least 8
                                                    characters
                                                </li>
                                                <li class="list-group-item"><i class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    lower letter (a-z)
                                                </li>
                                                <li class="list-group-item"><i class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    uppercase letter(A-Z)
                                                </li>
                                                <li class="list-group-item"><i class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    number (0-9)
                                                </li>
                                                <li class="list-group-item"><i class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    special characters
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end btn-page">
                                    <div class="btn btn-outline-secondary">Cancel</div>
                                    <div class="btn btn-primary">Update Profile</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection