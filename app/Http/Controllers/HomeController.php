<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $search = $request->search;

        $products = Product::where('product_name', 'like', "%$search%")->paginate(8);

        $categories = Category::all();

        return view('home.home', compact('products', 'categories'));
    }

    public function filterByCategory($id)
    {
        $categories = Category::all();

        $products = Product::where('category_id', $id)->paginate(8);
        
        return view('home.home', compact('categories', 'products'));
    }
}
