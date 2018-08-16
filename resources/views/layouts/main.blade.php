<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
	
<title>We Creative | The Agency Platform</title>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    
@if(Route::current()->getName() == 'home')
<body class="agency_layout home">
@else
<body class="agency_layout">
@endif
    
	<main id="app" class="container">
		<div v-on:click="toggleMenu()" class="we-menu-toggle">
        <svg class="menu-toggle-black" v-if="menu == false" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
         <title>cheeseburger</title>

         <g>
          <title>background</title>
          <rect fill="none" id="canvas_background" height="10" width="40" y="-1" x="-1"/>
         </g>
         <g>
          <title>Layer 1</title>
          <rect fill="#000" id="svg_1" height="3" width="25" y="5" x="5"/>
          <rect fill="#000" id="svg_2" height="1" width="25" y="13" x="5"/>
          <rect fill="#000" id="svg_3" height="2" width="25" y="16" x="5"/>
          <rect fill="#000" id="svg_4" height="3" width="25" y="25" x="5"/>
         </g>
        </svg>
        <svg class="menu-toggle-white" v-if="menu == false" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
         <title>cheeseburger</title>

         <g>
          <title>background</title>
          <rect fill="none" id="canvas_background" height="10" width="40" y="-1" x="-1"/>
         </g>
         <g>
          <title>Layer 1</title>
          <rect fill="#ffffff" id="svg_1" height="3" width="25" y="5" x="5"/>
          <rect fill="#ffffff" id="svg_2" height="1" width="25" y="13" x="5"/>
          <rect fill="#ffffff" id="svg_3" height="2" width="25" y="16" x="5"/>
          <rect fill="#ffffff" id="svg_4" height="3" width="25" y="25" x="5"/>
         </g>
        </svg>
		</div>
		
		<header class="main-header">
        @include('partials._menu')
		
		    <h1 class="logo-wrap">
				    <a href="/">
                @if(Route::current()->getName() == 'home')
					       <img v-if="menu == false" class="we_icon" src="/we_icon.png">
					       <img v-else class="we_icon" src="/we_icon_white.png">
                @else
                  <img class="we_icon" src="/we_icon_white.png">
                @endif
				    </a>
        </h1>
    </header>
      
			
		@yield('content')

	</main>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
