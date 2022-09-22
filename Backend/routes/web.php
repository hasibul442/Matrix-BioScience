<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])
    ->group(
        function () {
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

            Route::get('/banners', "App\Http\Controllers\BannersController@index")->name('banners');
            Route::post('/banners/create', "App\Http\Controllers\BannersController@store")->name('banners.create');
            Route::match(['get', 'post'], '/banner/edit/{id}', "App\Http\Controllers\BannersController@edit")->name('banner.edit');
            Route::get('/banner/status/{id}/{status}', "App\Http\Controllers\BannersController@statuschange")->name('banner.status.change');
            Route::delete('/banner/{id}', "App\Http\Controllers\BannersController@destroy");

            Route::get('/brands', "App\Http\Controllers\BrandController@index")->name('brands');
            Route::post('/brands/create', "App\Http\Controllers\BrandController@store")->name('brand.create');
            Route::match(['get', 'post'], '/brands/edit/{id}', "App\Http\Controllers\BrandController@edit")->name('brand.edit');
            Route::get('/brands/status/{id}/{status}', "App\Http\Controllers\BrandController@statuschange")->name('brand.status.change');
            Route::delete('/brands/{id}', "App\Http\Controllers\BrandController@destroy")->name('brand.delete');

            Route::get('/contact', "App\Http\Controllers\ContactController@index")->name('contact');
            Route::post('/contact/create', "App\Http\Controllers\ContactController@store")->name('contact.create');
            Route::get('/contact/edit/{id}', "App\Http\Controllers\ContactController@edit")->name('contact.edit');
            Route::put('/contact/update', "App\Http\Controllers\ContactController@update")->name('contact.update');
            Route::get('/contact/status/{id}/{status}', "App\Http\Controllers\ContactController@statuschange")->name('contact.status.change');
            Route::delete('/contact/{id}', "App\Http\Controllers\ContactController@destroy")->name('contact.delete');

            Route::get('/products', "App\Http\Controllers\ProductController@index")->name('products');
            Route::post('/products/create', "App\Http\Controllers\ProductController@store")->name('product.create');
            Route::match(['get', 'post'], '/products/edit/{id}', "App\Http\Controllers\ProductController@edit")->name('product.edit');
            Route::get('/products/status/{id}/{status}', "App\Http\Controllers\ProductController@statuschange")->name('product.status.change');
            Route::delete('/products/{id}', "App\Http\Controllers\ProductController@destroy")->name('product.delete');

            Route::get('/ourstories', "App\Http\Controllers\OurStoriesController@index")->name('ourstories');
        }
    );
