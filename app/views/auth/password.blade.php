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

						<h4 class="text-center f-w-500 mb-3"> {{_('Enter your new password')}} </h4>

						<form name="reset" method="post">

							<!-- password input -->
							<div class="form-group mb-3 position-relative">
								<input type="password" class="form-control" name="password" placeholder="••••••••••••" required autocomplete='false'>
                                <i class="fa fa-eye pass-view" onclick="togglePassword(this)"></i>
							</div>
                            
							<!-- form submission -->
							<div class="d-grid mt-4">
								<button type="submit" class="btn btn-primary">{{_('Change Password')}}</button>
							</div>

							<!-- go back to login -->
                            <div class="d-grid mt-2">
                                <a href="/login" class="btn btn-light">
                                    {{_('Back to Login')}}
                                </a>
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
@section('scripts')

	<script>

		$('form[name="reset"]').submit(function(e){

			e.preventDefault();
			
			// disable button to prevent multiple clicks
			$('button[type="submit"]').attr('disabled', true).html('Processing...');

			$.ajax({
				url: document.location.href,
				type: 'POST',
				data: $(this).serialize(),
				success: function(response) {
					if(response.status == 'success') {

						Swal.fire({ icon: 'success', title: 'Success', text: response.message }).then(() => {
							document.location.href = '/login'
						});

					} else {

						Swal.fire({ icon: 'error', title: 'Oops...', text: response.message });
						$('button[type="submit"]').attr('disabled', false).html('Reset Password');

					}
				},
				error: function() {

					Swal.fire({ icon: 'error', title: 'Oops...', text: 'An error occurred. Please try again later.' });
					$('button[type="submit"]').attr('disabled', false).html('Reset Password');

				}
			});

		})

	</script>

@endsection