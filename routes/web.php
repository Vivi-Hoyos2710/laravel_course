<?php

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
