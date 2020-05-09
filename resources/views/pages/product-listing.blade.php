@extends('layouts.master')
@section('title', 'Products')

@section('content')

@if(count($category) == 0)
<h1>SORRY, NO PRODUCTS FOUND</h1>
@else


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
	<div class="container">
		@if($category)
			<h2>{{$category->name}}</h2>
		@endif
		<nav>
		<ol class="breadcrumb text-white">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Best category</a></li>
			<li class="breadcrumb-item active" aria-current="page">Great articles</li>
		</ol>
		</nav>
	</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->


{{-- @if(request()->slug === 'autographs' || request()->slug === 'record-awards' || request()->slug === 'posters-postcards-artwork' || request()->slug === 'tour-programmes-folders-books' || request()->slug === 'mischellaneous') --}}
	{{-- @foreach($categories as $category)
		@if($category->items->count() > 0)
			@foreach($category->items as $item)
			<li class="nav-item secondary">
				<a class="nav-link secondary" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
			</li>
			@endforeach
		@endif
	@endforeach --}}
{{-- @endif --}}

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<div class="container">

		{{-- {{ Route::input('value')}} --}}

		{{$genre}}
		{{$condition}}
{{-- 
	@foreach ($category->products as $product)
		@foreach($product->genres as $genre)
			<div>{{$product->name}}</div>
			<div>{{$genre->genre}}</div>
		@endforeach
	@endforeach --}}


	<div class="row">
		<aside class="col-md-3">
			<div class="card">
				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Condition</h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_1" style="">
						<div class="card-body">
							<label class="custom-control custom-radio">
							<input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
							<div class="custom-control-label">Any condition</div>
							</label>

							<label class="custom-control custom-radio">
							<input type="radio" name="myfilter_radio" class="custom-control-input">
							<div class="custom-control-label">Brand new </div>
							</label>

							<label class="custom-control custom-radio">
							<input type="radio" name="myfilter_radio" class="custom-control-input">
							<div class="custom-control-label">Used items</div>
							</label>
						</div><!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->
				{{-- <article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Product type</h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_1" style="">
						<div class="card-body">
							<form class="pb-3">
							<div class="input-group">
							<input type="text" class="form-control" placeholder="Search">
							<div class="input-group-append">
								<button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
							</div>
							</div>
							</form>
							
							<ul class="list-menu">
							<li><a href="#">People  </a></li>
							<li><a href="#">Watches </a></li>
							<li><a href="#">Cinema  </a></li>
							<li><a href="#">Clothes  </a></li>
							<li><a href="#">Home items </a></li>
							<li><a href="#">Animals</a></li>
							<li><a href="#">People </a></li>
							</ul>

						</div> <!-- card-body.// -->
					</div>
				</article> <!-- filter-group  .// --> --}}
				
				

				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Genre </h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_2" style="">
						<div class="card-body">
							@foreach($genres as $genre)
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="genre-{{$genre->id}}">
									<a href={{ request()->fullUrlWithQuery(['genre' => $genre->genre]) }}><div class="custom-control-label">{{ $genre->genre }}</a>
										{{-- @foreach ($category->products as $product) --}}
											{{-- @foreach($product->genres as $p_genre) --}}
											{{-- <b class="badge badge-pill badge-light float-right">{{$genre->products->count()}}</b> --}}
											{{-- @endforeach --}}
										{{-- @endforeach --}}
									</div>
								</label>
							@endforeach

							{{-- <div class="card-body">
								<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input">
									@foreach ($category->products as $product)
										@foreach($product->genres as $genre)
											<div class="custom-control-label">{{$genre->genre}}
												<b class="badge badge-pill badge-light float-right">{{$genre->products->count()}}</b>
											</div>
										@endforeach
									@endforeach
							</div> <!-- card-body.// --> --}}

						</div> <!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->
				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Period range </h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_3" style="">
						<div class="card-body">
							<input type="range" class="custom-range" min="0" max="100" name="">
							<div class="form-row">
							<div class="form-group col-md-6">
							<label>1950</label>
							{{-- <input class="form-control" placeholder="$0" type="number"> --}}
							</div>
							<div class="form-group text-right col-md-6">
							<label>2020</label>
							{{-- <input class="form-control" placeholder="$1,0000" type="number"> --}}
							</div>
							</div> <!-- form-row.// -->
							<button class="btn btn-block btn-primary">Apply</button>
						</div><!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->
				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Period </h6>
						</a>
					</header>
					<div class="filter-content collapse show" id="collapse_3" style="">
						<div class="card-body">
						<label class="checkbox-btn">
							<input type="checkbox">
							<span class="btn btn-light"> 1999 </span>
						</label>

						<label class="checkbox-btn">
							<input type="checkbox">
							<span class="btn btn-light"> 2002 </span>
						</label>

						<label class="checkbox-btn">
							<input type="checkbox">
							<span class="btn btn-light"> 1009 </span>
						</label>

						<label class="checkbox-btn">
							<input type="checkbox">
							<span class="btn btn-light"> 2020 </span>
						</label>
					</div><!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->
			</div> <!-- card.// -->
		</aside> <!-- col.// -->

	<main class="col-md-9">
	<header class="border-bottom mb-4 pb-3">
		<div class="form-inline">
			<span class="mr-md-auto">{{$category->products->count()}} Items found </span>
			<select class="mr-2 form-control">
				<option>Latest items</option>
				<option>Trending</option>
				<option>Most Popular</option>
				<option>Cheapest</option>
			</select>
			{{-- <div class="btn-group">
				<a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="List view"> 
					<i class="fa fa-bars"></i></a>
				<a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grid view"> 
					<i class="fa fa-th"></i></a>
			</div> --}}
		</div>
	</header><!-- sect-heading -->

	{{-- <a href={{ request()->fullUrlWithQuery(['genre' => 'country']) }}>country</a> --}}
	<a href={{ request()->fullUrlWithQuery(['condition' => 'new']) }}>new</a>


	{{-- TODO// if no products matches genre, write: no matches --}}
	{{-- TODO// when genre is chosen, set checkbox to checked and the other way around - they are not connected now --}}
	{{-- should be possible to choose more genres?? now it is only possible to choose one --}}
	{{-- make it work with condition - new/used --}}

	<h4>Genre: {{$filterGenre->genre}}</h4>

	<div class="row">
		{{-- find products within genre --}}
		@forelse($filterGenre->products as $genre_product)
		{{-- {{ $genre_product }} --}}
		<div class="col-md-4">
			<a href="{{ URL::to("{$category->slug}/{$product->slug}") }}">
				<figure class="card card-product-grid">
					<div class="img-wrap"> 
						@forelse ($genre_product->images as $image)
							@if($loop->first)
							<img src="{{ asset('storage/'.$image->path) }}">
							@endif
						@empty
							<img src="{{ asset('storage/image-coming-soon.jpg') }}">
						@endforelse
					</div> <!-- img-wrap.// -->
					<figcaption class="info-wrap">
						<div class="fix-height">
							<a href="#" class="title">{{$genre_product->name}}</a>
							<div class="price-wrap mt-2">
								<span class="price">DKK {{$genre_product->price}}</span>
								{{-- <del class="price-old">$1980</del> --}}
							</div> <!-- price-wrap.// -->
						</div>
						<a href="#" class="btn btn-block btn-primary">Add to cart </a>
					</figcaption>
				</figure>
				</a>
			</div> <!-- col.// -->
		@empty
			{{-- find products within category --}}
			@foreach ($category->products as $product)
			<div class="col-md-4">
			<a href="{{ URL::to("{$category->slug}/{$product->slug}") }}">
				<figure class="card card-product-grid">
					<div class="img-wrap"> 
						<!-- <span class="badge badge-danger"> NEW </span> -->
						@forelse ($product->images as $image)
							@if($loop->first)
								<img src="{{ asset('storage/'.$image->path) }}">
							@endif
						@empty
							<img src="{{ asset('storage/image-coming-soon.jpg') }}">
						@endforelse
						{{-- <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a> --}}
					</div> <!-- img-wrap.// -->
					<figcaption class="info-wrap">
						<div class="fix-height">
							<a href="#" class="title">{{$product->name}}</a>
							<div class="price-wrap mt-2">
								<span class="price">DKK {{$product->price}}</span>
								{{-- <del class="price-old">$1980</del> --}}
							</div> <!-- price-wrap.// -->
						</div>
						<a href="#" class="btn btn-block btn-primary">Add to cart </a>
					</figcaption>
				</figure>
				</a>
			</div> <!-- col.// -->
			@endforeach
		@endforelse
	</div> <!-- row end.// -->


			<nav class="mt-4" aria-label="Page navigation sample">
				<ul class="pagination">
					<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</nav>

			</main> <!-- col.// -->
		</div>
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endif
@endsection