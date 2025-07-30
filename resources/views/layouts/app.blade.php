<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">
<head>
	<script>
		// Set theme before the body gets parsed to prevent light theme flicker
		if (localStorage.getItem('theme') === 'dark') {
			document.documentElement.setAttribute('data-bs-theme', 'dark');
		}
	</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
		@yield('title') &middot; 
		{{ config('app.name', 'Laravel') }} 
	</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
	@livewireStyles
    <!-- Scripts -->
    @vite(['resources/sass/bootstrap.scss', 'resources/sass/app.scss', 'resources/js/app.js', 'resources/js/color_mode.js'])
</head>
<body>
    <div id="app">
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="circle-half" width="16" height="16" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
			</symbol>
			<symbol id="moon-stars-fill" width="16" height="16" viewBox="0 0 16 16">
				<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
				<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
			</symbol>
			<symbol id="sun-fill" width="16" height="16" viewBox="0 0 16 16">
				<path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
			</symbol>
			<symbol id="check2" width="16" height="16" viewBox="0 0 16 16">
				<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
			</symbol>
		</svg>
		@guest
		@else
			@livewire('nav.side-menu')
			<nav class="navbar border-bottom shadow-sm top-menu">
				<div class="container-fluid">
					<button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#side-menu" aria-controls="side-menu" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<a class="navbar-brand ms-3" href="{{ route('dashboard') }}">
						{{ config('app.name', 'Laravel') }}
					</a>
					
					<div class="dropdown ms-auto">
						<button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme (dark)">
							<svg class="svg-bi my-1 theme-icon-active"><use href="#moon-stars-fill"></use></svg>
							<span class="d-none ms-2" id="bd-theme-text">Toggle theme</span>
						</button>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text">
							<li>
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
									<svg class="svg-bi me-2 opacity-50 theme-icon"><use href="#sun-fill"></use></svg>
									Light
									<svg class="svg-bi ms-auto check2 d-none"><use href="#check2"></use></svg>
								</button>
							</li>
							<li>
								<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="dark" aria-pressed="true">
									<svg class="svg-bi me-2 opacity-50 theme-icon"><use href="#moon-stars-fill"></use></svg>
									Dark
									<svg class="svg-bi ms-auto check2 d-none"><use href="#check2"></use></svg>
								</button>
							</li>
							<li>
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
									<svg class="svg-bi me-2 opacity-50 theme-icon"><use href="#circle-half"></use></svg>
									Auto
									<svg class="svg-bi ms-auto check2 d-none"><use href="#check2"></use></svg>
								</button>
							</li>
						</ul>
					</div>

					<div class="dropdown ms-3">
						<a id="navbarDropdown" class="nav-link dropdown-toggle py-2 px-0 px-lg-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }}
						</a>
						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</div>
				</div>
			</nav>
		@endguest

        <main class="main-app pb-3">
			@guest
			@else
				@include('partials.breadcrumbs')
			@endguest

            @yield('content')
        </main>
    </div>
	@livewireScripts
	@filepondScripts
</body>
</html>
