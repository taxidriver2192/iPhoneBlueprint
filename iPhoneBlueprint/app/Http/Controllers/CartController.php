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

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = ['name' => $product->name, 'price' => $product->price, 'quantity' => 1];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success_message', 'Item was added to your cart!');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity');
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);
        return redirect()->back()->with('success_message', 'Quantity was updated!');
    }


    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success_message', 'Item was removed from your cart!');
    }
}

