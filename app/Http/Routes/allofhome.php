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

//Route::get('/', ['middleware' => 'auth', 'uses' => 'AllofhomeController@index']);

Route::get('signup', [
    'as' => 'signup',
    'uses' => 'Frontend\SignupController@signup'
]);

Route::post('postsignup', [
    'as' => 'postsignup',
    'uses' => 'Frontend\SignupController@postSignup'
]);

Route::get('login', [
    'as' => 'signin',
    'uses' => 'AllofhomeController@login'
]);

Route::post('login', [
    'as' => 'postsignin',
    'uses' => 'Auth\AuthController@postLogin'
]);


Route::get('forgotpwd', [
    'as' => 'forgotpwd',
    'uses' => 'Auth\PasswordController@getEmail'
]);

Route::post('forgotpwd', [
    'as' => 'postforgetpwd',
    'uses' => 'Auth\PasswordController@postEmail'
]);

Route::get('resetpwd/{token?}', [
    'as' => 'resetpwd',
    'uses' => 'Auth\PasswordController@getReset'
]);

Route::post('resetpwd', [
    'as' => 'postresetpwd',
    'uses' => 'Auth\PasswordController@postReset'
]);

Route::get('twlogin', [
    'as' => 'twlogin',
    'uses' => 'Auth\AuthController@redirectToProvider'
]);

Route::get('twpostlogin', [
    'as' => 'twpostlogin',
    'uses' => 'Auth\AuthController@handleProviderCallback'
]);

Route::get('fblogin', [
    'as' => 'fblogin',
    'uses' => 'Auth\AuthController@redirectFBToProvider'
]);

Route::get('fbpostlogin', [
    'as' => 'fbpostlogin',
    'uses' => 'Auth\AuthController@handleFBProviderCallback'
]);

