<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create', ['categories' => Category::all()]);
    }

    public function show(string $id)
    {
        return view('admin.product.show', ['product' => Product::findOrFail($id)]);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $data['product_image'] = $this->uploadImage($request);

        Product::create($data);

        return redirect()->route('products.index')->with('status', 'Produit ajouté avec succès');
    }

    public function edit(string $id)
    {
        return view('admin.product.create', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all()
        ]);
    }

    public function update(StoreProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();
        $data['product_image'] = $this->uploadImage($request, $product->product_image);

        $product->update($data);
        
        return redirect()->route('products.index')->with('status', 'Produit modifié avec succès');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->product_image) {
            Storage::delete('public/' . $product->product_image);
        }
        $product->delete();

        return back()->with('status', 'Produit supprimé avec succès');
    }

    private function uploadImage($request, $oldImage = null)
    {
        if (!$request->hasFile('product_image')) return $oldImage;

        if ($oldImage) {
            Storage::delete('public/' . $oldImage);
        }

        return $request->file('product_image')->store('images', 'public');
    }
}
