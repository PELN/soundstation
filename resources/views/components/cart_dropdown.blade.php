@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-4">
                    <a href="{{ $item->attributes->category_slug }}/{{ $item->attributes->slug }}">
                        @if($item->attributes->path)
                            <img src="{{ asset('storage/product-images/'.$item->attributes->path) }}" class="img-sm" width="200" height="200">
                        @else
                            <img src="{{ asset('storage/product-images/image-coming-soon.jpg') }}" class="img-sm" width="200" height="200">
                        @endforelse
                    </a>
                </div>
                <div class="col-8">
                    <a href="{{ $item->attributes->category_slug }}/{{ $item->attributes->slug }}">{{$item->name}}</a>
                    <br><small>{{$item->attributes->artist}}</small>
                    <br><small>Qty: {{$item->quantity}}</small>
                    <div class="row">
                        <div class="col-8">
                            DKK {{ \Cart::get($item->id)->getPriceSum() }}
                        </div>
                        <div class="col-2">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" class="id" name="id">
                                <button class="btn btn-light" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>  
        </li>
    @endforeach
    
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-10">
                <b>Total: </b>DKK {{ \Cart::getTotal() }}
            </div>
        </div>
    </li>
    <br>
    <div class="row" style="margin:8px;">
        <a class="cta-button btn btn-block" href="{{ route('cart.index') }}">
            GO TO CART <i class="fa fa-fw fa-chevron-right"></i>
        </a>
        <a class="cta-button btn btn-block" href="#">
            CHECKOUT <i class="fa fa-fw fa-chevron-right"></i>
        </a>
    </div>
@else
    <li class="list-group-item">Your cart is empty</li>
@endif
