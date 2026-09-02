<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});

Route::get('/profile',[ProfileController::class,'profile_page'])->name('profile');
Route::get('/home',[HomeController::class,'home_page'])->name('home');

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';