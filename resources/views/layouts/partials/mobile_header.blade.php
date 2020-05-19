
<header id="mobile-header" class="section-header">
    <nav class="mobile-nav navbar navbar-expand-lg navbar-light">
        <div class="col-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBurger" aria-controls="navbarBurger" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-4">
            <a href="/">
                <img class="mobile-nav logo" src="{{ asset('storage/soundstationlogo.jpg') }}">
            </a>
        </div>

        <div class="col-6">

            <div class="widgets-wrap float-md-right">

                <div class="widget-header">
                    <ul id="navbarUser" class="navbar-nav">
                        @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </div>
                        </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if( Auth::user()->is_admin==1 )
                                        <a class="dropdown-item" href="{{ route('admin.home') }}">Dashboard</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('home') }}">Profile</a>
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

                <div class="widget-header">
                    <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                </div>

                <div class="widget-header mr-3">
                    <a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i> 
                            <span class="badge badge-pill badge-danger notify">{{ \Cart::getTotalQuantity()}}</span>
                        </span>
                    </a>
                    <div class="cart-menu-mobile dropdown-menu dropdown-menu-right">
                        @include('components.cart_dropdown')
                    </div>
                </div>
            </div> <!-- widgets-wrap.// -->
        </div> <!-- col.// -->

        <div class="collapse navbar-collapse" id="navbarBurger">
            <div class="row">
                <div class="input-group w-100">
                    <input type="text" class="form-control" placeholder="Search for a title or artist" minlength="2" maxlength="50">
                    {{-- <input type="text" class="txt-search form-control" placeholder="Search for a title or artist" minlength="2" maxlength="50"> --}}
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                        {{-- <button class="btn btn-primary search-btn" type="submit"> --}}
                        <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            {{-- <div class="search-results"></div> --}}

            <ul class="navbar-nav">
                @foreach($categories as $category)
                    @if($category->items->count() > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link pl-0" data-toggle="dropdown" href="{{ route('category.show', $category->category_slug) }}" 
                            id="{{ $category->category_slug}}">{{ $category->category }} <i class="fa fa-chevron-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="{{ $category->category_slug }}">
                                @foreach($category->items as $item)
                                    <a class="dropdown-item" href="{{ route('category.show', $item->category_slug) }}">{{ $item->category }}</a>
                                @endforeach
                            </div>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.show', $category->category_slug) }}">{{ $category->category }}</a>
                        </li>
                        @endif
                @endforeach

                <li class="nav-item">
                    <li class="nav-item"><a class="nav-link" href="#">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Grading guide</a></li>
                    <a href="#" class="nav-link navbar-toggle collapsed" role="button" data-toggle="collapse" data-target="#navbarLanguage" 
                        aria-expanded="false" aria-controls="navbar"> English <i class="fa fa-chevron-down"></i></a>
                    <ul id="navbarLanguage" class="navbar-nav dropdown-menu collapse" style="margin:0 padding: 0;">
                        <li><a class="dropdown-item" href="#">Arabic</a></li>
                        <li><a class="dropdown-item" href="#">Russian </a></li>
                        <li><a class="dropdown-item" href="#">Danish </a></li>
                        <li><a class="dropdown-item" href="#">Spanish </a></li>
                        <li><a class="dropdown-item" href="#">German </a></li>
                        <li><a class="dropdown-item" href="#">French </a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>

</header>