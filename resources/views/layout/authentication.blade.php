<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
</head>
<body class="authentication-bg authentication-bg-pattern">
    @yield('content')
</body>
</html>
