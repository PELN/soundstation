<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Product;
use App\Models\Artist;
use DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $input = Request::all();
        $query = $input['search']; // the query that is in the search bar

        $products = $this->getProducts($query);

        $paginator = view('components.pagination', [
            'input' => $input,
            'product' => $products])->render();

        return view('pages.search_result_page', [
            'products' => $products,
            'query' => $query
        ]);
    }

    public function ajaxSearch(Request $request)
    {  
        $input = Request::all();
        $query = $input['query'];

        $products = $this->searchProducts($query);
        $artists = $this->searchArtists($query);

        $searchResults = view('components.search_result_box', [
            'products' => $products,
            'artists' => $artists,
            'query' => $query])->render();

        if (Request::ajax()) { 
            return response()->json([
                'searchResults' => $searchResults
            ]);
        }
    }

    private function searchProducts($query) 
    {
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('artist_product', 'products.id', '=', 'artist_product.product_id')
        ->leftJoin('artists', 'artist_product.artist_id', '=', 'artists.id')
        ->leftJoin('images', 'images.product_id', '=', 'products.id')
        ->where('name', 'LIKE', '%'.$query.'%')
        ->orWhere('artists.artist', 'LIKE', '%'.$query.'%')
        ->limit(3)
        ->orderby('name', 'ASC')
        ->groupby('products.id')
        ->get();

        return $products;
    }

    private function searchArtists($query)
    {
        $artists = DB::table('artists')
        ->where('artist', 'LIKE', '%'.$query.'%')
        ->limit(3)
        ->orderby('artist', 'ASC')
        ->get();

        return $artists;
    }

    private function getProducts($query)
    {
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
        ->paginate(8);
        return $products;
    }
}
