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
    
    <!-- plugin: slickslider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slickslider/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slickslider/slick.css') }}" />

    <link rel="stylesheet" href="{{ mix('frontend/css/app.css') }}">
    
    <script src="https://kit.fontawesome.com/f5a4073c65.js" crossorigin="anonymous"></script>

</head>
<body>
    @include('layouts.partials.mobile_header')
    @include('layouts.partials.header')
    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-ecommerce/script.js') }}"></script>
    <script src="{{ asset('frontend/js/components/ajaxFilter.js') }}"></script>
    <script src="{{ asset('frontend/js/components/ajaxSearch.js') }}"></script>
    <script src="{{ asset('frontend/js/components/showMoreOrLess.js') }}"></script>
    <script src="{{ asset('frontend/js/components/showOrHideFilter.js') }}"></script>
    <script src="{{ mix('frontend/js/app.js') }}"></script>

    <!-- Plugin: slickslider -->
    <script type="text/javascript" src="{{ asset('frontend/plugins/slickslider/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/plugins/slickslider/slick-slider.js') }}"></script>


    <script>
        // var pathname = window.location.pathname;
        // console.log('pathname',pathname);

        // // Get
        // var status = localStorage.getItem("status");
        // var elHref = localStorage.getItem("elementsHref")
        // $(".nav-item a[href$='"+elHref+"']").addClass(status);

        // $(".nav-item a").bind('click', function () {
        //     // Set
        //     localStorage.setItem("status", "active");
        //     localStorage.setItem("elementsHref", $(this).attr("href"))
        //     $(".nav-item a").removeClass(localStorage.getItem("status"));
        //     $(this).addClass(localStorage.getItem("status"));
        // });

        // if(pathname == "/" || pathname == "/search-result-page"){
        //     $(".nav-item a").removeClass(localStorage.getItem("status"));
        // }

        // TODO:
        // change active based on which product has been clicked on??
        // change active if click on link with #
        // if click on footer link, it does not work
        // if click on top nav link it does nto work

    </script>
    

</body>
</html>