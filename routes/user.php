<?php

use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\UserProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware(['auth','nocache'])->group(function(){

    Route::get('/cart',[CartController::class,'cart'])->name('cart');

    Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');

    Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('cart.remove');

    Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');

    Route::get('/products', [UserProductsController::class, 'products'])->name('user.products');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

});

