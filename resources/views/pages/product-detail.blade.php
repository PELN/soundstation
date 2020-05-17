@extends('layouts.master')
@section('title', 'Product Details')

@section('content')

<section class="section-content padding-y bg">
<div class="container">
@if(count($product) == 0)
	<h2>Product was not found</h2>
	<a href="/">Go to Homepage</a>
@else

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
	<div class="container">
		<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ URL::to("{$category->category_slug}") }}">{{$category->category}}</a></li>
			<li class="breadcrumb-item"><a href="{{ URL::to("{$category->category_slug}/{$product->slug}") }}">{{$product->name}}</a></li>
		</ol>
		</nav>
	</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ============================ COMPONENT 2 ================================= -->
<div class="card">
	<div class="row no-gutters">
		<aside class="col-sm-6 border-right">
			<article class="gallery-wrap">
				@forelse ($product->images as $image)
					@if($loop->first)
						<div class="img-big-wrap">
							<a href="#"><img src="{{ asset('storage/product-images/'.$image->path) }}"></a>
						</div> <!-- img-big-wrap.// -->
					@else
						<div class="thumbs-wrap">
							<a href="#" class="item-thumb"> <img width="152px;" src="{{ asset('storage/product-images/'.$image->path) }}"></a>
						</div> <!-- thumbs-wrap.// -->
					@endif
				@empty
					<div class="img-big-wrap">
						<a href="#"><img src="{{ asset('storage/product-images/image-coming-soon.jpg') }}"></a>
					</div> <!-- img-big-wrap.// -->
				@endforelse
			</article> <!-- gallery-wrap .end// -->
		</aside>

		<main class="col-sm-6">
			<article class="content-body">
				<h2 class="title">{{$product->name}}</h2>

				<h3>{{ $product->artists->implode('artist', ', ') }}</h3>

				<h4>Genres</h4>
				<ul class="list-normal cols-two">
				@foreach ($product->genres as $genre)
					<li>{{$genre->genre}}</li>
				@endforeach
				</ul>
				<h4>Subgenre</h4>
				<ul class="list-normal cols-two">
				@foreach ($product->subgenres as $subgenre)
					<li>{{$subgenre->subgenre}}</li>
				@endforeach
				</ul>

				<div class="h3 mb-4"> 
					<var class="price h4">DKK {{$product->price}}</var> 
				</div> <!-- price-wrap.// -->

				@if($product->quantity >= 1)
					<div class="badge badge-success">In stock</div>
				@else
					<div class="badge badge-danger">Not in stock</div>
				@endif
				
				<div class="form-row">
					<div class="col-2">
						<select class="form-control">
							{{ $quantity = $product->quantity }}
							@for ($i = 1; $quantity >= $i; $i++)
								<option>{{ $i }}</option>
							@endfor
						</select>
					</div> <!-- col.// -->

					<div class="col">
						<a href="#" class="btn  btn-primary w-100"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
					</div> <!-- col.// -->
					<div class="col">
						<a href="#" class="btn  btn-light"> <i class="fas fa-heart"></i>  </a>
					</div> <!-- col.// -->
				</div> <!-- row.// -->

			</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->

<!-- ============================ COMPONENT 2 END .// ================================= -->

<!-- ============================ COMPONENT 4  ================================= -->
<article class="card">
	<div class="card-body">
		<div class="row">
			<aside class="col-md-6">
				<h5>Specifications</h5>
				<dl class="row">
				    <dt class="col-sm-3">Artist</dt>
					<dd class="col-sm-9">{{ $product->artists->implode('artist', ', ') }}</dd>

					<dt class="col-sm-3">Format</dt>
					<dd class="col-sm-9">{{ $product->formats->implode('format', ', ') }}</dd>

					<dt class="col-sm-3">Label</dt>
					<dd class="col-sm-9">{{ $product->labels->implode('label', ', ') }}</dd>

					<dt class="col-sm-3">Catalogue no.</dt>
					<dd class="col-sm-9">{{ $product->cataloguenumber->cat_no }}</dd>

					<dt class="col-sm-3">Country</dt>
					<dd class="col-sm-9">{{ $product->country->implode('country', ', ') }}</dd>
				</dl>
			</aside>
			<aside class="col-md-6">
				{{-- <h5>Features</h5> --}}
				<dl class="row">
					<dt class="col-sm-3">Condition</dt>
					@if($product->media_condition == 0)
						<dd class="col-sm-9">Used</dd>
					@else
						<dd class="col-sm-9">New</dd>
					@endif
					<dt class="col-sm-3">Year</dt>
					<dd class="col-sm-9">{{ $product->year[0]->year }}</dd>

					<dt class="col-sm-3">Grading</dt>
					<dd class="col-sm-9">{{ $product->gradings[0]->grading }}</dd>

					<dt class="col-sm-3">Comment</dt>
					<dd class="col-sm-9">{{ $product->comment->comment }}</dd>

					<dt class="col-sm-3">Genre</dt>
					<dd class="col-sm-9">{{ $product->genres->implode('genre', ', ') }}</dd>

					<dt class="col-sm-3">Subgenre</dt>
					<dd class="col-sm-9">{{ $product->subgenres->implode('subgenre', ', ') }}</dd>
				</dl>
			</aside>
		</div> <!-- row.// -->
		<hr>
		
		<h5>Description</h5>
		{{-- Split description in lines with regex --}}
		@foreach ($splitDescLines as $line)
			<p>{{$line}}</p>
		@endforeach

	</div> <!-- card-body.// -->
</article> <!-- card.// -->
<!-- ============================ COMPONENT 4  .//END ================================= -->

<div class="row">
	<aside class="col-md-12">
<!-- ============== COMPONENT SLIDER CUSTOM  ============= -->
		<div class="btn-group  float-right">
			<button type="button" class="btn btn-primary slick-prev-custom"> <i class="fa fa-chevron-left"></i> </button>
			<button type="button" class="btn btn-primary slick-next-custom"> <i class="fa fa-chevron-right"></i> </button>
		</div>

		<h4>Related products</h4>
		<hr>
		<div class="slider-custom-slick row">
			@foreach ($relatedProducts as $product)
				<div class="item-slide p-2">
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
										<a href="#" class="btn  btn-primary w-100"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
									</div> <!-- col.// -->
									<div class="col">
										<a href="#" class="btn  btn-light"> <i class="fas fa-heart"></i></a>
									</div> <!-- col.// -->
								</div> <!-- form row.// -->
							</figcaption>
						</figure>
					</a>
				</div>
			@endforeach
		</div> <!-- slider-items-slick.// -->
<!-- ============== COMPONENT SLIDER CUSTOM .end // ============= -->
	</aside> <!-- col.// -->
</div>
	
	{{-- <figure class="card card-product-grid">
		<div class="img-wrap"> 
			<img src="{{ asset('storage/'.$product->path) }}"> 
		</div>
		<figcaption class="info-wrap text-center">
			<h6 class="title text-truncate"> <a href="/">{{$product->name}}</a></h6>
			<h6 class="title text-truncate"> <a href="/">{{$product->genre}}</a></h6>
		</figcaption>
	</figure> --}}

@endif
@endsection