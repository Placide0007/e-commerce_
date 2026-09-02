<?php

use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Route::resource('users',UsersController::class);
    Route::resource('products',ProductsController::class);
});
