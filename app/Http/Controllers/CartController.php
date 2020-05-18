<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        return view('pages.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }
}
