<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ getenv('APP_NAME') ?? 'Flow' }}</title>
    <link rel="shortcut icon" href="https://leafphp.dev/logo-circle.png" type="image/x-icon">

    {{-- assets() points to the public/assets folder --}}
    <link rel="stylesheet" href="{{ assets('css/styles.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700;display=swap">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="flex center-all h-screen">
	<div class="container">
		<div class="mt-1">
			<div class="flex center-start">
				<img src="https://www.leafphp.dev/logo-circle.png" alt="">
				<h4 style="font-size: 22px;">Welcome to Leaf <span class="green">Flow</span></h4>
			</div>
			<div class="flex card mt-2">
				<div class="flex" style="width: calc(50% - 80px); padding: 30px;">
					<ion-icon name="book-outline"></ion-icon>
					<div class="ml-1">
						<h4>
							<span class="green">Flow</span> Documentation
						</h4>
						<p class="mt-1">
							Flow is based on Leaf MVC which comes with a clean and developer-friendly documentation.
						</p>
						<a href="https://github.com/ibnsultan/flow/wiki" target="_blank" rel="noopener">
							Flow Docs
						</a>
					</div>
				</div>
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
					<ion-icon name="laptop-outline"></ion-icon>
					<div class="ml-1">
						<h4>
							Leaf Documentation
						</h4>
						<p class="mt-1">
							Since Flow is basically a kit built with Leaf, we recommend checking out the leaf docs first.
						</p>
						<a href="https://mvc.leafphp.dev" target="_blank" rel="noopener">
							Leaf Docs
						</a>
					</div>
				</div>
				<div class="flex" style="width: calc(50% - 80px); padding: 30px;">
					<ion-icon name="logo-twitter"></ion-icon>
					<div class="ml-1">
						<h4>Twitter</h4>
						<p class="mt-1">
							Follow Leaf PHP on Twitter to get latest news about releases, new modules, tutorials
							and amazing tips.
						</p>
						<a href="https://twitter.com/leafphp" target="_blank" rel="noopener">@leafphp</a>
					</div>
				</div>
				<div class="flex" style="width: calc(50% - 80px); padding: 30px;">
					<ion-icon name="logo-youtube"></ion-icon>
					<div class="ml-1">
						<h4>YouTube</h4>
						<p class="mt-1">
							We have a youtube channel where we upload videos on leaf, our modules, frameworks and other projects.
						</p>
						<a href="https://www.youtube.com/channel/UCllE-GsYy10RkxBUK0HIffw" target="_blank" rel="noopener">Leaf YouTube Channel</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<header>
		<nav>
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="/auth/login">Login</a></li>
				<li><a href="/auth/register">Register</a></li>
			</ul>
		</nav>
	</header>

</body>

</html>
