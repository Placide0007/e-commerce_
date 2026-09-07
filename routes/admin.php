<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'role:admin','nocache'])->group(function(){

        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

        Route::get('/orders',[OrdersController::class,'index'])->name('orders');

        Route::get('/orders/{order}',[OrdersController::class,'show'])->name('orders.show');

        Route::patch('/orders/{order}/confirm',[OrdersController::class,'confirm'])->name('orders.confirm');

        Route::get('/orders/{order}/pdf',[OrdersController::class,'pdf'])->name('orders.pdf');

        Route::resource('users',UsersController::class);

        Route::resource('products',ProductsController::class);

        Route::resource('categories',CategoriesController::class);

    });

