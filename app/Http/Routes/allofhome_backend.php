<?php

/* ----- backend ----- */

// check Auth
    Route::filter('backend_auth', function()
    {
        if (!Auth::check() && !Auth::viaRemember())
        {
            return redirect('backend/login');
        }
    });

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
        'before' => 'backend_auth',
        'as' => 'backend_dashboard',
        'uses' => 'Backend\BackendDashboardController@index'
    ]);

    Route::get('backend', [
        'before' => 'backend_auth',
        'uses' => 'Backend\BackendDashboardController@index'
    ]);

//    User's Role
    Route::get('backend/user', [
        'before' => 'backend_auth',
        'as' => 'backend_user',
        'uses' => 'Backend\BackendUserController@index'
    ]);

    Route::get('backend/user_getDataTable', [
        'before' => 'backend_auth',
        'uses' => 'Backend\BackendUserController@getDataTable'
    ]);

    Route::get('backend/user_editUser/{id}', [
        'before' => 'backend_auth',
        'uses' => 'Backend\BackendUserController@editUser'
    ]);

    Route::post('backend/user_editSave', [
        'before' => 'backend_auth',
        'uses' => 'Backend\BackendUserController@editSave'
    ]);

//    New Post
    Route::get('backend/newPost', [
        'before' => 'backend_auth',
        'as' => 'backend_newPost',
        'uses' => 'Backend\BackendNewPostController@newPost'
    ]);

//    Banner
    Route::get('backend/banner', [
        'before' => 'backend_auth',
        'as' => 'backend_banner',
        'uses' => 'Backend\BackendBannerController@banner'
    ]);

//    News
    Route::get('backend/news', [
        'before' => 'backend_auth',
        'as' => 'backend_news',
        'uses' => 'Backend\BackendNewsController@news'
    ]);

//    Category
    Route::get('backend/category', [
        'before' => 'backend_auth',
        'as' => 'backend_category',
        'uses' => 'Backend\BackendCategoryController@category'
    ]);

//    Business Shop
    Route::get('backend/businessShop', [
        'before' => 'backend_auth',
        'as' => 'backend_businessShop',
        'uses' => 'Backend\BackendBusinessController@businessShop'
    ]);

//    BTS
    Route::get('backend/bts', [
        'before' => 'backend_auth',
        'as' => 'backend_bts',
        'uses' => 'Backend\BackendBTSController@bts'
    ]);

//    MRT
    Route::get('backend/mrt', [
        'before' => 'backend_auth',
        'as' => 'backend_mrt',
        'uses' => 'Backend\BackendMRTController@mrt'
    ]);

//    Airport Link
    Route::get('backend/airportLink', [
        'before' => 'backend_auth',
        'as' => 'backend_airportLink',
        'uses' => 'Backend\BackendAirportLinkController@airportLink'
    ]);

//    ทำเล / ย่าน
    Route::get('backend/location', [
        'before' => 'backend_auth',
        'as' => 'backend_location',
        'uses' => 'Backend\BackendLocationController@location'
    ]);

    Route::get('backend/mainLocation', [
        'before' => 'backend_auth',
        'as' => 'backend_mainLocation',
        'uses' => 'Backend\BackendLocationController@mainLocation'
    ]);

    Route::get('backend/subLocation', [
        'before' => 'backend_auth',
        'as' => 'backend_subLocation',
        'uses' => 'Backend\BackendLocationController@subLocation'
    ]);

//    สิ่งอำนวยความสะดวก
    Route::get('backend/facility', [
        'before' => 'backend_auth',
        'as' => 'backend_facility',
        'uses' => 'Backend\BackendFacilityController@facility'
    ]);

//    ส่วนลด โปรโมชั่น
    Route::get('backend/discount', [
        'before' => 'backend_auth',
        'as' => 'backend_discount',
        'uses' => 'Backend\BackendDiscountController@discount'
    ]);

//    Tag
    Route::get('backend/tag', [
        'before' => 'backend_auth',
        'as' => 'backend_tag',
        'uses' => 'Backend\BackendTagController@tag'
    ]);

    Route::get('backend/subTag', [
        'before' => 'backend_auth',
        'as' => 'backend_subTag',
        'uses' => 'Backend\BackendTagController@subTag'
    ]);

/* ----- ## backend ## ----- */