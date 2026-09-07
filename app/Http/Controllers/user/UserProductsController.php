<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;

class UserProductsController extends Controller
{
    public function products()
    {
        $products = Product::latest()->paginate(8);

        return view('user.products.index', compact('products'));
    }
}
