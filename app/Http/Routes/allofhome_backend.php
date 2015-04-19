<?php

/* ----- backend ----- */

Route::get('backend/index', [
    'as' => 'backendindex',
    'uses' => 'Backend\DashboardController@index'
]);

Route::get('backend/user', [
    'as' => 'user',
    'uses' => 'Backend\UserController@index'
]);

/* ----- ## backend ## ----- */