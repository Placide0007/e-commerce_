<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        $items = [];

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);

            if ($product) {
                $items[] = ['product' => $product, 'quantity' => $quantity];
            }
        }

        if (empty($items)) {
            return redirect()->route('cart.index');
        }

        return view('user.checkout.index', compact('items'));
    }


    public function store()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart');
        }

        $total = 0;

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);

            if ($product) {
                $total += $product->price * $quantity;
            }
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending'
        ]);

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);

            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'subtotal' => $product->price * $quantity
                ]);
            }
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order)
    {
        return view('user.checkout.success', compact('order'));
    }

}
