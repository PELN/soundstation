@extends('layouts.master')
@section('title', 'Products')

@section('content')

@if(count($category) == 0)
<section class="section-content padding-y bg">
	<div class="container">
		<h1>Page does not exist</h1>
		<a href="/">Go to Homepage</a>
	</div>
</section>
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

@include('layouts.partials.session_msg')

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
								<input type="radio" name="myfilter_radio" class="condition custom-control-input" value="new">
									<div class="custom-control-label">
										New
									</div>
								</label>

								<label class="custom-control custom-radio">
								<input type="radio" name="myfilter_radio" class="condition custom-control-input" value="used">
									<div class="custom-control-label">Used </div>
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
						</header>
						<div class="filter-content collapse show" id="collapse_2" style="">
							<div class="card-body">
								@foreach($genres as $genre)
								<div class="checkbox-filter">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" 
											class="genre custom-control-input" 
											id="genre-{{$genre->id}}" 
											name="genre"
											value="{{ $genre->genre }}"
										>
										<div class="custom-control-label">{{ $genre->genre }}
											{{-- <b class="badge badge-pill badge-light float-right">{{$genre->products->count()}}</b> --}}
										</div>
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
						<span id="categoryCount" class="mr-md-auto">{{$products->total()}} Products found</span>
						<span id="filteredCount" class="mr-md-auto"></span>
						<select id="sort-by" class="mr-2 form-control">
							<option value="newest">Newest products</option>
							<option value="oldest">Oldest products</option>
							<option value="price-low">Price (Low)</option>
							<option value="price-high">Price (High)</option>
						</select>
						{{-- <div class="btn-group">
							<a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="List view"> 
								<i class="fa fa-bars"></i></a>
							<a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grid view"> 
								<i class="fa fa-th"></i></a>
						</div> --}}
					</div>
				</header><!-- sect-heading -->

				<div id="filter-result">
					<div id="loader">
						<img style="width:60%; z-index: 999; position: relative;" src="{{ asset('storage/loader.gif') }}">
						{{-- <h4>LOADING....</h4> --}}
					</div>
					<div class="row"></div>
				</div>
				
				<div id="all-products">
					<div class="row">
						@foreach ($products as $product)
						<div class="col-md-4">
							<a href="{{ URL::to("{$category->category_slug}/{$product->slug}") }}">
								<figure class="card card-product-grid">
									<div class="img-wrap">
										<!-- <span class="badge badge-danger"> NEW </span> -->
										@if($product->path)
											<img src="{{ asset('storage/product-images/'.$product->path) }}">
										@else
											<img src="{{ asset('storage/product-images/image-coming-soon.jpg') }}">
										@endforelse
									</div> <!-- img-wrap.// -->
									<figcaption class="info-wrap">
										<div class="fix-height">
											<a href="#" class="title">{{$product->name}}</a>
											<p class="artist">{{$product->artist}}</p>
											<div class="price-wrap mt-2">
												<span class="price">DKK {{$product->price}}</span>
												{{-- <del class="price-old">$1980</del> --}}
											</div> <!-- price-wrap.// -->
										</div>
										{{-- <a href="#" class="btn btn-block btn-primary">Add to cart </a> --}}
										<div class="form-row">
											<div class="col">
												<form action="{{ route('cart.store') }}" method="POST">
													{{ csrf_field() }}
													<input type="hidden" value="{{ $product->id }}" class="id" name="id">
													<input type="hidden" value="{{ $product->name }}" class="name" name="name">
													<input type="hidden" value="{{ $product->artist }}" class="artist" name="artist">
													<input type="hidden" value="{{ $product->price }}" class="price" name="price">
													<input type="hidden" value="{{ $product->path }}" class="path" name="path">
													<input type="hidden" value="{{ $product->slug }}" class="slug" name="slug">
													<input type="hidden" value="{{ $product->category_slug }}" class="category_slug" name="category_slug">
													<input type="hidden" value="1" class="quantity" name="quantity">
													<div class="card-footer" style="background-color: white;">
														<div class="row">
															<button class="btn btn-secondary btn-sm" title="add to cart">
																<i class="fa fa-shopping-cart"></i> add to cart
															</button>
															<div class="col">
																<a href="#" class="btn btn-light"> <i class="fas fa-heart"></i></a>
															</div>
														</div>
													</div>
												</form>
											</div> <!-- col.// -->
										</div> <!-- form row.// -->
									</figcaption>
								</figure>
							</a>
						</div> <!-- col.// -->
						@endforeach
					</div> <!-- row end.// -->
				</div>

				<div id="pagination">
					{{ $products->appends($input)->links() }}
				</div>

			</main> <!-- col.// -->
		</div>
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endif
@endsection