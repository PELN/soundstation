
<header class="section-header">

<nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
<div class="container">
    <ul class="navbar-nav d-none d-md-flex mr-auto">
		<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
		<li class="nav-item"><a class="nav-link" href="#">Delivery</a></li>
		<li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
    </ul>
    <ul class="navbar-nav">
		<li  class="nav-item"><a href="#" class="nav-link"> Call: +99812345678 </a></li>
		<li class="nav-item dropdown">
		 	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> English </a>
		    <ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
				<li><a class="dropdown-item" href="#">Arabic</a></li>
				<li><a class="dropdown-item" href="#">Russian </a></li>
				<li><a class="dropdown-item" href="#">Danish </a></li>
				<li><a class="dropdown-item" href="#">Spanish </a></li>
				<li><a class="dropdown-item" href="#">German </a></li>
				<li><a class="dropdown-item" href="#">French </a></li>
		    </ul>
		</li>

		{{-- <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			Logout
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form> --}}

	</ul> <!-- list-inline //  -->
  </div> <!-- navbar-collapse .// -->
</div> <!-- container //  -->
</nav> <!-- header-top-light.// -->

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
				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
				<div class="text">
					<!-- <span class="text-muted">Welcome!</span> -->
					<div> 
						<a href="/login">Sign in</a>
						{{-- |  <a href="/register"> Register</a> --}}
					</div>
				</div>
            </div>
            <div class="widget-header">
				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-heart"></i></a>
			</div>
			<div class="widget-header  mr-3">
				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
				<span class="badge badge-pill badge-danger notify">0</span>
            </div>
		</div> <!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->

<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main_nav">
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
        </ul>
	</div>
  </div> <!-- container .// -->
</nav>

{{-- get the requested slug for secondary menu --}}
{{-- @if(request()->slug === 'autographs' || request()->slug === 'record-awards' || request()->slug === 'posters-postcards-artwork' || request()->slug === 'tour-programmes-folders-books' || request()->slug === 'mischellaneous')
		<ul class="navbar-nav secondary">
			@foreach($categories as $category)
				@if($category->items->count() > 0)
					@foreach($category->items as $item)
					<li class="nav-item secondary">
						<a class="nav-link secondary" href="{{ route('category.show', $item->category_slug) }}">{{ $item->category }}</a>
					</li>
					@endforeach
				@endif
			@endforeach
		</ul>
@endif
</header> <!-- section-header.// --> --}}
