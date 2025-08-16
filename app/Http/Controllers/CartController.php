<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('admin.cart.index', [
            'cart' => session('cart', [])
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($data['product_id']);

        if ($data['quantity'] > $product->product_stock) {
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
            'quantity' => ($cart[$product->id]['quantity'] ?? 0) + $data['quantity'],
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
            return back()->withErrors(['error' => 'Produit non trouvé dans le panier.']);
        }

        $newQuantity = $cart[$id]['quantity'] - $request->quantity;

        if ($newQuantity <= 0) {
            unset($cart[$id]);
        } else {
            $cart[$id]['quantity'] = $newQuantity;
        }

        session(['cart' => $cart]);

        return back()->with('status', 'Quantité mise à jour avec succès.');
    }

    public function annuler()
    {
        session()->forget('cart');
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $cart = session('cart', []);

        if (!isset($cart[$id])) {
            return back()->withErrors(['error' => 'Produit non trouvé dans le panier.']);
        }

        unset($cart[$id]);
        
        session(['cart' => $cart]);

        return back()->with('status', 'Produit retiré du panier.');
    }
}
