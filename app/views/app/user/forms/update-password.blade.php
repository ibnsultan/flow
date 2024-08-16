
<form id="updatePassword" name="updatePassword" method="post">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="form-label">{{ __('Old Password') }}</label>
                    <input type="password" name="old_password" placeholder="••••••••••••" class="form-control" required>
                </div>
                <div class="form-group position-relative">
                    <label class="form-label">{{ __('New Password') }}</label>
                    <input type="password" name="new_password" placeholder="••••••••••••" class="form-control" required>
                    <i class="fa fa-eye pass-view" onclick="togglePassword(this)" style="top:3rem;right:1.5rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end btn-page">
        <button id="btnUpdatePassword" type="submit" class="btn btn-primary">{{ __('Update Password') }}</div>
    </div>

</form>