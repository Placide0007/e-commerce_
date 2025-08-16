<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function order()
    {
        $cart = session('cart', []);

        session(['cart' => $cart]);

        return view('admin.cart.order', ['cartItems' => $cart]);
    }


    public function submitOrder(OrderRequest $order_request)
    {
        $cartItems = session('cart', []);

        $order = Order::create([
            'name' => ucfirst($order_request->name),
            'first_name' => ucfirst($order_request->first_name),
            'adresse' =>  $order_request->adresse,
            'telephone' =>  $order_request->telephone,
        ]);

         return redirect()->route('home')->with('status', 'Commande envoyer avec succee');
    }
}
