<?php

/* ----- backend ----- */

//    Login Logout
    Route::get('backend/login', [
        'as' => 'backend_login',
        'uses' => 'Backend\BackendLoginController@index'
    ]);

    Route::post('backend/login', [
        'as' => 'backend_post_login',
        'uses' => 'Backend\BackendLoginController@post_login'
    ]);

    Route::get('backend/logout', [
        'as' => 'backend_logout',
        'uses' => 'Backend\BackendLoginController@logout'
    ]);

//    Dashboard
    Route::get('backend/index', [
        'as' => 'backend_dashboard',
        'uses' => 'Backend\BackendDashboardController@index'
    ]);

    Route::get('backend', [
        'uses' => 'Backend\BackendDashboardController@index'
    ]);

//    User's Role
    Route::get('backend/user', [
        'as' => 'backend_user',
        'uses' => 'Backend\BackendUserController@index'
    ]);

//    New Post
    Route::get('backend/newPost', [
        'as' => 'backend_newPost',
        'uses' => 'Backend\BackendNewPostController@newPost'
    ]);

//    Banner
    Route::get('backend/banner', [
        'as' => 'backend_banner',
        'uses' => 'Backend\BackendBannerController@banner'
    ]);

//    News
    Route::get('backend/news', [
        'as' => 'backend_news',
        'uses' => 'Backend\BackendNewsController@news'
    ]);

//    Category
    Route::get('backend/category', [
        'as' => 'backend_category',
        'uses' => 'Backend\BackendCategoryController@category'
    ]);

//    Business Shop
    Route::get('backend/businessShop', [
        'as' => 'backend_businessShop',
        'uses' => 'Backend\BackendBusinessController@businessShop'
    ]);

//    BTS
    Route::get('backend/bts', [
        'as' => 'backend_bts',
        'uses' => 'Backend\BackendBTSController@bts'
    ]);

//    MRT
    Route::get('backend/mrt', [
        'as' => 'backend_mrt',
        'uses' => 'Backend\BackendMRTController@mrt'
    ]);

//    Airport Link
    Route::get('backend/airportLink', [
        'as' => 'backend_airportLink',
        'uses' => 'Backend\BackendAirportLinkController@airportLink'
    ]);

//    ทำเล / ย่าน
    Route::get('backend/location', [
        'as' => 'backend_location',
        'uses' => 'Backend\BackendLocationController@location'
    ]);

    Route::get('backend/mainLocation', [
        'as' => 'backend_mainLocation',
        'uses' => 'Backend\BackendLocationController@mainLocation'
    ]);

    Route::get('backend/subLocation', [
        'as' => 'backend_subLocation',
        'uses' => 'Backend\BackendLocationController@subLocation'
    ]);

//    สิ่งอำนวยความสะดวก
    Route::get('backend/facility', [
        'as' => 'backend_facility',
        'uses' => 'Backend\BackendFacilityController@facility'
    ]);

//    ส่วนลด โปรโมชั่น
    Route::get('backend/discount', [
        'as' => 'backend_discount',
        'uses' => 'Backend\BackendDiscountController@discount'
    ]);

//    Tag
    Route::get('backend/tag', [
        'as' => 'backend_tag',
        'uses' => 'Backend\BackendTagController@tag'
    ]);

    Route::get('backend/subTag', [
        'as' => 'backend_subTag',
        'uses' => 'Backend\BackendTagController@subTag'
    ]);

/* ----- ## backend ## ----- */