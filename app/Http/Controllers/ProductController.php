<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function show($category, $slug) {

        $category = Category::where('slug', $category)->first();
        
        // get product object for view
        $product = Product::where('slug', $slug)->first();

        // dd($product->category->name);
        // dd($category->products);

        // dd($product->genres);

        return view('pages.product-detail', compact('product'));
    }
}
