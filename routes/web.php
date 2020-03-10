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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('home', 'RouteController@index')->name('home');

//Route for View Pages 
Route::get('login','RouteController@login');
Route::get('register','RouteController@register');
Route::get('register/setpassword/{customer_id}','RouteController@setPassword');
Route::get('logout','RouteController@logout')->name('logout');
Route::post('logout','RouteController@logout')->name('logout');
Route::get('teams/create','RouteController@createTeam');
Route::get('projects/create','RouteController@createProject');

// Dashboard Route
Route::get('dashboard','RouteController@dashboard')->name('dashboard');


//Customer Registration Setup Routes
Route::post('login','CustomerController@login')->name('login');
Route::post('register','CustomerController@register')->name('register');
Route::post('register/setpassword','CustomerController@setPassword')->name('setpassword');


// Team Routes
Route::post('teams/create','TeamsController@createTeam')->name('teams/create');

// Project Routes
Route::post('projects/create','ProjectsController@createProject')->name('projects/create');