@extends('layouts.auth')
@section('content')		
	<div class="auth-main">
		<div class="auth-wrapper v1">
			<div class="auth-form">
				<div class="card my-5">
					<div class="card-body">

						<div class="text-center">
							<a href="/">
								<img src="{{ urlPath(settings->logo_dark) }}" class="w-25" alt="img">
							</a>
							<div class="d-grid my-3"> </div>
						</div>

						<h4 class="text-center f-w-500 mb-3"> {{__('Login to your account')}} </h4>

						<form name="login" method="post">

							@csrf
							<!-- email input -->
							<div class="form-group mb-3">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
							</div>

							<!-- password input -->
							<div class="form-group mb-3 position-relative">
								<input type="password" class="form-control" name="password" placeholder="••••••••••••" required autocomplete='false'>
                                <i class="fa fa-eye pass-view" onclick="togglePassword(this)"></i>
							</div>

							<!-- reset password -->
							<div class="d-flex mt-1 justify-content-between align-items-center">
								<a href="/reset" class="text-secondary text-center f-w-400 mb-0">
									{{__('Forgot Password?')}}
								</a>
							</div>

							<!-- form submission -->
							<div class="d-grid mt-4">
								<button type="submit" id="btnAuth" class="btn btn-primary">{{__('Login')}}</button>
							</div>

							<!-- create account -->
							<div class="d-flex justify-content-between align-items-end mt-4">
								<h6 class="f-w-500 mb-0"> {{__('Don\'t have an Account?')}} </h6>
								<a href="/register" class="link-primary"> {{__('Create Account')}} </a>
							</div>
						</form>
		
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script>
		$("form[name='login']").submit(function(event) {
			
			event.preventDefault();
			buttonState('#btnAuth', 'loading');
			
			$.ajax({
				url: '/auth/login',
				type: 'POST',
				data: $(this).serialize(),
				success: function(response) {
					if(response.status == 'success') {
						Swal.fire({ icon: 'success', title: 'Success', text: response.message }).then(() => {
							location.reload();
						});
					} else {
						Swal.fire({ icon: 'error', title: 'Oops...', text: response.message });
					}
				},
				error: function() {
					Swal.fire({ icon: 'error', title: 'Oops...', text: 'An error occurred. Please try again later.' });
				},
				complete: function() {
					buttonState('#btnAuth', 'reset', 'Login');
				}
			});
			
		});
	</script>
@endsection