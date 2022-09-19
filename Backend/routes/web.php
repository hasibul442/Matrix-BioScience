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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/banners', "App\Http\Controllers\BannersController@index")->name('banners');
Route::post('/banners/create', "App\Http\Controllers\BannersController@store")->name('banners.create');
Route::match(['get', 'post'],'/banner/edit/{id}', "App\Http\Controllers\BannersController@edit")->name('banner.edit');
Route::get('/banner/status/{id}/{status}', "App\Http\Controllers\BannersController@statuschange")->name('banner.status.change');
Route::delete('/banner/{id}', "App\Http\Controllers\BannersController@destroy");

Route::get('/brands', "App\Http\Controllers\BrandController@index")->name('brands');
Route::post('/brands/create', "App\Http\Controllers\BrandController@store")->name('brand.create');
Route::get('/brands/status/{id}', "App\Http\Controllers\BrandController@statuschange")->name('brand.status.change');
Route::delete('/brands/{id}', "App\Http\Controllers\BrandController@destroy")->name('brand.delete');


