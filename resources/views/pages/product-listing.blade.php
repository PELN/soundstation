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
			<h2>{{$category->category}}</h2>
		@endif
		<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ URL::to("{$category->category_slug}") }}">{{$category->category}}</a></li>
			{{-- <li class="breadcrumb-item"><a href="{{ URL::to("{$category->category_slug}/{$product->slug}") }}">{{$product->name}}</a></li> --}}
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

	{{-- get request from controller --}}
	{{-- {{$genre}}
	{{$condition}} --}}

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
							<input type="radio" name="myfilter_radio" checked="" class="condition custom-control-input" value="any">
							<div class="custom-control-label">Any condition</div>
							</label>

							<label class="custom-control custom-radio">
								{{-- <a href={{ request()->fullUrlWithQuery(['condition' => 'new']) }}> --}}
							<input type="radio" name="myfilter_radio" class="condition custom-control-input" value="new">
								<div class="custom-control-label">
									New
								</div>
							{{-- </a> --}}
							</label>

							<label class="custom-control custom-radio">
							<input type="radio" name="myfilter_radio" class="condition custom-control-input" value="used">
							{{-- <a href={{ request()->fullUrlWithQuery(['condition' => 'used']) }}> --}}
								<div class="custom-control-label">Used </div>
							{{-- </a> --}}
							</label>
						</div><!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->

				<article class="filter-group">
					<header class="card-header">
						<a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
							<i class="icon-control fa fa-chevron-down"></i>
							<h6 class="title">Genre </h6>
						</a>
						{{-- <a href={{ request()->merge(['genre' => $genre->genre]) }}>Remove filters</a> --}}
					</header>
					<div class="filter-content collapse show" id="collapse_2" style="">
						<div class="card-body">
							@foreach($genres as $genre)
							<div class="checkbox-filter">
								<label class="custom-control custom-checkbox">
									{{-- <a href={{ request()->fullUrlWithQuery(['genre' => $genre->genre]) }}> --}}
										<input type="checkbox" 
											class="genre custom-control-input" 
											{{-- id="genre"  --}}
											name="genre"
											value="{{ $genre->genre }}"
											>
											<div class="custom-control-label">{{ $genre->genre }}
												{{-- <b class="badge badge-pill badge-light float-right">{{$genre->products->count()}}</b> --}}
											</div>
										{{-- </a> --}}
										</label>
									</div>
							@endforeach
						</div> <!-- card-body.// -->
					</div>
				</article> <!-- filter-group .// -->
			</div> <!-- card.// -->
		</aside> <!-- col.// -->

	<main class="col-md-9">
	<header class="border-bottom mb-4 pb-3">
		<div class="form-inline">
			<span class="mr-md-auto">{{$category->products->count()}} Products found </span>
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
	{{-- <a href={{ request()->fullUrlWithQuery(['condition' => 'used']) }}>used</a> --}}

	<div class="row">
			{{-- find products within category --}}
			@foreach ($products as $product)
			<div class="col-md-4">
			<a href="{{ URL::to("{$category->category_slug}/{$product->slug}") }}">
				<figure class="card card-product-grid">
					<div class="img-wrap">
						<!-- <span class="badge badge-danger"> NEW </span> -->
						@if($product->path)
							<img src="{{ asset('storage/'.$product->path) }}">
						@else
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