<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;

class CartController extends Controller
{
    // Show all products in cart
    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('pages.cart')->with(['cartCollection' => $cartCollection]);
    }
    
    // Add product to cart 
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
        
        return Redirect::back()->with('success_msg', 'Product was added to cart');
    }

    // Remove product from cart
    public function remove(Request $request){
        \Cart::remove($request->id);
        return Redirect::back()->with('success_msg', 'Product was removed from cart');
    }

    // Update quantity of product in cart
    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return Redirect::back()->with('success_msg', 'Cart was updated');
    }

    // Clear all products in cart
    public function clear(){
        \Cart::clear();
        return Redirect::back()->with('success_msg', 'Cart was cleared');
    }
}
