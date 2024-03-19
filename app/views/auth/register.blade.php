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

						<h4 class="text-center f-w-500 mb-3"> {{_('Create a new Account')}} </h4>

						<form name="register" method="post">

                            <!-- name input -->
                            <div class="form-group mb-3">
								<input type="text" class="form-control" name="name" placeholder="John Doe" required>
							</div>

							<!-- email input -->
							<div class="form-group mb-3">
								<input type="email" class="form-control" name="email" placeholder="johndoe@example.com" required>
							</div>

							<!-- password input -->
							<div class="form-group mb-3 position-relative">
								<input type="password" class="form-control" name="password" placeholder="••••••••••••" required autocomplete='false'>
                                <i class="fa fa-eye pass-view" onclick="togglePassword(this)"></i>
							</div>

							<!-- terms and condition -->
							<div class="d-flex mt-1 justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{_('I agree to the')}} <a href="/policy/terms" class="link-primary"> {{_('Terms and Conditions')}} </a>
                                    </label>
                                </div>
							</div>

							<!-- form submission -->
							<div class="d-grid mt-4">
								<button type="submit" class="btn btn-primary">{{_('Submit')}}</button>
							</div>

							<!-- create account -->
							<div class="d-flex justify-content-between align-items-end mt-4">
								<h6 class="f-w-500 mb-0"> {{_('Already have an Account?')}} </h6>
								<a href="/login" class="link-primary"> {{_('Login')}} </a>
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
		$("form[name='register']").submit(function(event) {
			
			event.preventDefault();

            $.ajax({
                url: "/auth/register",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if(response.status == "success" || response.status == null) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "Ok"
                        }).then(() => {
                            window.location.href = "/login";
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message,
                            icon: "error",
                            confirmButtonText: "Ok"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Error",
                        text: "An error occurred. Please try again later.",
                        icon: "error",
                        confirmButtonText: "Ok"
                    });
                }
            });
            

			
		});

        
	</script>
@endsection