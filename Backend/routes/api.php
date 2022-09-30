<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('v1')->group(function () {
    Route::get('/banners', "App\Http\Controllers\ApiController@banner")->name('banners');
    Route::get('/brand', "App\Http\Controllers\ApiController@brand")->name('brand');
    Route::get('/contact', "App\Http\Controllers\ApiController@contact")->name('contact');
    Route::get('/bannertext', "App\Http\Controllers\ApiController@bannertext")->name('bannertext');
    Route::get('/ourstory', "App\Http\Controllers\ApiController@ourstory")->name('ourstory');
    Route::get('/products', "App\Http\Controllers\ApiController@products")->name('products');
});
