<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
    public function add(Request $request)
{
    $cart = new Cart();
    $cart->user_id = Auth::id();
    $cart->menu_id = $request->input('menu_id');
    $cart->quantity = $request->input('quantity');
    $cart->notes = $request->input('notes');
    $cart->save();

    return redirect()->route('cart.index')->with('success', 'Menu added to cart!');
}

public function index()
{
    $cartItems = Cart::where('user_id', Auth::id())->with('menu')->get();
    return view('cart.index', compact('cartItems'));
}

}
