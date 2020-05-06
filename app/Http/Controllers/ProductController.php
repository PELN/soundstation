<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug) {

        // get product object for view
        $product = Product::where('slug', $slug)->first();

        return view('pages.product-detail', compact('product'));
    }
}
