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

    Route::resource('users', 'UsersController');
    Route::patch('/users/{user}', 'UsersController@block')->name('users-block');
});
