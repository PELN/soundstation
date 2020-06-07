<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use DB;

class ProductController extends Controller
{
    public function show($category, $slug) 
    {
        $category = Category::where('category_slug', $category)->first();
        $product = Product::where('slug', $slug)->first();
        $genres = $product->genres;
        $collection = collect($genres);
        
        $subset = $collection->map(function ($genre) {
            return collect($genre->toArray())
                ->only(['genre'])
                ->all();
        });

        // split lines in description
        $splitDescLines = preg_split('/[\n\r]+/', $product->description->description);
        
        // get related products for slider (by category and genre)
        $relatedProducts = $this->showRelatedProducts($product, $category, $subset);

        return view('pages.product_detail', [
            'category' => $category,
            'product' => $product,
            'splitDescLines' => $splitDescLines,
            'relatedProducts' => $relatedProducts
        ]);
    }

    // show related products by category and genre of the product being displayed
    private function showRelatedProducts($product, $category, $genres) 
    {
        // find products by category AND genres except the current product
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->leftJoin('images', 'images.product_id', '=', 'products.id')
        ->leftJoin('genre_product', 'products.id', '=', 'genre_product.product_id')
        ->leftJoin('genres', 'genre_product.genre_id', '=', 'genres.id')
        ->leftJoin('artist_product', 'products.id', '=', 'artist_product.product_id')
        ->leftJoin('artists', 'artist_product.artist_id', '=', 'artists.id')
        ->where('name', '!=', $product->name)
        ->where('category_slug', $category->category_slug)
        ->where(function($query) use ($genres) {
                $query->whereIn('genre', $genres);
            });
        $collection = $products->groupby('products.id')
        ->get();
        
        return $collection;
    }
}
