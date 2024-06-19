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
                                    <i class="ti ti-user me-2"></i>{{__('Profile')}}
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab" aria-selected="false" tabindex="-1">
                                    <i class="ti ti-file-text me-2"></i>{{__('Personal Details')}}
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4" role="tab" aria-selected="false" tabindex="-1">
                                    <i class="ti ti-lock me-2"></i>{{__('Security')}}
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
                                                    <img class="rounded-circle img-fluid w-100" src="{{ auth()->user()['avatar'] }}" alt="User image">
                                                </div>

                                                <hr class="my-3 border border-secondary-subtle">
                                                
                                                <div class="align-items-center justify-content-start w-100 mb-3">
                                                    
                                                    <h3 class="mb-0">{{ auth()->user()['fullname'] }}</h3>
                                                    <p class="text-muted text-sm">{{ auth()->user()['role'] }}</p>
                                                    
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
                                                            <p class="mb-1 text-muted">{{__('Full Name')}}</p>
                                                            <p class="mb-0">{{ auth()->user()['fullname'] }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">{{__('Email address')}}</p>
                                                            <p class="mb-0">{{ auth()->user()['email'] }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">{{__('Phone')}}</p>
                                                            <p class="mb-0">{{ auth()->user()['phone'] ?? 'Phone not set' }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="mb-1 text-muted">{{__('About Me')}}</p>
                                                            <p class="mb-0">
                                                                @if( auth()->user()['about'] == '' )
                                                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
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
                                                <h5>{{__('Edit Personal Information')}}</h5>
                                            </div>
                                            <div class="card-body">
                                                <form name="updateProfileDetails" method='post' enctype="multiart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-12 text-center mb-3">
                                                            <div class="user-upload wid-75">
                                                                <img src="{{ auth()->user()['avatar'] }}" alt="img" id="imagePreview" class="img-fluid">
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
                                                                <input type="text" name="name" class="form-control" value="{{ auth()->user()['fullname'] }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">{{__('Email')}}</label>
                                                                <input type="text" name="email" class="form-control" value="{{ auth()->user()['email'] }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">{{__('Phone')}}</label>
                                                                <input type="text" name="phone" class="form-control" value="{{ auth()->user()['phone'] }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">{{__('Bio')}}</label>
                                                                <textarea class="form-control" name="bio">{{ auth()->user()['about'] }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center btn-page">
                                        <button type="submit" class="btn btn-primary rounded w-25">{{__('Update Profile')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Password</h5>
                                </div>
                                <form name="updatePassword" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">Old Password</label>
                                                    <input type="password" name="old_password" placeholder="••••••••••••" class="form-control" required>
                                                </div>
                                                <div class="form-group position-relative">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" name="new_password" placeholder="••••••••••••" class="form-control" required>
                                                    <i class="fa fa-eye pass-view" onclick="togglePassword(this)" style="top:3rem;right:1.5rem;"></i>
                                                </div>
                                            </div>
                                            <!--div class="col-sm-6">
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
                                            </div-->
                                        </div>
                                    </div>
                                    <div class="card-footer text-end btn-page">
                                        <button type="submit" class="btn btn-primary">Update Password</div>
                                    </div>
                                
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    
        // form submission profile details
        document.forms.updateProfile.onsubmit = async function(e) {
            e.preventDefault();

            // disable btn and is loading
            $('button[type="submit"]').attr('disabled', true).html('Updating...');

            let formData = new FormData(this);

            $.ajax({
                url: '/app/profile/update',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.status == 'success'){
                        Swal.fire( 'Success', response.message, 'success')
                        location.reload();
                    }else{
                        Swal.fire( 'Error', response.message, 'error' )
                        $('button[type="submit"]').attr('disabled', false).html('Update Profile');
                    }
                },
                error: function(err) {
                    Swal.fire( 'Error', 'An error occurred while processing your request', 'error')

                    $('button[type="submit"]').attr('disabled', false).html('Update Profile');
                }
            });
        }

        // image avatar upload input and preview
        $('#avatarUpload').click(function(){
            $('#avatar').click();
        });

        document.getElementById('avatar').onchange = function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }

        // toggle password visibility
        function togglePassword(e) {
            if(e.previousElementSibling.type == 'password') {
                e.previousElementSibling.type = 'text';
                e.classList.add('fa-eye-slash');
                e.classList.remove('fa-eye');
            } else {
                e.previousElementSibling.type = 'password';
                e.classList.add('fa-eye');
                e.classList.remove('fa-eye-slash');
            }
        }

        // change password
        document.forms.updatePassword.onsubmit = async function(e) {
            e.preventDefault();

            // disable btn and is loading
            $('button[type="submit"]').attr('disabled', true).html('Updating...');

            let formData = new FormData(this);

            $.ajax({
                url: '/app/profile/password/update',
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.status == 'success'){
                        Swal.fire(
                            'Success',
                            response.message,
                            'success'
                        )

                        location.reload();
                    }else{
                        Swal.fire(
                            'Error',
                            response.message,
                            'error'
                        )

                        $('button[type="submit"]').attr('disabled', false).html('Update Profile');
                    }
                },
                error: function(err) {
                    Swal.fire(
                        'Error',
                        'An error occurred while processing your request',
                        'error'
                    )

                    $('button[type="submit"]').attr('disabled', false).html('Update Profile');
                }
            });

        }
    </script>
@endsection