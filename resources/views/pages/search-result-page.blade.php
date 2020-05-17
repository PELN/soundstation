@extends('layouts.master')
@section('title', 'Products')

@section('content')
<section class="section-content padding-y">
	<div class="container">
        @if (count($products) > 0 || count($artists) > 0)
            <h2>Search results for "{{$query}}"</h2>
            <p>{{$products->total()}} Products Found</p>
                <div id="all-results">
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
                    </div> <!-- row end.// -->
                </div>
            <div id="pagination">
                {{ $products->appends($input)->links() }}
            </div>
        @else
            <h2>No results matches "{{$query}}"</h2>
            <p>{{$products->total()}} Products Found</p>       
            <a href="/">Go to Homepage</a>     
        @endif 
    </div>
</section>

@endsection