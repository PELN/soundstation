<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function index() {
        $products = $this->getAllProducts();
        return view('pages.index', [
            'products' => $products,
        ]);    
    }

    public function about() {
        return view('pages.about');
    }

    public function cart() {
        return view('pages.cart');
    }

    protected function getAllProducts()
    {
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('genre_product', 'products.id', '=', 'genre_product.product_id')
        ->leftJoin('genres', 'genre_product.genre_id', '=', 'genres.id')
        ->leftJoin('images', 'images.product_id', '=', 'products.id')
        ->leftJoin('artist_product', 'products.id', '=', 'artist_product.product_id')
        ->leftJoin('artists', 'artist_product.artist_id', '=', 'artists.id')
        ->orderBy('products.created_at', 'DESC')
        ->limit(12)
        ->groupby('products.id')
        ->get();
        return $products;
    }
}
