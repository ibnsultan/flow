<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{$title ?? getenv('app_name')}}</title>
		<!-- [Meta] -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="{{getenv('app_author')}}">
		
		<link rel="icon" href="{{ settings->get('favicon') }}" type="image/x-icon">
		<link rel="stylesheet" href="/assets/fonts/inter/inter.css" id="main-font-link" />
		<link rel="stylesheet" href="/assets/fonts/tabler-icons.min.css" />
		<link rel="stylesheet" href="/assets/fonts/feather.css" />
		<link rel="stylesheet" href="/assets/fonts/fontawesome.css" />
		<link rel="stylesheet" href="/assets/fonts/material.css" />
		
		<link rel="stylesheet" href="/assets/css/style.css" id="main-style-link" />
		<link rel="stylesheet" href="/assets/css/style-preset.css" />
		<link rel="stylesheet" href="/assets/css/custom.css" />
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	</head>
	
	<body 
		data-pc-preset="{{ settings->get('theme_color') }}" 
		data-pc-sidebar-caption="true" 
		data-pc-direction="{{ settings->get('theme_layout') }}"
		data-pc-theme_contrast="true"
		data-pc-theme="{{cookie()->get('theme_color') ?? 'light' }}" >
		
		<div class="loader-bg">
			<div class="loader-track">
				<div class="loader-fill"></div>
			</div>
		</div>
		
		@include('layouts.app.sidebar')
		@include('layouts.app.topbar')
		

        @yield('content')

		
		@include('layouts.app.partials')
		@include('layouts.app.basebar')

		<!-- Required Js -->
		
		<script>document.querySelector('nav').classList.add('pc-sidebar-hide');</script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
		<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
		<script src="/assets/js/plugins/popper.min.js"></script>
		<script src="/assets/js/plugins/simplebar.min.js"></script>
		<script src="/assets/js/plugins/bootstrap.min.js"></script>
		<script src="/assets/js/fonts/custom-font.js"></script>
		<script src="/assets/js/pcoded.js"></script>
		<script src="/assets/js/plugins/feather.min.js"></script>
        <script src="/assets/js/plugins/sweetalert2.all.min.js"></script>
		<script src="/assets/js/app.js"></script>

		@yield('scripts')

	</body>
</html>