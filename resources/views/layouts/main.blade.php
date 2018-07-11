<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
	
<title>We Creative | The Agency Platform</title>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<main id="app" class="container">
		<div v-on:click="toggleMenu()" class="we-menu-toggle">
				<svg v-if="menu == false" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0z" fill="none"/>
						<path class="cls-1" d="M12 5.83L15.17 9l1.41-1.41L12 3 7.41 7.59 8.83 9 12 5.83zm0 12.34L8.83 15l-1.41 1.41L12 21l4.59-4.59L15.17 15 12 18.17z"/>
				</svg>
				<svg v-else class="we-collapse" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path class="cls-2" d="M7.41 18.59L8.83 20 12 16.83 15.17 20l1.41-1.41L12 14l-4.59 4.59zm9.18-13.18L15.17 4 12 7.17 8.83 4 7.41 5.41 12 10l4.59-4.59z"/>
        </svg>
		</div>
		
		@include('partials._menu')
		
		<div class="we-toolbar">
			<a href="/login">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0z" fill="none"/>
							<path v-if="menu == false" class="cls-1" d="M12.65 10C11.83 7.67 9.61 6 7 6c-3.31 0-6 2.69-6 6s2.69 6 6 6c2.61 0 4.83-1.67 5.65-4H17v4h4v-4h2v-4H12.65zM7 14c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
							<path v-else class="cls-2" d="M12.65 10C11.83 7.67 9.61 6 7 6c-3.31 0-6 2.69-6 6s2.69 6 6 6c2.61 0 4.83-1.67 5.65-4H17v4h4v-4h2v-4H12.65zM7 14c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
					</svg> 
				</a>  
		</div>

		@if(Route::current()->getName() == 'articles' || Route::current()->getName() == 'article' || Route::current()->getName() == 'projects')
			<h1 class="center-text logo-wrap">
				<a href="/">
					<img v-if="menu == false" class="we_icon" src="/we_icon.png">
					<img v-else class="we_icon" src="/we_icon_white.png">
				</a>
			</h1>
		@else 
			<h1 class="center-text logo-wrap">
				<a href="/">@include('partials._logo')</a>
			</h1>
			<h4>THE AGENCY PLATFORM</h4>
		@endif
			
		@yield('content')

	</main>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
