<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register',[AuthController::class, 'registrationForm']);
Route::post('/store-user', [AuthController::class, 'register'])->name('register');
Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify');


Route::group(['middleware'=>'auth'], function() {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create',[ProductController::class, 'create']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/store-product', [ProductController::class, 'store']);
});
