<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show() {
        return view('pages.product-listing');
    }


    public function detail() {
        return view('pages.product-detail');
    }
}
