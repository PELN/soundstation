@if (count($products) > 0)
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
                            <a href="#" class="title">{{$product->name}}</a>
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

@else 

    <h2>No products match :(((</h2>

@endif
