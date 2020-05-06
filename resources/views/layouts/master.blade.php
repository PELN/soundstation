<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/ui.css') }}" />
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"/>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slickslider/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slickslider/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/fancybox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/prism.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/assets/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/assets/owl.theme.default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/assets/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/assets/owl.theme.green.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/assets/owl.theme.green.min.css') }}" />

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="https://kit.fontawesome.com/f5a4073c65.js" crossorigin="anonymous"></script>

    <!-- <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon"> -->

    <!-- Font awesome 5 -->
    <!-- <link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet"> -->

</head>
<body>
    @include('layouts.partials.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer')

    <script src="{{ asset('frontend/js/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>

    <script src="{{ asset('frontend/plugins/slickslider/slick.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slickslider/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/prism.js') }}"></script>
    <script src="{{ asset('frontend/plugins/fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>