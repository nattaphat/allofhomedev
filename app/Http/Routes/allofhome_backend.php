<?php

/* ----- backend ----- */

Route::get('backend/login', [
    'as' => 'backend_login',
    'uses' => 'Backend\LoginController@index'
]);

Route::post('backend/login', [
    'as' => 'backend_post_login',
    'uses' => 'Backend\LoginController@post_login'
]);

Route::get('backend/index', [
    'as' => 'backend_dashboard',
    'uses' => 'Backend\DashboardController@index'
]);

Route::get('backend/user', [
    'as' => 'backend_user',
    'uses' => 'Backend\UserController@index'
]);

/* ----- ## backend ## ----- */