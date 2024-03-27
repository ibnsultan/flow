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
		
		@include('layouts.admin.sidebar')
		@include('layouts.app.topbar')

        @yield('content')

		@include('layouts.app.partials')
		@include('layouts.app.basebar')

		<!-- Required Js -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
		<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
		<script src="/assets/js/plugins/popper.min.js"></script>
		<script src="/assets/js/plugins/simplebar.min.js"></script>
		<script src="/assets/js/plugins/bootstrap.min.js"></script>
		<script src="/assets/js/fonts/custom-font.js"></script>
		<script src="/assets/js/pcoded.js"></script>
		<script src="/assets/js/plugins/feather.min.js"></script>
        <script src="/assets/js/plugins/sweetalert2.all.min.js"></script>

		<script>
			function change_theme_color(color){
				document.cookie = `theme_color=${color}; max-age=${60*60*24*365*30}; path=/`;
				layout_change(color);
			}

			function underDevelopment(){
				// prevent default action
				event.preventDefault();

				Swal.fire({
					title: 'Under Development',
					text: 'This feature is under development and will be available soon.',
					icon: 'info',
					confirmButtonText: 'OK'
				});
			}

			function injectStylesheet(url) {
				var link = document.createElement('link');
				link.rel = 'stylesheet';
				link.type = 'text/css';
				link.href = url;
				document.head.appendChild(link);
			}
		</script>

		<!--script>layout_change('{{cookie()->get('theme_color') ?? 'light' }}');</script-->
		<script>layout_sidebar_change('false');</script>
		<script>change_box_container('false');</script>
		<script>layout_caption_change('true');</script>
		<!--script>layout_rtl_change('{{_("rtl")}}');</script-->

		@yield('scripts')

	</body>
</html>