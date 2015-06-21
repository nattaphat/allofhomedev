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

    Route::get('backend/category_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_category_edit',
        'uses' => 'Backend\BackendCategoryController@category_edit'
    ]);

    Route::post('backend/category_update', [
        'before' => 'backend_auth',
        'as' => 'backend_category_update',
        'uses' => 'Backend\BackendCategoryController@category_update'
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

    Route::get('backend/bts_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_bts_edit',
        'uses' => 'Backend\BackendBtsController@bts_edit'
    ]);

    Route::post('backend/bts_update', [
        'before' => 'backend_auth',
        'as' => 'backend_bts_update',
        'uses' => 'Backend\BackendBtsController@bts_update'
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

//    หมวดหมู่ ทำเล / ย่าน
    Route::get('backend/location', [
        'before' => 'backend_auth',
        'as' => 'backend_location',
        'uses' => 'Backend\BackendLocationController@location'
    ]);

    Route::get('backend/location_new', [
        'before' => 'backend_auth',
        'as' => 'backend_location_new',
        'uses' => 'Backend\BackendLocationController@location_new'
    ]);

    Route::post('backend/location_store', [
        'before' => 'backend_auth',
        'as' => 'backend_location_store',
        'uses' => 'Backend\BackendLocationController@location_store'
    ]);

    Route::get('backend/location_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_location_edit',
        'uses' => 'Backend\BackendLocationController@location_edit'
    ]);

    Route::post('backend/location_update', [
        'before' => 'backend_auth',
        'as' => 'backend_location_update',
        'uses' => 'Backend\BackendLocationController@location_update'
    ]);

// Sub Area
    Route::get('backend/subArea', [
        'before' => 'backend_auth',
        'as' => 'backend_subArea',
        'uses' => 'Backend\BackendLocationController@subArea'
    ]);

    Route::get('backend/subArea_new', [
        'before' => 'backend_auth',
        'as' => 'backend_subArea_new',
        'uses' => 'Backend\BackendLocationController@subArea_new'
    ]);

    Route::post('backend/subArea_store', [
        'before' => 'backend_auth',
        'as' => 'backend_subArea_store',
        'uses' => 'Backend\BackendLocationController@subArea_store'
    ]);

    Route::get('backend/subArea_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_subArea_edit',
        'uses' => 'Backend\BackendLocationController@subArea_edit'
    ]);

    Route::post('backend/subArea_update', [
        'before' => 'backend_auth',
        'as' => 'backend_subArea_update',
        'uses' => 'Backend\BackendLocationController@subArea_update'
    ]);

//    สิ่งอำนวยความสะดวก
    Route::get('backend/facility', [
        'before' => 'backend_auth',
        'as' => 'backend_facility',
        'uses' => 'Backend\BackendFacilityController@facility'
    ]);

    Route::get('backend/facility_new', [
        'before' => 'backend_auth',
        'as' => 'backend_facility_new',
        'uses' => 'Backend\BackendFacilityController@facility_new'
    ]);

    Route::post('backend/facility_store', [
        'before' => 'backend_auth',
        'as' => 'backend_facility_store',
        'uses' => 'Backend\BackendFacilityController@facility_store'
    ]);

    Route::get('backend/facility_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_facility_edit',
        'uses' => 'Backend\BackendFacilityController@facility_edit'
    ]);

    Route::post('backend/facility_update', [
        'before' => 'backend_auth',
        'as' => 'backend_facility_update',
        'uses' => 'Backend\BackendFacilityController@facility_update'
    ]);

