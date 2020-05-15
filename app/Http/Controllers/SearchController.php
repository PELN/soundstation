<?php
namespace App\Http\Controllers;
use Request;
use App\Models\Product;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $input = Request::all();
        $query = $input['query'];

        $products = $this->searchResults($query);
        // TODO: make search param to show right products
        // somehow show all products within the search result
        return view('pages.product-listing', [
            'products' => $products
        ]);
    }

    public function ajaxSearch(Request $request)
    {
        $input = Request::all();
        $query = $input['query'];
        
        $results = $this->searchResults($query);

        // TODO: MOVE TO BLADE FILE (like pagination)
        $output = '';
        
        if (count($results) > 0) {
            $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1; cursor: pointer;">';
            
            // TODO: don't add slug if on a detailed page ?? it is already there.. now looks like: vinyls/vinyls
            // get the request / params - if category_slug is not already in it, add it (ternary statement??)
            foreach ($results as $product){
                $output .= '<a href="'.$product->category_slug.'/'.$product->slug.'">
                            <li id="searchItem" class="search-product list-group-item">'.$product->name.'
                            <p class="search-artist-label">'.$product->artist.'</p></li></a>';
            }
            
            $output .= '<a href="/'.$product->category_slug.'?search='.$query.'">
                        <li id="searchItem" class="list-group-item">SEE MORE RESULTS</li>
                        </a>';

            $output .= '</ul>';
        }
        else {
            $output .= '<li class="list-group-item">'.'No results'.'</li>';
        }

        if (Request::ajax()) { 
            return response()->json([
                'output' => $output
            ]);
        }
    }

    private function searchResults($query) 
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
        ->limit(4)
        ->orderby('name', 'ASC')
        ->get();
        
        return $products;
    }

}
