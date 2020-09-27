<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/{name}_{id}', [MainController::class, 'showProduct'])->name('showProduct');

Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::get('/command/{price}_{quantity}', [MainController::class, 'passCommand'])->name('command');
Route::post('/product/{id}/addtocart', [ProductController::class, 'addToCart'])->name('addToCart');


Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
