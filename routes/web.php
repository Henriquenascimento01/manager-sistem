<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('marketplace');


Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('products', 'ProductController');
    Route::patch('/producs/{product}', 'ProductController@block')->name('products-block');
    Route::get('/blocked-products', 'ProductController@blocked_products')->name('blocked-products');
    Route::patch('/unblock-products/{product}', 'ProductController@unblock_product')->name('unblock-product');

    Route::resource('users', 'UsersController');
    Route::put('/users/{users}', 'UsersController@update')->name('user-update');
    Route::patch('/users/{user}', 'UsersController@block')->name('users-block');
    Route::get('/blocked-users', 'UsersController@blocked_users')->name('blocked-users');
    Route::patch('/unblock-users/{user}', 'UsersController@unblock_user')->name('unblock-users');

    Route::resource('/cart', 'CartController');
    Route::post('/delete-items', 'CartController@remove_items')->name('remove-items');

    Route::resource('/order', 'OrdersController');
    Route::delete('/delete-order', 'OrdersController@destroy')->name('delete-order');
});
