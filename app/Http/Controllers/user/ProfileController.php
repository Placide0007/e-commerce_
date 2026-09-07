<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profile_page(){

        $orders = Order::where('user_id', auth()->id())->latest()->get();

        return view('user.profile.index', compact('orders'));
    }

}
