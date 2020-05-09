@extends('layouts.master')
@section('title', 'Product Details')

@section('content')

<section class="section-content padding-y bg">
<div class="container">

@if(count($product) == 0)
<h1>SORRY, NO PRODUCT FOUND</h1>
@else

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
	<div class="container">
		<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item"><a href="{{ URL::to("{$category->slug}") }}">{{$category->name}}</a></li>
			<li class="breadcrumb-item"><a href="{{ URL::to("{$category->slug}/{$product->slug}") }}">{{$product->name}}</a></li>
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
							<a href="#"><img src="{{ asset('storage/'.$image->path) }}"></a>
						</div> <!-- img-big-wrap.// -->
					@else
						<div class="thumbs-wrap">
							<a href="#" class="item-thumb"> <img width="152px;" src="{{ asset('storage/'.$image->path) }}"></a>
						</div> <!-- thumbs-wrap.// -->
					@endif
				@empty
					<div class="img-big-wrap">
						<a href="#"><img src="{{ asset('storage/image-coming-soon.jpg') }}"></a>
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

				{{-- <p>Here goes description consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris.</p> --}}
				{{-- <ul class="list-normal cols-two">
					<li>Not just for commute </li>
					<li>Branded tongue and cuff </li>
					<li>Super fast and amazing </li>
					<li>Lorem sed do eiusmod tempor </li>
					<li>Easy fast and ver good </li>
					<li>Lorem sed do eiusmod tempor  </li>
				</ul> --}}

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

				<!-- <div class="col-2">
					<select class="form-control">
						<option> Size </option>
						<option> XL </option>
						<option> MD </option>
						<option> XS </option>
					</select>
				</div> col.// -->

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
					{{-- if grading show that, else custom grading?? or both?? --}}
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
		@foreach ($lines as $line)
			<p>{{$line}}</p>
		@endforeach

	</div> <!-- card-body.// -->
</article> <!-- card.// -->
<!-- ============================ COMPONENT 4  .//END ================================= -->

@endif

@endsection