@extends('layouts.master')
@section('title', 'Products')

@section('content')

@if(count($category) == 0)
<section class="section-content padding-y bg">
	<div class="container">
		<h1 class="text-grey">Page does not exist</h1>
		<a href="/">Go to Homepage</a>
	</div>
</section>
@else

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
	<div class="container">
		@if($category)
			<h2 class="title text-grey">{{$category->category}}</h2>
		@endif
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item text-underline"><a href="{{ URL::to("{$category->category_slug}") }}">{{$category->category}}</a></li>
			</ol>
		</nav>
	</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

@include('layouts.partials.session_msg')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<div class="container">
		<div class="row">
			<aside class="col-md-3">

				<div id="mobile-filter-container">
					<div class="row">
						<div class="col-2">
							<button class="filter-btn btn-light">
								<i class="icon-control fa fa-filter"></i>
							</button>
						</div>
						<div class="col-4">
							<span class="category-count mr-md-auto">{{$products->total()}} Products found</span>
							<span class="filtered-count mr-md-auto"></span>
						</div>
						<div class="col-6">
							<select class="sort-by mr-2 form-control">
								<option value="newest">Newest products</option>
								<option value="oldest">Oldest products</option>
								<option value="price-low">Price (Low)</option>
								<option value="price-high">Price (High)</option>
							</select>
						</div>
					</div>
				</div>
				
				<div id="filter-card" class="card mb-4">
					<article class="filter-group">
						<header class="card-header">
							<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true">
								<h6 class="title">Condition <i class="icon-control fa fa-chevron-down"></i></h6>
							</a>
						</header>
						<div id="collapse_1" class="filter-content collapse show">
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
								<h6 class="title">Genre <i class="icon-control fa fa-chevron-down"></i></h6>
							</a>
						</header>
						<div id="collapse_2" class="filter-content collapse show">
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

			<main class="col-lg-9 col-md-9 col-sm-12 col-12">
				<header id="filter-container" class="border-bottom mb-4 pb-3">
					<div class="form-inline">
						<span class="category-count mr-md-auto">{{$products->total()}} Products found</span>
						<span class="filtered-count mr-md-auto"></span>
						<select class="sort-by mr-2 form-control">
							<option value="newest">Newest products</option>
							<option value="oldest">Oldest products</option>
							<option value="price-low">Price (Low)</option>
							<option value="price-high">Price (High)</option>
						</select>						
					</div>
				</header><!-- sect-heading -->

				<div id="filter-result">
					<div id="loader-container" class="overlay">
						<div id="loader">
							<img class="loader-img" src="{{ asset('storage/assets/loader2.gif') }}">
						</div>
					</div>
					<div class="row"></div>
				</div>
				
				<div id="all-products">
					<div class="row">
						@foreach ($products as $product)
						<div class="col-lg-4 col-md-4 col-sm-6 col-6">
							<a href="{{ URL::to("{$category->category_slug}/{$product->slug}") }}">
								<figure class="card card-product-grid">
									<div class="img-wrap">
										@if($product->path)
											<img src="{{ asset('storage/product-images/'.$product->path) }}">
										@else
											<img src="{{ asset('storage/product-images/image-coming-soon.jpg') }}">
										@endforelse
									</div> <!-- img-wrap.// -->
									<figcaption class="info-wrap">
										<div class="fix-height">
											<a href="#" class="title"><span class="text-wrap">{{$product->name}}</span></a>
											<p class="artist">{{$product->artist}}</p>
											<div class="price-wrap mt-2">
												<span class="price">DKK {{$product->price}}</span>
												{{-- <del class="price-old">$1980</del> --}}
											</div> <!-- price-wrap.// -->
										</div>
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
															<div class="col-8">
																<button class="btn btn-outline-secondary" title="add to cart">
																	Add to cart
																</button>
															</div>
															<div class="col-4">
																<a href="#" class="btn btn-light"> <i class="fa fa-heart-o" aria-hidden="true"></i> </a>
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