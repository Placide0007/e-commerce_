<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', compact('categories'));
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $store_product_request)
    {

        $imgpath = null;

        if ($store_product_request->hasFile('product_image')) {
            $imgpath = $store_product_request->file('product_image')->store('images', 'public');
        }
        
        Product::create([
            'product_name' => $store_product_request->product_name,
            'product_price' => $store_product_request->product_price,
            'product_stock' => $store_product_request->product_stock,
            'product_description' => $store_product_request->product_description,
            'category_id' => $store_product_request->category_id,
            'product_image' => $imgpath ?? null,
        ]);

        return redirect()->route('products.index')->with('status', 'Produit ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.create', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $store_product_request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->product_name = $store_product_request->input('product_name');
        $product->product_price = $store_product_request->input('product_price');
        $product->product_stock = $store_product_request->input('product_stock');
        $product->product_description = $store_product_request->input('product_description');
        $product->product_image = $store_product_request->input('product_image');

        if ($store_product_request->hasFile('product_image')) {

            if ($product->product_image) {
                Storage::delete('public/'.$product->product_image);
            }

            $imgpath = $store_product_request->file('product_image')->store('images', 'public');

            $product->product_image = $imgpath;

            $product->save();

            return redirect()->route('products.index', compact('product'))->with('status', 'Produit modifié avec succès');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->product_image) {
            Storage::delete('public/'.$product->product_image);
        }

        $product->delete();

        return back()->with('status', 'produit supprime avec succees');
    }
}
