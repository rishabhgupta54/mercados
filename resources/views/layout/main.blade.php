<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
    <link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
	<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    @stack('header')
</head>
<body data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
    <div id="wrapper">
        @include('layout.partials.top-bar')
        @include('layout.partials.side-bar')
        @yield('content')
    </div>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
        @if(Session::has('info'))
            toastr.info('{{ Session::get('info') }}');
        @endif
        @if(Session::has('warning'))
            toastr.warning('{{ Session::get('warning') }}');
        @endif
        @if(Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @endif
</script>
    @stack('footer')
</body>
</html>
