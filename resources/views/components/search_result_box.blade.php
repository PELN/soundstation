@if (count($products) > 0 || count($artists) > 0)
    <ul class="list-group">
        @if(count($artists) > 0)
            <li id="search-item" class="search-product list-group-item"><small class="title">ARTISTS</small></li>
        @endif

        @foreach($artists as $artist)
            <a href="/search-result-page?search={{$artist->artist}}">
                <li id="search-item" class="search-product list-group-item border-top">{{$artist->artist}}</li>
            </a>
        @endforeach

        @if(count($products) > 0)
            <li id="search-item" class="search-product list-group-item border-top"><small class="title">PRODUCTS</small></li>
        @endif

        @foreach($products as $product)
            <a href="{{$product->category_slug}}/{{$product->slug}}">
                <li id="search-item" class="search-product list-group-item border-top">{{$product->name}}</li> 
            </a>
        @endforeach 
        <a href="/search-result-page?search={{$query}}">
            <li id="more-results" class="list-group-item border-top">More results with "{{$query}}"</li>
        </a>
    </ul>
@else
    <li class="no-result list-group-item">No results</li>
@endif