/*----------------------------------------------Login first -------------------------------*/
Route::group(['middleware' => 'auth'], function()
{
    /* Frontend route*/
    Route::get('/', [
        'as' => 'index',
        'uses' => 'AllofhomeController@index'
    ]);

    Route::get('signout', [
        'as' => 'signout',
        'uses' => 'Auth\AuthController@logout'
    ]);

    Route::get('user/accinfo', [
        'as' => 'user_accinfo',
        'uses' => 'Frontend\UserinfoController@userInfo'
    ]);

	Route::post('user/accinfo', [
            'as' => 'user_postaccinfo',
            'uses' => 'Frontend\UserinfoController@postUpdateInfo'
    ]);

	Route::get('user/passwd', [
		'as' => 'user_passwd',
		'uses' => 'Frontend\UserinfoController@userChangePwd'
	]);

	Route::post('user/passwd', [
		'as' => 'user_postpasswd',
		'uses' => 'Frontend\UserinfoController@postUserChangePwd'
	]);

    Route::get('user/uasge', [
        'as' => 'user_usage',
        'uses' => 'AllofhomeController@index'
    ]);

    Route::get('user/msg', [
        'as' => 'user_msg',
        'uses' => 'AllofhomeController@index'
    ]);

    Route::get('post/add', [
        'as' => 'post_add',
        'uses' => 'AllofhomeController@createPost'
    ]);

    /*-------------------------------- Home -------------------------------*/
    Route::get('home/index', [
        'as' => 'home_index',
        'uses' => 'Frontend\HomeCategoryController@index'
    ]);

    Route::get('home/create', [
        'as' => 'home_create',
        'uses' => 'Frontend\HomeCategoryController@create'
    ]);

    Route::get('home/update', [
        'as' => 'home_update',
        'uses' => 'Frontend\HomeCategoryController@update'
    ]);

    Route::get('home/view', [
        'as' => 'home_view',
        'uses' => 'Frontend\HomeCategoryController@view'
    ]);

    /*-------------------------------- Condo -------------------------------*/
    Route::get('condo/index', [
        'as' => 'condo_index',
        'uses' => 'Frontend\CondoCategoryController@index'
    ]);

    Route::get('condo/create', [
        'as' => 'condo_create',
        'uses' => 'Frontend\CondoCategoryController@create'
    ]);

    Route::get('condo/update', [
        'as' => 'condo_update',
        'uses' => 'Frontend\CondoCategoryController@update'
    ]);

    Route::get('condo/view', [
        'as' => 'condo_view',
        'uses' => 'Frontend\CondoCategoryController@view'
    ]);

    /*-------------------------------- Townhome -------------------------------*/
    Route::get('townhome/index', [
        'as' => 'townhome_index',
        'uses' => 'Frontend\TownHomeCategoryController@index'
    ]);

    Route::get('townhome/create', [
        'as' => 'townhome_create',
        'uses' => 'Frontend\TownHomeCategoryController@create'
    ]);

    Route::get('townhome/update', [
        'as' => 'townhome_update',
        'uses' => 'Frontend\TownHomeCategoryController@update'
    ]);

    Route::get('townhome/view', [
        'as' => 'townhome_view',
        'uses' => 'Frontend\TownHomeCategoryController@view'
    ]);

    /*-------------------------------- Interior Design -------------------------------*/
    Route::get('interiorDesign/index', [
        'as' => 'interiorDesign_index',
        'uses' => 'Frontend\InteriorDesignCategoryController@index'
    ]);

    Route::get('interiorDesign/create', [
        'as' => 'interiorDesign_create',
        'uses' => 'Frontend\InteriorDesignCategoryController@create'
    ]);

    Route::get('interiorDesign/update', [
        'as' => 'interiorDesign_update',
        'uses' => 'Frontend\InteriorDesignCategoryController@update'
    ]);

    Route::get('interiorDesign/view', [
        'as' => 'interiorDesign_view',
        'uses' => 'Frontend\InteriorDesignCategoryController@view'
    ]);

    /*-------------------------------- Land -------------------------------*/
    Route::get('land/index', [
        'as' => 'land_index',
        'uses' => 'Frontend\LandCategoryController@index'
    ]);

    Route::get('land/create', [
        'as' => 'land_create',
        'uses' => 'Frontend\LandCategoryController@create'
    ]);

    Route::get('land/update', [
        'as' => 'land_update',
        'uses' => 'Frontend\LandCategoryController@update'
    ]);

    Route::get('land/view', [
        'as' => 'land_view',
        'uses' => 'Frontend\LandCategoryController@view'
    ]);

    /*-------------------------------- Furniture -------------------------------*/
    Route::get('furniture/index', [
        'as' => 'furniture_index',
        'uses' => 'Frontend\FurnitureCategoryController@index'
    ]);

    Route::get('furniture/create', [
        'as' => 'furniture_create',
        'uses' => 'Frontend\FurnitureCategoryController@create'
    ]);

    Route::get('furniture/update', [
        'as' => 'furniture_update',
        'uses' => 'Frontend\FurnitureCategoryController@update'
    ]);

    Route::get('furniture/view', [
        'as' => 'furniture_view',
        'uses' => 'Frontend\FurnitureCategoryController@view'
    ]);

    /*-------------------------------- Electric -------------------------------*/
    Route::get('electric/index', [
        'as' => 'electric_index',
        'uses' => 'Frontend\ElectricCategoryController@index'
    ]);

    Route::get('electric/create', [
        'as' => 'electric_create',
        'uses' => 'Frontend\ElectricCategoryController@create'
    ]);

    Route::get('electric/update', [
        'as' => 'electric_update',
        'uses' => 'Frontend\ElectricCategoryController@update'
    ]);

    Route::get('electric/view', [
        'as' => 'electric_view',
        'uses' => 'Frontend\ElectricCategoryController@view'
    ]);

    /*-------------------------------- Kitchenware -------------------------------*/
    Route::get('kitchenware/index', [
        'as' => 'kitchenware_index',
        'uses' => 'Frontend\KitchenwareCategoryController@index'
    ]);

    Route::get('kitchenware/create', [
        'as' => 'kitchenware_create',
        'uses' => 'Frontend\KitchenwareCategoryController@create'
    ]);

    Route::get('kitchenware/update', [
        'as' => 'kitchenware_update',
        'uses' => 'Frontend\HomeCategoryController@update'
    ]);

    Route::get('kitchenware/view', [
        'as' => 'kitchenware_view',
        'uses' => 'Frontend\KitchenwareCategoryController@view'
    ]);

    /*-------------------------------- Contractor -------------------------------*/
    Route::get('contractor/index', [
        'as' => 'contractor_index',
        'uses' => 'Frontend\ContractorCategoryController@index'
    ]);

    Route::get('contractor/create', [
        'as' => 'contractor_create',
        'uses' => 'Frontend\ContractorCategoryController@create'
    ]);

    Route::get('contractor/update', [
        'as' => 'contractor_update',
        'uses' => 'Frontend\ContractorCategoryController@update'
    ]);

    Route::get('contractor/view', [
        'as' => 'contractor_view',
        'uses' => 'Frontend\ContractorCategoryController@view'
    ]);

    /*-------------------------------- Garden -------------------------------*/
    Route::get('garden/index', [
        'as' => 'garden_index',
        'uses' => 'Frontend\GardenCategoryController@index'
    ]);

    Route::get('garden/create', [
        'as' => 'garden_index_create',
        'uses' => 'Frontend\GardenCategoryController@create'
    ]);

    Route::get('garden/update', [
        'as' => 'garden_index_update',
        'uses' => 'Frontend\GardenCategoryController@update'
    ]);

    Route::get('garden/view', [
        'as' => 'garden_index_view',
        'uses' => 'Frontend\GardenCategoryController@view'
    ]);

    /*-------------------------------- OldFurniture -------------------------------*/
    Route::get('oldFurniture/index', [
        'as' => 'oldFurniture_index',
        'uses' => 'Frontend\OldFurnitureCategoryController@index'
    ]);

    Route::get('oldFurniture/create', [
        'as' => 'oldFurniture_create',
        'uses' => 'Frontend\OldFurnitureCategoryController@create'
    ]);

    Route::get('oldFurniture/update', [
        'as' => 'oldFurniture_update',
        'uses' => 'Frontend\OldFurnitureCategoryController@update'
    ]);

    Route::get('oldFurniture/view', [
        'as' => 'oldFurniture_view',
        'uses' => 'Frontend\OldFurnitureCategoryController@view'
    ]);
    /*------------------------------------------------------------------------------*/
});

