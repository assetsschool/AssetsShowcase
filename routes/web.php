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


// Current user's profile
Route::get('/me', 'ProfileController@index')->name('me');
// Post request for editing own profile
Route::post('/me', 'ProfileController@edit')->name('edit-my-profile');
// Looking for other user profiles
Route::get('/profile/{email}', 'ProfileController@view')->name('profile');


// Root URL
Route::get('/', function () {return redirect('home');});
