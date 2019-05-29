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
Route::put('/me', 'ProfileController@edit')->name('edit-my-profile');
// Looking for other user profiles
Route::get('/profile/{email}', 'ProfileController@view')->name('profile');

// Show all projects in the database
Route::get('/projects', 'ProjectController@viewAll')->name('projects');
// Creating a project input request                                                  //Change me (you know whats up).
Route::get('/project', 'ProjectController@createView')->name('new-project');
// Creating a project
Route::put('/project', 'ProjectController@create')->name('create-new-project');
// Viewing other peoples projects
Route::get('/project/{email}/{title}', 'ProjectController@view')->name('project');

// Root URL
Route::get('/', function () {return redirect('home');});
