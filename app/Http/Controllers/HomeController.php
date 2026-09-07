<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_page(Request $request)
    {
        $products = Product::latest()->paginate(4);

        $categories = Category::all();

        $categoryProducts = Product::query();

        if ($request->category) {
            $categoryProducts->where('category_id', $request->category);
        }

        $categoryProducts = $categoryProducts->latest()->paginate(4, ['*'], 'categoryProducts');

        return view('user.home', compact('products', 'categories', 'categoryProducts'));
    }
}

