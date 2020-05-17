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
    
    <!-- plugin: slickslider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slickslider/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slickslider/slick.css') }}" />

    <link rel="stylesheet" href="{{ mix('frontend/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('frontend/css/base.css') }}">
    
    <script src="https://kit.fontawesome.com/f5a4073c65.js" crossorigin="anonymous"></script>

    <!-- Font awesome 5 -->
    <!-- <link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet"> -->
</head>
<body>
    @include('layouts.partials.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer')

    <script src="{{ asset('frontend/js/bootstrap-ecommerce/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/script.js') }}"></script>
    <script src="{{ asset('frontend/js/components/ajaxFilter.js') }}"></script>
    <script src="{{ asset('frontend/js/components/ajaxSearch.js') }}"></script>
    <script src="{{ asset('frontend/js/app.js') }}"></script>

    <!-- plugin: slickslider -->
    <script type="text/javascript" src="{{ asset('frontend/plugins/slickslider/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/plugins/slickslider/slick-slider.js') }}"></script>

</body>
</html>