/*--------------------------------------------------------------*/

Route::get('fblogin', [
	'as' => 'fblogin',
	'uses' => 'Auth\AuthController@facebooklogin'
]);

Route::get('fblogged', [
	'as' => 'fblogged',
	'uses' => 'Auth\AuthController@facebooklogined'
]);

Route::get('twlogged', [
	'as' => 'twlogged',
	'uses' => 'Auth\AuthController@twlogged'
]);

//Route::get('twlogin', [
//	'as' => 'twlogin',
//	'uses' => 'SocialLoginController@TWlogin'
//]);

Route::get('aboutus', [
	'as' => 'aboutus_basic',
	'uses' => 'AllofhomeController@about'
]);

Route::get('aboutusex', [
	'as' => 'aboutus_extend',
	'uses' => 'AllofhomeController@about_ex'
]);

Route::get('aboutusme', [
	'as' => 'aboutus_me',
	'uses' => 'AllofhomeController@about_me'
]);

Route::get('teamlist', [
	'as' => 'teamlist',
	'uses' => 'AllofhomeController@teamlist'
]);

Route::get('teamgrid', [
	'as' => 'teamgrid',
	'uses' => 'AllofhomeController@teamgrid'
]);

Route::get('teammemb', [
	'as' => 'teammemb',
	'uses' => 'AllofhomeController@teammemb'
]);

Route::get('contactus', [
	'as' => 'contact',
	'uses' => 'AllofhomeController@contact'
]);

Route::get('pricing', [
	'as' => 'pricing',
	'uses' => 'AllofhomeController@pricing'
]);

