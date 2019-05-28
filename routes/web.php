<?php

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

// Authentication scaffolding routes
Auth::routes(['verify' => true]);

// Logged-in Homepage
Route::get('/home', 'HomeController@index')->name('home');

// Root URL
Route::get('/', function () {return redirect('home');});
