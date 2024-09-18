<form name="updateProfile" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Edit Personal Information')}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 text-center mb-3">
                            <div class="user-upload wid-75">
                                <img src="{{ urlPath(auth()->user()['avatar']) }}" alt="img" id="imagePreview" class="img-fluid">
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
                    <div class="col-12 text-center btn-page">
                        <button id="btnUpdateProfile" type="submit" class="btn btn-primary rounded w-25">{{__('Update Profile')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>