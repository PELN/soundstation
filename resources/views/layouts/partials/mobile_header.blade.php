<header id="mobile-header" class="section-header">
    <nav class="mobile-nav navbar navbar-expand-lg navbar-light">
        <div class="col-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-burger" aria-controls="navbar-burger" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-2">
            <a href="/">
                <img class="mobile-nav logo" src="{{ asset('storage/assets/soundstationlogo.jpg') }}">
            </a>
        </div>

        <div class="col-8">
            <div class="widgets-wrap float-md-right">
                <div class="widget-header">
                    <ul id="navbar-user" class="navbar-nav">
                        @guest
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    <div class="dropdown-divider"></div>

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
                                    <div class="dropdown-divider"></div>

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

        <div class="collapse navbar-collapse" id="navbar-burger">
            <div class="burger-container">
            
                <div class="search-bar row">
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

                <ul id="navbar-category" class="navbar-nav">
                    @foreach($categories as $category)
                        @if($category->items->count() > 0)
                            <li class="nav-item">
                                <a class="nav-link pl-0 navbar-toggle collapsed" role="button" data-toggle="collapse" href="{{ route('category.show', $category->category_slug) }}" 
                                id="{{ $category->category_slug}}" data-target="#category-dropdown">{{ $category->category }} <i class="fa fa-chevron-down"></i></a>
                                <div id="category-dropdown" class="navbar-nav dropdown-menu collapse" aria-labelledby="{{ $category->category_slug }}">
                                    @foreach($category->items as $item)
                                        <a class="dropdown-item" href="{{ route('category.show', $item->category_slug) }}">{{ $item->category }}</a>
                                        @if (!$loop->last)
                                            <div class="dropdown-divider"></div>
                                        @endif
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
						<a class="nav-link" href="#">Gift card</a>
                    </li>
                    
                    <li class="nav-item">
                        <li class="nav-item"><a class="nav-link" href="/about">About us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/faq">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="/grading-guide">Grading guide</a></li>
                        <a href="#" class="nav-link navbar-toggle collapsed" role="button" data-toggle="collapse" data-target="#navbar-language" 
                            aria-expanded="false" aria-controls="navbar"> English <i class="fa fa-chevron-down"></i></a>
                        <ul id="navbar-language" class="navbar-nav dropdown-menu collapse" style="margin:0 padding: 0;">
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#">Russian </a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#">Danish </a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#">Spanish </a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#">German </a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="#">French </a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>