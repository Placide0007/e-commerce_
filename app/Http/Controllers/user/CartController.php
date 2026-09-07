<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {
        $cart = session('cart', []);

        $items = [];

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);

            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
            }
        }

        return view('user.cart.index', compact('items'));
    }

    public function add(Product $product) {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {

            $cart[$product->id]++;

        } else {
            $cart[$product->id] = 1;
        }

        session(['cart' => $cart]);

        return back();
    }

    public function remove(Product $product) {
        $cart = session('cart', []);

        unset($cart[$product->id]);

        session(['cart' => $cart]);

        return back();
    }


    public function update(Product $product, Request $request) {
        $quantity = max(1, (int) $request->quantity);

        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id] = $quantity;
        }

        session(['cart' => $cart]);

        return response()->json([
            'success' => true
        ]);
    }


}

