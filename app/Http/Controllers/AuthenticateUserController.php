<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUserController extends Controller
{
    public function loginForm(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $login_request)
    {
        $credentials = $login_request->validated();

        try {

            if (Auth::attempt($credentials)) {

                $login_request->session()->regenerate();

                if (Auth::user()->isAdmin()) {
                    return redirect()->route('dashboard');
                }

                return redirect()->route('home');
            }

            return back()->withErrors([
                'email' => 'Les informations saisi sont incorrect',
            ])->onlyInput();

        } catch (Exception $e) {
            return back()->withErrors([
                'email' => 'Une erreur s \' est produite lors de la connexion',
            ])->onlyInput();
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
