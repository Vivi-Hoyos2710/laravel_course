<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class,'index'])->name("home.index");
Route::get('/about', [HomeController::class,'about'])->name("home.about");
Route::get('/products', [ProductController::class,'index'])->name("products.index");
Route::get('/products/create', [ProductController::class,'create'])->name("product.create");
Route::post('/products/save', [ProductController::class,'save'])->name("product.save");
Route::get('/products/{id}', [ProductController::class,'show'])->name("products.show");