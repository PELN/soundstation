@if (count($products) > 0 || count($artists) > 0)
    <ul class="list-group" style="display: block; position: absolute; z-index: 1; cursor: pointer;">
        @if(count($artists) > 0)
            <li id="searchItem" class="search-product list-group-item">Artists</li>
        @endif

        @foreach($artists as $artist)
            <a href="/search-result-page?search={{$artist->artist}}">
                <li id="searchItem" class="search-product list-group-item">{{$artist->artist}}</li>
            </a>
        @endforeach 

        @if(count($products) > 0)
            <li id="searchItem" class="search-product list-group-item">Products</li>
        @endif

        @foreach($products as $product)
            <a href="{{$product->category_slug}}/{{$product->slug}}">
                <li id="searchItem" class="search-product list-group-item">{{$product->name}}</li> 
            </a>
        @endforeach 
        <a href="/search-result-page?search={{$query}}">
            <li id="searchItem" class="list-group-item">SEE MORE RESULTS WITH "{{$query}}"</li>
        </a>
    </ul>
@else
    <li class="list-group-item" style="display: block; position: absolute; z-index: 1;">No results</li>
@endif


