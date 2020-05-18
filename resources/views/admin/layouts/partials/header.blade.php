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
