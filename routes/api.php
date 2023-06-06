<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route Category
Route::get('/category/list', '\App\Http\Controllers\CategoryController@list')->name('list_category');
Route::resource('category', '\App\Http\Controllers\CategoryController');

// Route Product
Route::get('/product/list', '\App\Http\Controllers\ProductController@list')->name('list_product');
Route::resource('product', '\App\Http\Controllers\ProductController');

// Route CategoryProduct
Route::get('/category_product/list', '\App\Http\Controllers\CategoryProductController@list')->name('list_category_product');
Route::resource('category_product', '\App\Http\Controllers\CategoryProductController');