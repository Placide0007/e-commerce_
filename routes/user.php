<?php

use App\Http\Controllers\user\CartController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function(){
    Route::get('/orders',[CartController::class,'cart'])->name('cart');
});
