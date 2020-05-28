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
				<h5 class="mb-4">{{ $product->artists->implode('artist', ', ') }}</h5>
				
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
				
				<div class="mt-2">
					<small class="text-light-grey">Delivery in Denmark is 2 – 3 working days.</small>
					<br><small class="text-light-grey">Delivery in Europe is 5 – 8 working days.</small>
					<br><small class="text-light-grey">Delivery overseas is 6 – 14 working days.</small>
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
					@if($product->artists[0])
				    <dt class="col-sm-6 col-6">Artist</dt>
					<dd class="col-sm-6 col-6">{{ $product->artists->implode('artist', ', ') }}</dd>
					@endif
					@if($product->labels[0])	
					<dt class="col-sm-6 col-6">Format</dt>
					<dd class="col-sm-6 col-6">{{ $product->formats->implode('format', ', ') }}</dd>
					@endif
					@if($product->labels[0])	
					<dt class="col-sm-6 col-6">Label</dt>
					<dd class="col-sm-6 col-6">{{ $product->labels->implode('label', ', ') }}</dd>
					@endif
					@if($product->cataloguenumber)	
					<dt class="col-sm-6 col-6">Catalogue no.</dt>
					<dd class="col-sm-6 col-6">{{ $product->cataloguenumber->cat_no }}</dd>
					@endif
					<dt class="col-sm-6 col-6">Country</dt>
					<dd class="col-sm-6 col-6">{{ $product->country->implode('country', ', ') }}</dd>
					@if($product->year[0])
					<dt class="col-sm-6 col-6">Year</dt>
					<dd class="col-sm-6 col-6">{{ $product->year[0]->year }}</dd>
					@endif
				</dl>
			</aside>
			<aside class="col-md-6">
				{{-- <h5>Features</h5> --}}
				<dl class="row">
					<dt class="col-sm-6 col-6 mt-4">Condition</dt>
					@if($product->media_condition == 0)
						<dd class="col-sm-6 col-6 mt-4">Used</dd>
					@else
						<dd class="col-sm-6 col-6 mt-4">New</dd>
					@endif

					<dt class="col-sm-6 col-6">Grading</dt>
					<dd class="col-sm-6 col-6"><a href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter">{{ $product->gradings[0]->grading }}</a></dd>

					@if($product->comment)
						<dt class="col-sm-6 col-6">Comment</dt>
						<dd class="col-sm-6 col-6">{{ $product->comment->comment }}</dd>
					@endif
					@if($product->genres[0])
					<dt class="col-sm-6 col-6">Genre</dt>
					<dd class="col-sm-6 col-6">{{ $product->genres->implode('genre', ', ') }}</dd>
					@endif
					@if($product->subgenres[0])
					<dt class="col-sm-6 col-6">Subgenre</dt>
					<dd class="col-sm-6 col-6">{{ $product->subgenres->implode('subgenre', ', ') }}</dd>
					@endif
					@if($product->color[0])
						<dt class="col-sm-6 col-6">Vinyl Color</dt>
						<dd class="col-sm-6 col-6">{{ $product->color[0]->color }}</dd>
					@endif
				</dl>
			</aside>
		</div> <!-- row.// -->

		{{-- GRADING MODAL --}}
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLongTitle">Grading guide</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<div class="modal-body">
					<div class="table-responsive-sm">
						<table class="table">
							<thead>
								<tr>
								  <th scope="col">Grading</th>
								  <th scope="col">Description</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <th scope="row">SS</th>
								  <td>
									  <strong>Still Sealed</strong>
									<p>A record is sealed if it is factory sealed - not resealed. One can expect the record, cover, innersleeve and other inserts to be unused and new in every way.</p>
									<p>Sleeves with saw cuts and drill hole can still be sealed. This can be seen from the description.</p>
								  </td>
								</tr>
								<tr>
									<th scope="row">M</th>
									<td>
										<strong>Mint (RC: Mint)</strong>
										<p>The release is in every way perfect. The record is as new. The cover and extra items such as inserts, posters, lyric sheets, inner sleeves etc. are not damaged in any way.</p>
									</td>
								</tr>
								<tr>
									<th scope="row">M-/NM</th>
									<td>
										<strong>Near Mint - Mint Minus</strong>
										<p>An almost perfect record. It will show no obvious signs of wear neither will the LP sleeve - no scratches or scuffs, no ringwear, seam splits, creases or other similar noticeable defects. This goes for any insert as well.</p>
										<p>You can expect an M- 45 rpm 7" Single to have only minor defects like very light or almost invisible ringwear.</p>
										<p>Sound Station never grades above M-</p>
									</td>
								</tr>
								<tr>
									<th scope="row">VG++</th>
									<td>
										<strong>Very Good Plus Plus</strong>
										<p>The VG++ grade finds its use between VG+ and M- as a means of a more specific description. The record shows some signs of having been played or handled but it is in a beautiful shape. In itself it plays almost as new, but it might have a minor surface scratch or scuff on one or both sides. A very slight warp might appear but not a combination of the defects. None of these minor defects will affect play in any way.</p>
										<p>The outer sleeve might have slight wear such as barely noticeable ring wear, small creases and/or insignificant tear on cover and/or any insert - but not a combination of these.</p>
									</td>
								</tr>
								<tr>
									<th scope="row">VG+</th>
									<td>
										<strong>Very Good Plus (RC: Excellent)</strong>
										<p>The record will show some signs of wear - of having been played or handled but it has been taken very well care off.</p>
										<p>The record might have two or three minor scratches or scuff on one or both sides that do not affect one's listening experience or the record might have a slight warp that does not affect play.</p>
										<p>The label might have a light discoloration, slightly bent up corners, a tiny crease or tear. The center will not have been been misshapen by repeated play.</p>
										<p>Picture sleeves and inserts show some ringwear or minor, general wear and can have small seam splits, stains, a cut out hole, indentation or cut corner. Even though a combination of these defects can be present, this is still a record in very good shape that would fit nicely into any collection.</p>
									</td>
								</tr>
								<tr>
									<th scope="row">VG</th>
									<td>
										<strong>Very Good (RC: Very Good)</strong>
										<p>Many of the defects found in VG+ records will be more pronounced in a VG disc.</p>
										<p>Scratches can affect play, groove wear can be noticeable - surface noise can be present especially in the songs softer passages or in intro and fade.</p>
										<p>Labels can have tape, sticker or residue attached to it. Writing on label can occur as well as label tear.</p>
										<p>Besides more pronounced defects mentioned under VG++ & VG+, tape & sticker and/or residue might be evident. A cover tear might be present as well as writing on the cover. All of the defects cannot be present though.</p>
									</td>
								</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			  </div>
			</div>
		  </div>

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