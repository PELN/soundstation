<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class ProductController extends Controller
{
    public function show($category, $slug) {

        $category = Category::where('slug', $category)->first();
        
        // $image = Image::where('product_id', $product->id)->first();
    
        // get product object for view
        $product = Product::where('slug', $slug)->first();

        // dd($product->images);
        // dd($product->category->name);
        // dd($category->products);

        // dd($product->genres);
        // dd($product->images->first());

        // dd($product->description);
		$lines = preg_split('/[\n\r]+/', $product->description->description);
        // dd($lines);

        // $test = $product->artists->implode('artist', ', ');
        // dd($test);
        // $artist_array = $product->artists;
        // dd($artist_array->implode(', '));

        // dd($product->gradings);


        return view('pages.product-detail', [
            'product' => $product,
            'lines' => $lines
        ]);
    }
}
