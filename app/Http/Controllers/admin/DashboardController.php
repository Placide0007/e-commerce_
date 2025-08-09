<?php

namespace App\Http\Controllers\admin;

use App\Charts\CategoryChart;
use App\Charts\ProductChart;
use App\Charts\UserChart;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function dashboard(UserChart $user_chart, ProductChart $product_chart, CategoryChart $category_chart): View
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();

        return view('admin.dashboard.dashboard', compact('users', 'products', 'categories', 'product_chart', 'user_chart', 'category_chart'));
    }
}
