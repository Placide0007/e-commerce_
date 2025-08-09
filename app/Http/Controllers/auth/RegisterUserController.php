<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function registerForm(): View
    {
        return view('guest.register');
    }

    public function store(RegisterRequest $register_request)
    {

        $user = User::create([
            'name' => ucfirst($register_request->name),
            'first_name' => ucfirst($register_request->first_name),
            'email' => $register_request->email,
            'password' => Hash::make($register_request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home');

    }
}
