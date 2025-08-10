<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\RegisterUserController;
use App\Http\Controllers\AuthenticateUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('guest')->group(function (): void {
    Route::get('/register', [RegisterUserController::class, 'registerForm'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store']);
    Route::get('/login', [AuthenticateUserController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthenticateUserController::class, 'login']);
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [AuthenticateUserController::class, 'logout'])->name('logout');
    Route::resource('profils', ProfilController::class)->except(['store', 'show']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class)->except(['store']);
    Route::resource('cart', CartController::class)->except(['show']);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('products', ProductController::class);
    // Route::get('/cart/commander', [CartController::class, 'commander'])->name('cart.commander');
    Route::get('/cart/annule', [CartController::class, 'annuler'])->name('cart.annuler');
});

Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/category/{id}', [HomeController::class, 'filterByCategory'])->name('category.filter');
