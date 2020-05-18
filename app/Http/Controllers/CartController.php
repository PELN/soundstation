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
                'path' => $request->path,
                'slug' => $request->slug,
                'category_slug' => $request->category_slug,
                'artist' => $request->artist
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Product was added to cart');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Product was removed from cart');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart was updated');
    }

}
