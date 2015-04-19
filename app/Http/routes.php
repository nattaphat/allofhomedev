<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

include app_path().'/Http/Routes/allofhome.php';
include app_path().'/Http/Routes/allofhome_backend.php';

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

 Route::controllers([
 	'auth' => 'Auth\AuthController',
 	'password' => 'Auth\PasswordController',
 ]);
