@extends('layouts.master')
@section('title', 'Cart')

@section('content')
    
<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title text-grey">Shopping cart</h2>
    </div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

@include('layouts.partials.session_msg')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">

        @if(\Cart::getTotalQuantity()>0)
        <h4>{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
        @else
            <h4>No Product(s) In Your Cart</h4><br>
            {{-- <a href="/" class="btn btn-dark">Continue Shopping</a> --}}
        @endif

        <div class="row">
            <main class="col-md-12">
                <div class="card">
                    @foreach($cartCollection as $item)
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right" width="200"> </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <figure class="itemside" style="margin-right: 20px;">
                                            <div class="aside">
                                                <a href="{{ $item->attributes->category_slug }}/{{ $item->attributes->slug }}">
                                                    @if($item->attributes->path)
                                                        <img src="{{ asset('storage/product-images/'.$item->attributes->path) }}" class="img-sm" width="200" height="200">
                                                    @else
                                                        <img src="{{ asset('storage/product-images/image-coming-soon.jpg') }}" class="img-sm" width="200" height="200">
                                                    @endforelse

                                                    <figcaption class="info">
                                                        {{ $item->name }}
                                                        <p class="text-muted small">{{ $item->attributes->artist }}</p>
                                                    </figcaption>
                                                </a>
                                        </figure>
                                    </td>

                                    <td>
                                        {{-- <div class="row"> --}}
                                            <form action="{{ route('cart.update') }}" method="POST">
                                                {{ csrf_field() }}
                                                {{-- <div class="row"> --}}
                                                    <input type="hidden" value="{{ $item->id}}" class="id" name="id">
                                                    <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                                        class="quantity" name="quantity" style="width: 60px; margin-right: 10px;">
                                                    <button class="btn btn-light btn-sm" style="margin-top: 10px;">Update </button>
                                                    {{-- <i class="fa fa-edit"></i> --}}
                                                {{-- </div> --}}
                                            </form>
                                        {{-- </div> --}}
                                    </td>

                                    <td> 
                                        <div class="price-wrap"> 
                                            <var class="price">DKK {{ $item->price }}</var>
                                            {{-- <small class="text-muted"> {{ \Cart::get($item->id)->getPriceSum() }} </small>  --}}
                                        </div> <!-- price-wrap .// -->
                                    </td>

                                    <td>
                                        <div class="row" style="justify-content: space-evenly;">
                                            <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                                            {{-- <a href="" class="btn btn-light"> Remove</a> --}}
                                        
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $item->id }}" class="id" name="id">
                                                <button class="btn btn-light" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach

                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label>Have coupon?</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="" placeholder="Coupon code">
                                            <span class="input-group-append"> 
                                                <button class="btn btn-primary">Apply</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- card-body.// -->
                        </div>
                        <div class="col-6">
                            <div class="card-body">
                                @if(count($cartCollection)>0)
                                    <dl class="dlist-align">
                                        <dt>Total price:</dt>
                                        <dd class="text-right">DKK {{ \Cart::getTotal() }}</dd>
                                    </dl>
                                    {{-- <dl class="dlist-align">
                                        <dt>Discount:</dt>
                                        <dd class="text-right">DKK </dd>
                                    </dl> --}}
                                    <dl class="dlist-align">
                                        <dt>Total:</dt>
                                        <dd class="text-right  h5"><strong>DKK {{ \Cart::getTotal() }}</strong></dd>
                                    </dl>
                                    <hr>
                                @endif
                            </div> <!-- card-body.// -->
                        </div>
                    </div>

                    </div>

                    <div class="card-body">
                        <a href="#" class="btn btn-primary float-md-right"> Go to checkout <i class="fa fa-chevron-right"></i> </a>
                        <a href="#" class="btn btn-ligh float-md-left"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
                    </div>

                </div> <!-- card.// -->

            <div class="alert alert-success mt-3">
                <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
            </div>

            </main> <!-- col.// -->
        </div> <!-- row .//  -->
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y">
    <div class="container">
        <h6>Payment and refund policy</h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->


@endsection
