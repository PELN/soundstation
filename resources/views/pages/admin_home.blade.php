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
<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="/" class="brand-wrap">
                        <img class="logo" src="{{ asset('storage/soundstationlogo.jpg') }}">
                    </a> <!-- brand-wrap.// -->
                </div>

                <div class="col-lg-6 col-12 col-sm-12">
                    {{-- <form> --}}
                        <div class="input-group w-100">
                            <input type="text" id="txtSearch" class="form-control" placeholder="Search" minlength="2" maxlength="50">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="searchBtn" type="submit">
                                <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    {{-- </form> --}}
                    <div id="searchResults"></div>
                </div> <!-- col.// -->

                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header icontext">
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        @if (Route::has('register'))
                                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    </div>
                                </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <span href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
                                            {{ Auth::user()->name }} <span class="caret"></span>

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            @if( Auth::user()->is_admin==1 )
                                                <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('user.home') }}">Profile</a>
                                            @endif

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                        
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
</header> <!-- section-header.// -->

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page text-secondary">Admin Dashboard</h2>
    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->
    
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                <ul class="list-group">
                    <a class="list-group-item active" href="#"> Products </a>
                    <a class="list-group-item" href="#"> Orders </a>
                    <a class="list-group-item" href="#"> Returns </a>
                    <a class="list-group-item" href="#"> Mail list </a>
                    <a class="list-group-item" href="#"> Settings </a>
                </ul>
            </aside> <!-- col.// -->
            <main class="col-md-9">
                <article class="card  mb-3">
                    <div class="card-body">
                        <h5 class="card-title mb-4"> Product management</h5>	
                        <div class="row">
                        



                        </div> <!-- row.// -->
                    </div> <!-- card-body .// -->
                </article> <!-- card.// -->
            </main> <!-- col.// -->
        </div>    
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

 <!-- Scripts -->
 <script src="{{ asset('frontend/js/bootstrap-ecommerce/jquery-2.0.0.min.js') }}"></script>
 <script src="{{ asset('frontend/js/bootstrap-ecommerce/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('frontend/js/bootstrap-ecommerce/script.js') }}"></script>
 <script src="{{ mix('frontend/js/app.js') }}"></script>

</body>
</html>