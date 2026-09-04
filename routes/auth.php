<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[LoginController::class,'loginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/register',[RegisterController::class,'registerForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
