@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{ $item->attributes->category_slug }}/{{ $item->attributes->slug }}">
                        @if($item->attributes->path)
                            <img src="{{ asset('storage/product-images/'.$item->attributes->path) }}" class="img-sm" width="200" height="200">
                        @else
                            <img src="{{ asset('storage/product-images/image-coming-soon.jpg') }}" class="img-sm" width="200" height="200">
                        @endforelse
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ $item->attributes->category_slug }}/{{ $item->attributes->slug }}"><b>{{$item->name}}</b></a>
                    <br><small>{{$item->attributes->artist}}</small>
                    <br><small>Qty: {{$item->quantity}}</small>
                </div>
            
                <div class="col-lg-3">
                    <p>DKK {{ \Cart::get($item->id)->getPriceSum() }}</p>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $item->id }}" class="id" name="id">
                        <button class="btn btn-light" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
                <hr>
            </div>
            
        </li>
    @endforeach
    <br>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-10">
                <b>Total: </b>DKK {{ \Cart::getTotal() }}
            </div>
            {{-- <div class="col-lg-4"> --}}
                {{-- <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary btn-sm">Remove all  <i class="fa fa-trash"></i></button>
                </form> --}}
            {{-- </div> --}}
        </div>
    </li>
    <br>
    <div class="row" style="margin: 0px;">
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
            CART <i class="fa fa-arrow-right"></i>
        </a>
        <a class="btn btn-dark btn-sm btn-block" href="">
            CHECKOUT <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@else
    <li class="list-group-item">Your Cart is Empty</li>
@endif
