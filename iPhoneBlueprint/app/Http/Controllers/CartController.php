<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        return view('cart');
    }

    public function add(Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[$product->id] = ['name' => $product->name,'price' => $product->price, 'quantity' => 1];
        session()->put('cart', $cart);
        return redirect()->back()->with('success_message', 'Item was added to your cart!');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success_message', 'Item was removed from your cart!');
    }
}

