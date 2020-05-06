<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug) {

        // for product-listing page
        $category = Category::where('slug', $slug)
        ->where('menu', 1)
        ->first();

        return view('pages.product-listing', compact('category'));
    }

}
