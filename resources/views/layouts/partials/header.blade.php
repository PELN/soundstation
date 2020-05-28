<header id="header" class="section-header">
	<nav class="navbar navbar-light navbar-expand p-0 border-bottom ">
		<div class="container">
			<ul class="navbar-nav d-none d-md-flex mr-auto">
                <li class="nav-item ml-4">Store opening hours: Weekdays 8-17</li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
                    <li class="nav-item"><a class="nav-link" href="/about">About us</a></li>
					<li class="nav-item"><a class="nav-link" href="/faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/grading-guide">Grading guide</a></li>
					<a href="#" class="nav-link dropdown-toggle mr-4" data-toggle="dropdown"> English </a>
					<ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
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
    </nav> 

	<section class="header-main border-bottom">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-2">
					<a href="/">
						<img class="logo" src="{{ asset('storage/assets/soundstationlogo.jpg') }}">
					</a>
				</div>

				<div class="col-5">
					<div class="input-group w-100">
						<input type="text" class="txt-search form-control" placeholder="Search for a title or artist" minlength="2" maxlength="50">
						<div class="input-group-append">
							<button class="btn btn-primary search-btn" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
					<div class="search-results"></div>
				</div> <!-- col.// -->

				<div class="col-5">
					<div class="widgets-wrap float-md-right">
						<div class="widget-header icontext">
							<ul class="navbar-nav ml-auto">
								@guest
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										<span href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
										<div class="dropdown-divider"></div>
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
							<ul class="navbar-nav ml-auto">
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link"
									href="#" role="button" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false"> 
										<span class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i> 
										<span class="badge badge-pill badge-danger notify">{{ \Cart::getTotalQuantity()}}</span>
										</span>
									</a>
									<div class="cart-menu-desktop dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
										<ul class="list-group">
											@include('components.cart_dropdown')
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div> <!-- widgets-wrap.// -->
				</div> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- container.// -->
	</section> <!-- header-main .// -->

	<nav class="navbar navbar-main navbar-light border-bottom">
		<div class="container">
			<div id="main-nav">
				<ul id="nav-categories" class="navbar-nav">
					@foreach($categories as $category)
						@if($category->items->count() > 0)
							<li class="nav-item dropdown">
								<a class="nav-link" href="{{ route('category.show', $category->category_slug) }}" data-toggle="dropdown" 
									role="button" aria-haspopup="true" aria-expanded="false" v-pre id="{{ $category->category_slug}}"> 
									{{ $category->category }} <i class="fa fa-chevron-down"></i>
								</a>
								<div class="category-dropdown dropdown-menu dropdown-menu-right" aria-labelledby="{{ $category->category_slug }}">
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
				</ul>
			</div>
		</div> <!-- container .// -->
	</nav>
</header> <!-- section-header.// -->


