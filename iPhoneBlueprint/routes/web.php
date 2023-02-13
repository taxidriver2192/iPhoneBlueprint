<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
// Products
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// CartController
Route::post('products/{product}/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('products/{product}/remove', [CartController::class, 'remove'])->name('cart.remove');

//Card
Route::get('cart', [CartController::class, 'show'])->name('cart.show');
Route::post('cart/{product}/update', [CartController::class, 'update'])->name('cart.update');
