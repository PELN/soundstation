<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class CartController extends Controller
{
    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        return view('pages.cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }

    public function add(Request $request){

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');
    }

    
}
