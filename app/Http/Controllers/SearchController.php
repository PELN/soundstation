<?php
namespace App\Http\Controllers;
use Request;
use App\Models\Product;
use App\Models\Artist;
use DB;

// search only works inside a category
// can not show products within two categories??

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $input = Request::all();
        $query = $input['search'];

        // $products = $this->searchResults($query);
        
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('artist_product', 'products.id', '=', 'artist_product.product_id')
        ->leftJoin('artists', 'artist_product.artist_id', '=', 'artists.id')
        ->leftJoin('images', 'images.product_id', '=', 'products.id')
        ->leftJoin('format_product', 'products.id', '=', 'format_product.product_id')
        ->leftJoin('formats', 'format_product.format_id', '=', 'formats.id')
        ->where('name', 'LIKE', '%'.$query.'%')
        ->orWhere('artists.artist', 'LIKE', '%'.$query.'%')
        ->orderby('name', 'ASC')
        ->groupby('products.id')
        ->paginate(4);
        // ->get();

        $paginator = view('components.pagination', [
            'input' => $input,
            'product' => $products])->render();
        

        return view('pages.search-result-page', [
            'products' => $products,
            'artists' => $artists,
            'query' => $query
        ]);
    }

    public function ajaxSearch(Request $request)
    {
        // TODO : VALIDATE INPUT FIELD?!?!?

        $input = Request::all();
        $query = $input['query'];
        
        $products = $this->searchProducts($query);
        $artists = $this->searchArtists($query);

        // TODO: MOVE TO BLADE FILE (like pagination)
        $output = '';
        
        if (count($products) > 0 || count($artists) > 0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1; cursor: pointer;">';
            
            // TODO: don't add slug if on a detailed page ?? it is already there.. now looks like: vinyls/vinyls
            // get the request / params - if category_slug is not already in it, add it (ternary statement??)
           if(count($artists) > 0){
               $output .=  '<li id="searchItem" class="search-product list-group-item">Artists</li>';
           }
            foreach ($artists as $artist) {
                $output .=  '<a href="/search-result-page?search='.$artist->artist.'">
                            <li id="searchItem" class="search-product list-group-item">'.$artist->artist.'</li></a>';
            }

            if (count($products) > 0) {
                $output .=  '<li id="searchItem" class="search-product list-group-item">Products</li>';
            }
            foreach ($products as $product) {
                // if
                $output .= '<a href="'.$product->category_slug.'/'.$product->slug.'">';
                // else
                // $output .= '<a href="'.$product->category_slug.'/'.$product->slug.'">';

                $output .=  '<li id="searchItem" class="search-product list-group-item">'.$product->name.'</li> </a>';
                // <p class="search-artist-label">'.$product->artist.'</p>
            }


            // '<a href="/'.$product->category_slug.'?search='.$query.'">
        
            $output .= '<a href="/search-result-page?search='.$query.'">
                        <li id="searchItem" class="list-group-item">SEE MORE RESULTS WITH "'.$query.'"</li>
                        </a>';

            $output .= '</ul>';
        }
        else {
            $output .= '<li class="list-group-item" style="display: block; position: absolute; z-index: 1;">'.'No results'.'</li>';
        }

        if (Request::ajax()) { 
            return response()->json([
                'output' => $output
            ]);
        }
    }

    protected function searchProducts($query) 
    {
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('artist_product', 'products.id', '=', 'artist_product.product_id')
        ->leftJoin('artists', 'artist_product.artist_id', '=', 'artists.id')
        ->leftJoin('images', 'images.product_id', '=', 'products.id')
        // TODO: formats displays product for each format it has in the loop - should not do this
        // ->leftJoin('format_product', 'products.id', '=', 'format_product.product_id')
        // ->leftJoin('formats', 'format_product.format_id', '=', 'formats.id')
        ->where('name', 'LIKE', '%'.$query.'%')
        ->orWhere('artists.artist', 'LIKE', '%'.$query.'%')
        ->limit(3)
        ->orderby('name', 'ASC')
        ->groupby('products.id')
        ->get();

        return $products;
    }

    protected function searchArtists($query)
    {
        $artists = DB::table('artists')
        ->where('artist', 'LIKE', '%'.$query.'%')
        ->limit(3)
        ->orderby('artist', 'ASC')
        ->get();

        return $artists;
    }

}
