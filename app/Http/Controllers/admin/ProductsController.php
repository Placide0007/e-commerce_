<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['required', 'integer', 'min:0'],
            'image'       => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $product = new Product();

        $product->name = $fields['name'];
        $product->slug = Str::slug($fields['name']) . '-' . Str::random(10);
        $product->description = $fields['description'];
        $product->price = $fields['price'];
        $product->stock = $fields['stock'];
        $product->category_id = $fields['category_id'];

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images/products'), $imageName);

            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('user.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $fields = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['required', 'integer', 'min:0'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $product->name = $fields['name'];
        $product->slug = Str::slug($fields['name']);
        $product->description = $fields['description'];
        $product->price = $fields['price'];
        $product->stock = $fields['stock'];
        $product->category_id = $fields['category_id'];

        if ($request->hasFile('image')) {

            if ($product->image) {
                $oldImage = public_path('images/products/' . $product->image);

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images/products'), $imageName);

            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produit modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            $image = public_path('images/products/' . $product->image);

            if (file_exists($image)) {

                unlink($image);
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}