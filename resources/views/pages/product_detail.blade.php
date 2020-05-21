@extends('layouts.master')
@section('title', 'Product Details')

@section('content')

<section class="section-content padding-y bg">
<div class="container">
@if(count($product) == 0)
	<h2 class="text-grey">Product was not found</h2>
	<a href="/">Go to Homepage</a>
@else

@include('layouts.partials.session_msg')

<!-- ========================= BREADCRUMBS ========================= -->
{{-- <section class="section-pagetop bg"> --}}
	{{-- <div class="container"> --}}
	<div id="breadcrumb-container">
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="{{ URL::to("{$category->category_slug}") }}">{{$category->category}}</a></li>
				<li class="breadcrumb-item text-underline"><a href="{{ URL::to("{$category->category_slug}/{$product->slug}") }}">{{$product->name}}</a></li>
			</ol>
		</nav>
	</div>
	{{-- </div> <!-- container //  --> --}}
{{-- </section> --}}
<!-- ========================= BREADCRUMBS END// ========================= -->


<!-- ============================ COMPONENT 2 ================================= -->
<div class="card">
	<div class="row no-gutters">
		<aside id="gallery-container" class="col-sm-6 border-right">
			<article class="gallery-wrap">
				@forelse ($product->images as $image)
					@if($loop->first)
						<div class="img-big-wrap mt-4 mb-4">
							<a href="#"><img src="{{ asset('storage/product-images/'.$image->path) }}"></a>
						</div> <!-- img-big-wrap.// -->
					@else
						<div class="thumbs-wrap mb-4">
							<a href="#" class="item-thumb"> <img src="{{ asset('storage/product-images/'.$image->path) }}"></a>
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
				<h5 class="mb-5">{{ $product->artists->implode('artist', ', ') }}</h5>
				
				<div class="h3 mb-2">
					<h6 class="price">DKK {{$product->price}}</h6> 
				</div> <!-- price-wrap.// -->

				@if($product->quantity >= 1)
					<div class="badge badge-success mb-3">In stock</div>
				@else
					<div class="badge badge-danger mb-3">Not in stock</div>
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

					<form action="{{ route('cart.store') }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $product->id }}" class="id" name="id">
						<input type="hidden" value="{{ $product->name }}" class="name" name="name">
						@foreach ($product->artists as $artist)
						<input type="hidden" value="{{ $artist->artist }}" class="artist" name="artist">
						@endforeach	
						<input type="hidden" value="{{ $product->price }}" class="price" name="price">
						@foreach ($product->images as $image)
						<input type="hidden" value="{{ $image->path }}" class="path" name="path">
						@endforeach
						<input type="hidden" value="{{ $product->slug }}" class="slug" name="slug">
						<input type="hidden" value="{{ $product->category_slug }}" class="category_slug" name="category_slug">
						<input type="hidden" value="1" class="quantity" name="quantity">
						<div class="ml-4" style="background-color: white;">
							<div class="row">
								<div class="col-8">
									<button class="btn btn-green w-100" title="add to cart">
										Add to cart
									</button>
								</div>
								<div class="col-4">
									<a href="#" class="btn btn-light"> <i class="fa fa-heart-o" aria-hidden="true"></i> </a>
								</div>
							</div>
						</div>
					</form>
				</div> <!-- row.// -->
				
				<div class="delivery mt-2">
					<small>Delivery in Denmark is 2-3 working days.</small>
					<br><small>Delivery in Europe is 5 – 8 working days.</small>
					<br><small>Delivery overseas is 6 – 14 working days.</small>
				</div>

				{{-- <div class="alert alert-success mt-3">
					<i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks
				</div> --}}

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
				    <dt class="col-sm-3 col-6">Artist</dt>
					<dd class="col-sm-9 col-6">{{ $product->artists->implode('artist', ', ') }}</dd>

					<dt class="col-sm-3 col-6">Format</dt>
					<dd class="col-sm-9 col-6">{{ $product->formats->implode('format', ', ') }}</dd>

					<dt class="col-sm-3 col-6">Label</dt>
					<dd class="col-sm-9 col-6">{{ $product->labels->implode('label', ', ') }}</dd>

					<dt class="col-sm-3 col-6">Catalogue no.</dt>
					<dd class="col-sm-9 col-6">{{ $product->cataloguenumber->cat_no }}</dd>

					<dt class="col-sm-3 col-6">Country</dt>
					<dd class="col-sm-9 col-6">{{ $product->country->implode('country', ', ') }}</dd>
				</dl>
			</aside>
			<aside class="col-md-6">
				{{-- <h5>Features</h5> --}}
				<dl class="row">
					<dt class="col-sm-3 col-6">Condition</dt>
					@if($product->media_condition == 0)
						<dd class="col-sm-9 col-6">Used</dd>
					@else
						<dd class="col-sm-9 col-6">New</dd>
					@endif
					<dt class="col-sm-3 col-6">Year</dt>
					<dd class="col-sm-9 col-6">{{ $product->year[0]->year }}</dd>

					<dt class="col-sm-3 col-6">Grading</dt>
					<dd class="col-sm-9 col-6">{{ $product->gradings[0]->grading }}</dd>

					<dt class="col-sm-3 col-6">Comment</dt>
					<dd class="col-sm-9 col-6">{{ $product->comment->comment }}</dd>

					<dt class="col-sm-3 col-6">Genre</dt>
					<dd class="col-sm-9 col-6">{{ $product->genres->implode('genre', ', ') }}</dd>

					<dt class="col-sm-3 col-6">Subgenre</dt>
					<dd class="col-sm-9 col-6">{{ $product->subgenres->implode('subgenre', ', ') }}</dd>
				</dl>
			</aside>
		</div> <!-- row.// -->
		<hr>
		
		<h5>Description</h5>
		<div class="product-description">
			{{-- Split description in lines with regex --}}
			@if ($product->description)		
				<div class="description-text">
				@foreach ($splitDescLines as $line)
					<p>{{$line}}</p>
				@endforeach
				</div>
				<div id="show-more" onclick="showMore(this)">
					<button class="btn btn-outline-secondary">SHOW MORE</button>
				</div>
				<div id="show-less" onclick="showLess(this)">
					<button class="btn btn-outline-secondary">SHOW LESS</button>
				</div>
			@endif
		</div>

	</div> <!-- card-body.// -->
</article> <!-- card.// -->
<!-- ============================ COMPONENT 4  .//END ================================= -->

<!-- ============== COMPONENT SLIDER CUSTOM  ============= -->
<section class="section-content padding-y">
	<div class="row">
		<aside class="col-md-12">
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
												<input type="hidden" value="{{ $artist->artist }}" class="artist" name="artist">
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
					</div>
				@endforeach
			</div> <!-- slider-items-slick.// -->
		</aside> <!-- col.// -->
	</div>
</section>
<!-- ============== COMPONENT SLIDER CUSTOM .end // ============= -->

@endif
@endsection