<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    public function index() { 

        $orders = Order::with('user')->latest()->get(); 

        $stockGlobal = Product::sum('stock'); 
        
        return view('admin.orders.index', compact('orders', 'stockGlobal')); 
    }


    public function show(Order $order) {
        $order->load(['user', 'items.product']);

        return view('admin.orders.show', compact('order'));
    }

   
    public function confirm(Order $order) { 

        DB::transaction(function () use ($order) { 

            $order->load('items'); 

            foreach ($order->items as $item) { 

                $product = Product::findOrFail($item->product_id); 

                $product->decrement('stock', $item->quantity); 

                } $order->update([ 'status' => 'confirmed' ]); 

            });

            return redirect()->route('orders.show', $order); 
        }


    public function pdf(Order $order) {

        $order->load(['user', 'items.product']);

        $pdf = Pdf::loadView('admin.orders.pdf', compact('order'));

        return $pdf->stream('commande-'.$order->id.'.pdf');
    }

}
