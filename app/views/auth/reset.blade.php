@extends('layouts.auth')
@section('content')		
	<div class="auth-main">
		<div class="auth-wrapper v1">
			<div class="auth-form">
				<div class="card my-5">
					<div class="card-body">

						<div class="text-center">
							<a href="/">
								<img src="{{ settings->get('logo_dark') }}" class="w-25" alt="img">
							</a>
							<div class="d-grid my-3"> </div>
						</div>

						<h4 class="text-center f-w-500 mb-3"> {{_('Reset your Password')}} </h4>

						<form name="reset" method="post">

							<!-- email input -->
							<div class="form-group mb-3">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
							</div>
                            
                            <div class="row mt-4">
                                <!-- go back to login -->
                                <div class="col-6">
                                    <a href="/login" class="btn btn-light w-100 rounded">
                                        {{_('Back to Login')}}
                                    </a>
                                </div>

                                <!-- form submission -->
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary w-100 rounded">
                                        {{_('Reset Password')}}
                                    </button>
                                </div>
                            </div>

							<!-- create account -->
							<div class="d-flex justify-content-between align-items-end mt-4">
								<h6 class="f-w-500 mb-0"> {{_('Don\'t have an Account?')}} </h6>
								<a href="/register" class="link-primary"> {{_('Create Account')}} </a>
							</div>
						</form>
		
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection