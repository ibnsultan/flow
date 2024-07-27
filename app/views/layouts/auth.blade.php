<!DOCTYPE html>
<html lang="en">
	<head>
		<title> {{getenv('app_name')}} {{$login ?? ''}}</title>

		<!-- [Meta] -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="{{getenv('app_author')}}">
		
		<link rel="icon" href="{{ settings->favicon }}" type="image/x-icon">
		
		<link rel="stylesheet" href="/assets/fonts/inter/inter.css" id="main-font-link" />
		<link rel="stylesheet" href="/assets/fonts/tabler-icons.min.css" />
		<link rel="stylesheet" href="/assets/fonts/feather.css" />
		<link rel="stylesheet" href="/assets/fonts/fontawesome.css" />
		<link rel="stylesheet" href="/assets/fonts/material.css" />
		<link rel="stylesheet" href="/assets/css/style.css" id="main-style-link" />
		<link rel="stylesheet" href="/assets/css/style-preset.css" />

		<style>
			[type="password"]:placeholder { font-size: 20px !important;}
		</style>

	</head>
	<!-- [Head] end -->
	<!-- [Body] Start -->
	<body data-pc-preset="preset-8" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
		<!-- [ Pre-loader ] start -->
		<div class="loader-bg">
			<div class="loader-track">
				<div class="loader-fill"></div>
			</div>
		</div>

        @yield('content')

		<!-- Required Js -->
        <script src="/assets/js/plugins/jquery-3.7.1.min.js"></script>
		<script src="/assets/js/plugins/popper.min.js"></script>
		<script src="/assets/js/plugins/simplebar.min.js"></script>
		<script src="/assets/js/plugins/bootstrap.min.js"></script>
		<script src="/assets/js/fonts/custom-font.js"></script>
		<script src="/assets/js/pcoded.js"></script>
		<script src="/assets/js/plugins/feather.min.js"></script>
        <script src="/assets/js/plugins/sweetalert2.all.min.js"></script>

		<script>
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
		</script>

        @yield('scripts')

		<script>layout_change('light');</script>
		<script>layout_sidebar_change('false');</script>
		<script>change_box_container('false');</script>
		<script>layout_caption_change('true');</script>
		<script>layout_rtl_change('false');</script>
	</body>
</html>