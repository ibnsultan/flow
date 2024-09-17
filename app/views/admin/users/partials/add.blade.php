<div class="modal fade" id="registerNewUser" tabindex="-1" aria-labelledby="registerNewUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerNewUserLabel">{{__('Register New User')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="alert bg-light-warning text-warning" role="alert">
                    {{__('User registered by admin will automatically be active')}}
                </div>

                <form action="post" name="userRegistrationForm">
                    @csrf
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
                                    <option value="subscriber" hidden>{{__('Subscriber')}}</option>
                                    @foreach (\App\Models\Role::all() as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>                                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded w-100 ">{{__('Create User')}}</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>