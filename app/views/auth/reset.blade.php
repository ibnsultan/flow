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

						<h4 class="text-center f-w-500 mb-3"> {{__('Reset your Password')}} </h4>

						<form name="reset" method="post">

							@csrf

							<!-- email input -->
							<div class="form-group mb-3">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
							</div>
                            
							<!-- form submission -->
							<div class="d-grid mt-4">
								<button type="submit" id="btnAuth" class="btn btn-primary">{{__('Reset Password')}}</button>
							</div>

                            <!-- go back to login -->
                            <div class="d-grid mt-2">
                                <a href="/login" class="btn btn-light">
                                    {{__('Back to Login')}}
                                </a>
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

		$(document).ready(function() {

			// form submission
			$('form[name="reset"]').submit(function(e) {
				e.preventDefault();

				// disable button to prevent multiple clicks
				$('button[type="submit"]').attr('disabled', true).html('Processing...');

				var email = $('#email').val();
				$.ajax({
					url: '/auth/reset',
					type: 'POST',
					data: {
						_token: '{{ csrf_token() }}',
						email: email
					},
					success: function(response) {
						if (response.status == 'success') {
							Swal.fire({ icon: 'success', title: 'Success!', text: response.message }).then((result) => {
								
								// set 1 minute countdown and reenable button
								var count = 60;
								var countdown = setInterval(function() {
									count--;
									$('button[type="submit"]').html('Reset Password (' + count + ')');
									if (count == 0) {
										clearInterval(countdown);
										$('button[type="submit"]').attr('disabled', false).html('Reset Password');
									}
								}, 1000);
								
							});
						} else {
							Swal.fire({ icon: 'error', title: 'Error!', text: response.message })

							// enable button
							$('button[type="submit"]').attr('disabled', false).html('Reset Password');
						}
					},
					error: function() {
						Swal.fire({
							icon: 'error', title: 'Error!',
							text: 'An error occurred while processing your request. Please try again.'
						})

						// enable button
						$('button[type="submit"]').attr('disabled', false).html('Reset Password');
					}
				});
			});

		});

	</script>

@endsection