//    ส่วนลด โปรโมชั่น
    Route::get('backend/discount', [
        'before' => 'backend_auth',
        'as' => 'backend_discount',
        'uses' => 'Backend\BackendDiscountController@discount'
    ]);

    Route::get('backend/discount_new', [
        'before' => 'backend_auth',
        'as' => 'backend_discount_new',
        'uses' => 'Backend\BackendDiscountController@discount_new'
    ]);

    Route::post('backend/discount_store', [
        'before' => 'backend_auth',
        'as' => 'backend_discount_store',
        'uses' => 'Backend\BackendDiscountController@discount_store'
    ]);

    Route::get('backend/discount_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_discount_edit',
        'uses' => 'Backend\BackendDiscountController@discount_edit'
    ]);

    Route::post('backend/discount_update', [
        'before' => 'backend_auth',
        'as' => 'backend_discount_update',
        'uses' => 'Backend\BackendDiscountController@discount_update'
    ]);

    //    Tag Main
    Route::get('backend/tag', [
        'before' => 'backend_auth',
        'as' => 'backend_tag',
        'uses' => 'Backend\BackendTagController@tag'
    ]);

    Route::get('backend/tag_new', [
        'before' => 'backend_auth',
        'as' => 'backend_tag_new',
        'uses' => 'Backend\BackendTagController@tag_new'
    ]);

    Route::post('backend/tag_store', [
        'before' => 'backend_auth',
        'as' => 'backend_tag_store',
        'uses' => 'Backend\BackendTagController@tag_store'
    ]);

    Route::get('backend/tag_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_tag_edit',
        'uses' => 'Backend\BackendTagController@tag_edit'
    ]);

    Route::post('backend/tag_update', [
        'before' => 'backend_auth',
        'as' => 'backend_tag_update',
        'uses' => 'Backend\BackendTagController@tag_update'
    ]);

    //    Tag Sub
    Route::get('backend/subTag', [
        'before' => 'backend_auth',
        'as' => 'backend_subTag',
        'uses' => 'Backend\BackendTagController@subTag'
    ]);

    Route::get('backend/subTag_new', [
        'before' => 'backend_auth',
        'as' => 'backend_subTag_new',
        'uses' => 'Backend\BackendTagController@subTag_new'
    ]);

    Route::post('backend/subTag_store', [
        'before' => 'backend_auth',
        'as' => 'backend_subTag_store',
        'uses' => 'Backend\BackendTagController@subTag_store'
    ]);

    Route::get('backend/subTag_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_subTag_edit',
        'uses' => 'Backend\BackendTagController@subTag_edit'
    ]);

    Route::post('backend/subTag_update', [
        'before' => 'backend_auth',
        'as' => 'backend_subTag_update',
        'uses' => 'Backend\BackendTagController@subTag_update'
    ]);
    
    // Brand
    Route::get('backend/brand', [
        'before' => 'backend_auth',
        'as' => 'backend_brand',
        'uses' => 'Backend\BackendBrandController@brand'
    ]);

    Route::get('backend/brand_new', [
        'before' => 'backend_auth',
        'as' => 'backend_brand_new',
        'uses' => 'Backend\BackendBrandController@brand_new'
    ]);

    Route::post('backend/brand_store', [
        'before' => 'backend_auth',
        'as' => 'backend_brand_store',
        'uses' => 'Backend\BackendBrandController@brand_store'
    ]);

    Route::get('backend/brand_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_brand_edit',
        'uses' => 'Backend\BackendBrandController@brand_edit'
    ]);

    Route::post('backend/brand_update', [
        'before' => 'backend_auth',
        'as' => 'backend_brand_update',
        'uses' => 'Backend\BackendBrandController@brand_update'
    ]);

    Route::any('get_brand', [
        'before' => 'backend_auth',
        'as' => 'get_brand',
        'uses' => 'Backend\BackendBrandController@get_brand'
    ]);

    // Project
    Route::get('backend/project', [
        'before' => 'backend_auth',
        'as' => 'backend_project',
        'uses' => 'Backend\BackendProjectController@project'
    ]);

    Route::get('backend/project_new', [
        'before' => 'backend_auth',
        'as' => 'backend_project_new',
        'uses' => 'Backend\BackendProjectController@project_new'
    ]);

    Route::post('backend/project_store', [
        'before' => 'backend_auth',
        'as' => 'backend_project_store',
        'uses' => 'Backend\BackendProjectController@project_store'
    ]);

    Route::get('backend/project_edit/{id}', [
        'before' => 'backend_auth',
        'as' => 'backend_project_edit',
        'uses' => 'Backend\BackendProjectController@project_edit'
    ]);

    Route::post('backend/project_update', [
        'before' => 'backend_auth',
        'as' => 'backend_project_update',
        'uses' => 'Backend\BackendProjectController@project_update'
    ]);
/* ----- ## backend ## ----- */