Route::get('pricing_table', [
	'as' => 'pricing_table',
	'uses' => 'AllofhomeController@pricing_table'
]);

Route::get('timeline', [
	'as' => 'timeline',
	'uses' => 'AllofhomeController@timeline'
]);

Route::get('timelineleft', [
	'as' => 'timelineleft',
	'uses' => 'AllofhomeController@timelineleft'
]);

Route::get('timelineright', [
	'as' => 'timelineright',
	'uses' => 'AllofhomeController@timelineright'
]);

Route::get('timelinestacked', [
	'as' => 'timelinestacked',
	'uses' => 'AllofhomeController@timelinestacked'
]);

Route::get('custumers', [
	'as' => 'custumers',
	'uses' => 'AllofhomeController@custumers'
]);

Route::get('features', [
	'as' => 'features',
	'uses' => 'AllofhomeController@features'
]);

Route::get('starter', [
	'as' => 'starter',
	'uses' => 'AllofhomeController@starter'
]);

Route::get('index-boxed', [
	'as' => 'index_boxed',
	'uses' => 'AllofhomeController@index_boxed'
]);

Route::get('blog', [
	'as' => 'blog',
	'uses' => 'AllofhomeController@blog'
]);

Route::get('blogleft', [
	'as' => 'blogleft',
	'uses' => 'AllofhomeController@blogleft'
]);

Route::get('blogtimeline', [
	'as' => 'blogtimeline',
	'uses' => 'AllofhomeController@blogtimeline'
]);

Route::get('bloggrid', [
	'as' => 'bloggrid',
	'uses' => 'AllofhomeController@bloggrid'
]);

Route::get('blogpost', [
	'as' => 'blogpost',
	'uses' => 'AllofhomeController@blogpost'
]);

Route::get('blogvdo', [
	'as' => 'blogvdo',
	'uses' => 'AllofhomeController@blogvdo'
]);

Route::get('blogpostslide', [
	'as' => 'blogpostslide',
	'uses' => 'AllofhomeController@blogpostslide'
]);

Route::get('blogpostaudio', [
	'as' => 'blogpostaudio',
	'uses' => 'AllofhomeController@blogpostaudio'
]);

Route::get('sliderdefault', [
	'as' => 'sliderdefault',
	'uses' => 'AllofhomeController@sliderdefault'
]);

Route::get('sliderfull', [
	'as' => 'sliderfull',
	'uses' => 'AllofhomeController@sliderfull'
]);

Route::get('sliderbehide', [
	'as' => 'sliderbehide',
	'uses' => 'AllofhomeController@sliderbehide'
]);

Route::get('sliderboxed', [
	'as' => 'sliderboxed',
	'uses' => 'AllofhomeController@sliderboxed'
]);

Route::get('backstretch', [
	'as' => 'backstretch',
	'uses' => 'AllofhomeController@backstretch'
]);

Route::get('backstretchboxed', [
	'as' => 'backstretchboxed',
	'uses' => 'AllofhomeController@backstretchboxed'
]);

Route::get('flexslider_default', [
	'as' => 'flexslider_default',
	'uses' => 'AllofhomeController@flexslider_default'
]);

Route::get('flexslider_full', [
	'as' => 'flexslider_full',
	'uses' => 'AllofhomeController@flexslider_full'
]);

Route::get('flexslider_behide', [
	'as' => 'flexslider_behide',
	'uses' => 'AllofhomeController@flexslider_behide'
]);

Route::get('flexslider_boxed', [
	'as' => 'flexslider_boxed',
	'uses' => 'AllofhomeController@flexslider_boxed'
]);

Route::get('elements', [
	'as' => 'elements',
	'uses' => 'AllofhomeController@elements'
]);

Route::get('colours', [
	'as' => 'colours',
	'uses' => 'AllofhomeController@colours'
]);

Route::get('bs_mobilemenu', [
	'as' => 'bs_mobilemenu',
	'uses' => 'AllofhomeController@bs_mobilemenu'
]);