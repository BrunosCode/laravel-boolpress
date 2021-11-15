<?php

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

// Public routes
Route::get('/', 'PageController@index');

// Auth routes
Auth::routes();

// Admin routes
Route::middleware("auth")->namespace("Admin")->name("Admin.")->prefix("admin")->group(function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("posts", "PostController");

});