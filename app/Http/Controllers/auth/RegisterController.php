<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){

        $fields = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','unique:users,email'],
            'password' => ['required','min:8'],
        ]);

        $user = new User();

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = Hash::make($fields['password']);

        $user->save();

        Auth::login($user);

        return to_route('home');

    }
}
