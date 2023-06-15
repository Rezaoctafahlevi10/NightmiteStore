<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/product', [ProductController::class, 'index_product'])->name('index_product'); #nampilin product
Route::get('/product/create',[ProductController::class,'create_product'])->name('create_product');
Route::post('/product/create',[ProductController::class,'store_product'])->name('store_product');
// Route::get('/product/{product_users}', [ProductController::class, 'show_product'])->name('show_product');
// Route::get('/product/edit{id}', [ProductController::class, 'edit_product'])->name('edit_product');
Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
Route::post('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');

Route::post('/cart/{product}',[CartsController::class,'add_to_cart'])->name('add_to_cart');
// Route::get('/cart',[CartsController::class,'show_carts'])->name('show_carts');
require __DIR__.'/auth.php';
