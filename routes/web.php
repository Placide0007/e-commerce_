<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'home_page']);

Route::get('/home',[HomeController::class,'home_page'])->name('home');

Route::middleware(['auth'])->group(function(){

    Route::get('/profile',[ProfileController::class,'profile_page'])->name('profile');

});

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';

