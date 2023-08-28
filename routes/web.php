<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
Route::controller('App\Http\Controllers\HomeController')->group(function () {
    Route::get('/', 'index')->name('home.index');
    Route::get('/about', 'about')->name('home.about');
});
Route::controller('App\Http\Controllers\ProductController')->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('product.create');
    Route::post('/products/save', 'save')->name('product.save');
    Route::get('/products/{id}', 'show')->name('products.show');
});
Route::controller('App\Http\Controllers\CartController')->group(function () {
    Route::get('/cart', 'index')->name("cart.index");
    Route::get('/cart/add/{id}', 'add')->name("cart.add");
    Route::get('/cart/removeAll/', 'removeAll')->name("cart.removeAll");
});

Route::controller('App\Http\Controllers\ImageController')->group(function () {
    Route::get('/image', 'index')->name("image.index");
    Route::post('/image/save', 'save')->name("image.save");
});
Route::controller('App\Http\Controllers\ImageNotDIController')->group(function () {
    Route::get('/image-not-di', 'index')->name("imagenotdi.index");
    Route::post('/image-not-di/save', 'save')->name("imagenotdi.save");
});




