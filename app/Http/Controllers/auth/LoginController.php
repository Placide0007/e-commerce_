<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','min:8'],
        ]);

        if (!Auth::attempt($fields)) {
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.'
            ]);
        }

        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return to_route('dashboard');
        }

        return to_route('home');
    }

    public function logout(Request $request) {
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}

