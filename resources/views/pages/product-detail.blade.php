@extends('layouts.master')
@section('title', 'Product Details')

@section('content')

<section class="section-content padding-y bg">
<div class="container">

@if(count($product) == 0)
<h1>SORRY, NO PRODUCT FOUND</h1>
@else
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

				<h3>{{$product->category->name}}</h3>

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

			<div class="form-row">
				<div class="col-2">
					<select class="form-control">
						<option> 1 </option>
						<option> 2 </option>
						<option> 3 </option>
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
				<h5>Parameters</h5>
				<dl class="row">
				      <dt class="col-sm-3">Display</dt>
				      <dd class="col-sm-9">13.3-inch LED-backlit display with IPS</dd>

				      <dt class="col-sm-3">Processor</dt>
				      <dd class="col-sm-9">2.3GHz dual-core Intel Core i5</dd>

				      <dt class="col-sm-3">Camera</dt>
				      <dd class="col-sm-9">720p FaceTime HD camera</dd>

				      <dt class="col-sm-3">Memory</dt>
				      <dd class="col-sm-9">8 GB RAM or 16 GB RAM</dd>
				      
				      <dt class="col-sm-3">Graphics</dt>
				      <dd class="col-sm-9">Intel Iris Plus Graphics 640</dd>
				</dl>
			</aside>
			<aside class="col-md-6">
				<h5>Features</h5>
				<ul class="list-check">
					<li>Best performance of battery</li>
					<li>5 years warranty for this product</li>
					<li>Amazing features and high quality</li>
					<li>Best performance of battery</li>
					<li>5 years warranty for this product</li>
					<li>Amazing features and high quality</li>
				</ul>
			</aside>
		</div> <!-- row.// -->
		<hr>

		{{-- Split description in lines with regex --}}
		@foreach ($lines as $line)
			<p>{{$line}}</p>
		@endforeach

	</div> <!-- card-body.// -->
</article> <!-- card.// -->
<!-- ============================ COMPONENT 4  .//END ================================= -->

@endif

@endsection