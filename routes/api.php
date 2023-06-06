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
Route::get('/product/list_name', '\App\Http\Controllers\ProductController@list_name')->name('list_name_product');
Route::resource('product', '\App\Http\Controllers\ProductController');

// Route CategoryProduct
Route::get('/category_product/list_name', '\App\Http\Controllers\CategoryProductController@list_name')->name('list_name_category_product');
Route::get('/category_product/list', '\App\Http\Controllers\CategoryProductController@list')->name('list_category_product');
Route::resource('category_product', '\App\Http\Controllers\CategoryProductController');

// Route Image
Route::get('/image/list', '\App\Http\Controllers\ImageController@list')->name('list_image');
Route::get('/image/get_image/{id}', '\App\Http\Controllers\ImageController@get_image')->name('get_image');
Route::resource('image', '\App\Http\Controllers\ImageController');

// Route Image
Route::get('/product_image/list', '\App\Http\Controllers\ProductImageController@list')->name('list_product_image');
Route::get('/product_image/list_name', '\App\Http\Controllers\ProductImageController@list_name')->name('list_name_product_image');
Route::get('/product_image/get_product_image/{id}', '\App\Http\Controllers\ProductImageController@get_product_image')->name('get_product_image');
Route::resource('product_image', '\App\Http\Controllers\ProductImageController');