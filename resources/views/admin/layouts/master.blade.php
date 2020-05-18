<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ui.css') }}" />
    <link rel="stylesheet" href="{{ mix('frontend/css/app.css') }}">    
    <script src="https://kit.fontawesome.com/f5a4073c65.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('admin.layouts.partials.header')

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/script.js') }}"></script>
    <script src="{{ mix('frontend/js/app.js') }}"></script>

    </body>
</html>


