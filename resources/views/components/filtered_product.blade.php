@if (count($products) > 0)
    @foreach ($products as $product)
        <div class="col-md-4">
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
                                            <button class="btn btn-secondary btn-sm" title="add to cart">
                                                <i class="fa fa-shopping-cart"></i> add to cart
                                            </button>
                                            <div class="col">
                                                <a href="#" class="btn btn-light"> <i class="fas fa-heart"></i></a>
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
