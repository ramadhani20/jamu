<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

route::resource('/products', 'App\Http\Controllers\ProductController');
route::resource('/product-galleries', 'App\Http\Controllers\ProductGalleryController');
route::get('transactions{id}/set-status', 'App\Http\Controllers\TransactionController@setStatus')->name('transactions.status');
route::resource('/transactions', 'App\Http\Controllers\TransactionController');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
