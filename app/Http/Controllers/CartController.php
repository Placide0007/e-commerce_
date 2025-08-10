<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session('cart', []);

        return view('admin.cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);


        if ($request->quantity > $product->product_stock) {
            return back()->withErrors([
                'quantity' => 'La quantité saisie dépasse le stock actuel.'
            ])->withInput();
        }


        $cart = session('cart', []);

        $cart[$product->id] = [
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'product_price' => $product->product_price,
            'product_image' => $product->product_image,
            'quantity' => ($cart[$product->id]['quantity'] ?? 0) + $request->quantity,
        ];

        session(['cart' => $cart]);

        return redirect()->route('home');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);


        $cart = session('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->back()->with('error', 'Produit non trouvé dans le panier.');
        }

        $cart[$id]['quantity'] = $request->quantity;

        session(['cart' => $cart]);

        return redirect()->back()->with('status', 'Quantité mise à jour avec succès.');
    }


    public function annuler()
    {
        session()->forget('cart');

        return redirect()->route('home');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = session('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->back()->with('error', 'Produit non trouvé dans le panier.');
        }

        unset($cart[$id]);
        session(['cart' => $cart]);

        return redirect()->back()->with('status', 'Produit retiré du panier.');
    }
}
