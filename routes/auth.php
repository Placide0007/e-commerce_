<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[LoginController::class,'loginForm'])->name('login');
Route::get('/register',[RegisterController::class,'registerForm'])->name('register');
