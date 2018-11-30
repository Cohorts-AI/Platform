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

<body>
	
	@yield('content')
	
</body>
</html>