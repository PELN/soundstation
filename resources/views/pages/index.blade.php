@extends('layouts.master')
@section('title', 'Home')

@section('content')

@include('layouts.partials.session_msg')

<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro">
	<div class="intro-banner-wrap">
		<div class="intro-banner-overlay">
			<div class="intro-banner-text">
				<h1>New, Used and Rare -</h1>
				<h2>Vinyl, CD’s, DVD’s and Memorabilia</h2>
				<h3>Since 1991</h3>
				<div class="row">
					<a class="btn btn-primary ml-3 mr-3 mt-3">33 21 40 43</a>
					<a class="btn btn-outline-primary mt-3">info@soundstation.dk</a>
				</div>
				{{-- <img src="{{ asset('storage/Vinyl-records-player_1600x1200.jpg') }}" class="w-100 img-fluid"> --}}
			</div>
		</div>
	</div>
</section>
<!-- ========================= SECTION INTRO END// ========================= -->


<!-- ========================= SECTION SPECIAL ========================= -->
<section class="section-specials padding-y border-bottom">
	<div class="container">	
		<div class="row">
			<div class="col-md-4">	
				<figure class="itemside">
					<div class="aside">
						<span class="icon-sm rounded-circle bg-primary mr-3">
							<i class="fas fa-tags white"></i>
						</span>
					</div>
					<figcaption class="info">
						<h6 class="title">6000+ products</h6>
						<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labor </p>
					</figcaption>
				</figure> <!-- iconbox // -->
			</div><!-- col // -->
			<div class="col-md-4">
					<figure class="itemside">
						<div class="aside">
							<span class="icon-sm rounded-circle bg-danger mr-3">
								<i class="fa fa-comment-dots white"></i>
							</span>
						</div>
						<figcaption class="info">
							<h6 class="title">Customer support 24/7 </h6>
							<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labor </p>
						</figcaption>
					</figure> <!-- iconbox // -->
			</div><!-- col // -->
			<div class="col-md-4">
				<figure class="itemside">
					<div class="aside">
						<span class="icon-sm rounded-circle bg-success mr-3">
							<i class="fa fa-truck white"></i>
						</span>
					</div>
					<figcaption class="info">
						<h6 class="title">Quick delivery</h6>
						<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labor </p>
					</figcaption>
				</figure> <!-- iconbox // -->
			</div><!-- col // -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section>
<!-- ========================= SECTION SPECIAL END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content mt-5 mb-5">
	<div class="container">
		<header class="section-heading">
			<a href="/vinyls" class="btn btn-outline-primary float-right">See all</a>
			<h2 class="section-title title text-grey">New Arrivals</h2>
		</header><!-- sect-heading -->
		<div class="row">
			@foreach ($products as $product)
				<div class="col-lg-4 col-md-4 col-sm-6 col-6">
					<a href="{{ URL::to("{$product->category_slug}/{$product->slug}") }}">
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
		</div> <!-- row.// -->
	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

@endsection
