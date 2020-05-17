@extends('layouts.master')
@section('title', 'Home')

@section('content')

<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro">
	<div class="intro-banner-wrap">
		<img src="/frontend/images/banners/banner-request.jpg" class="w-100 img-fluid">
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
						<span class="icon-sm rounded-circle bg-primary">
							<i class="fa fa-money-bill-alt white"></i>
						</span>
					</div>
					<figcaption class="info">
						<h6 class="title">Reasonable prices</h6>
						<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labor </p>
					</figcaption>
				</figure> <!-- iconbox // -->
			</div><!-- col // -->
			<div class="col-md-4">
					<figure class="itemside">
						<div class="aside">
							<span class="icon-sm rounded-circle bg-danger">
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
						<span class="icon-sm rounded-circle bg-success">
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
<section class="section-content">
	<div class="container">
		<header class="section-heading">
			<a href="/vinyls" class="btn btn-outline-primary float-right">See all</a>
			<h3 class="section-title">New Arrivals</h3>
		</header><!-- sect-heading -->
		<div class="row">
			@foreach ($products as $product)
				<div class="col-md-3">
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
										<a href="#" class="btn  btn-primary w-100"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
									</div> <!-- col.// -->
									<div class="col">
										<a href="#" class="btn  btn-light"> <i class="fas fa-heart"></i></a>
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
