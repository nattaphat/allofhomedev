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

// Filter Login
Route::filter('frontend_auth', function()
{
    if (!Auth::check() && !Auth::viaRemember())
    {
        return redirect('login');
    }
});

//    Login Logout
Route::get('login', [
    'as' => 'login',
    'uses' => 'AllofhomeController@login'
]);

Route::post('login', [
    'as' => 'postsignin',
    'uses' => 'AllofhomeController@post_login'
]);

Route::get('signout', [
    'as' => 'signout',
    'uses' => 'AllofhomeController@logout'
]);


//Route::get('login', [
//    'as' => 'signin',
//    'uses' => 'AllofhomeController@login'
//]);
//
//Route::post('login', [
//    'as' => 'postsignin',
//    'uses' => 'Auth\AuthController@postLogin'
//]);


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

});

/*--------------------------------------------------------------*/




/* Frontend route*/
Route::get('/', [
    'as' => 'index',
//    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@index'
]);

Route::any('index/ajax/{type}', array(
    'as'    => 'index.type',
    'uses'  => 'AllofhomeController@getIndexType'
))->where('type', 'home|article|idea');

//    Route::get('signout', [
//        'as' => 'signout',
//        'uses' => 'Auth\AuthController@logout'
//    ]);

Route::get('user/accinfo', [
    'as' => 'user_accinfo',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\UserinfoController@userInfo'
]);

Route::post('user/accinfo', [
    'as' => 'user_postaccinfo',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\UserinfoController@postUpdateInfo'
]);

Route::get('user/passwd', [
    'as' => 'user_passwd',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\UserinfoController@userChangePwd'
]);

Route::post('user/passwd', [
    'as' => 'user_postpasswd',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\UserinfoController@postUserChangePwd'
]);

Route::get('user/uasge', [
    'as' => 'user_usage',
    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@index'
]);

Route::get('user/msg', [
    'as' => 'user_msg',
    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@index'
]);

Route::get('post/add', [
    'as' => 'post_add',
    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@createPost'
]);

/*-------------------------------- Add New Topic -----------------------*/
Route::get('topic/list', [
    'as' => 'topic_list',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\TopicController@index'
]);


/*-------------------------------- Home -------------------------------*/
Route::get('home', [
    'as' => 'home_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\HomeCategoryController@index'
]);

Route::get('home/create', [
    'as' => 'home_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\HomeCategoryController@create'
]);

Route::post('home/create', [
    'as' => 'post_home_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\HomeCategoryController@post_create'
]);

Route::get('home/update', [
    'as' => 'home_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\HomeCategoryController@update'
]);

Route::get('home/view/{id}', [
    'as' => 'home_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\HomeCategoryController@view'
]);

/*-------------------------------- Condo -------------------------------*/
Route::get('condo', [
    'as' => 'condo_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\CondoCategoryController@index'
]);

Route::get('condo/create', [
    'as' => 'condo_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\CondoCategoryController@create'
]);

Route::post('condo/create', [
    'as' => 'post_condo_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\CondoCategoryController@post_create'
]);

Route::get('condo/update', [
    'as' => 'condo_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\CondoCategoryController@update'
]);

Route::get('condo/view/{id}', [
    'as' => 'condo_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\CondoCategoryController@view'
]);

/*-------------------------------- Townhome -------------------------------*/
Route::get('townhome', [
    'as' => 'townhome_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\TownHomeCategoryController@index'
]);

Route::get('townhome/create', [
    'as' => 'townhome_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\TownHomeCategoryController@create'
]);

Route::post('townhome/create', [
    'as' => 'post_townhome_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\TownHomeCategoryController@post_create'
]);

Route::get('townhome/update', [
    'as' => 'townhome_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\TownHomeCategoryController@update'
]);

Route::get('townhome/view/{id}', [
    'as' => 'townhome_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\TownHomeCategoryController@view'
]);

/*-------------------------------- Interior Design -------------------------------*/
Route::get('interiorDesign/index', [
    'as' => 'interiorDesign_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\InteriorDesignCategoryController@index'
]);

Route::get('interiorDesign/create', [
    'as' => 'interiorDesign_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\InteriorDesignCategoryController@create'
]);

Route::get('interiorDesign/update', [
    'as' => 'interiorDesign_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\InteriorDesignCategoryController@update'
]);

Route::get('interiorDesign/view', [
    'as' => 'interiorDesign_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\InteriorDesignCategoryController@view'
]);

/*-------------------------------- Land -------------------------------*/
Route::get('land/index', [
    'as' => 'land_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\LandCategoryController@index'
]);

Route::get('land/create', [
    'as' => 'land_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\LandCategoryController@create'
]);

Route::get('land/update', [
    'as' => 'land_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\LandCategoryController@update'
]);

Route::get('land/view', [
    'as' => 'land_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\LandCategoryController@view'
]);

/*-------------------------------- Furniture -------------------------------*/
Route::get('furniture/index', [
    'as' => 'furniture_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\FurnitureCategoryController@index'
]);

Route::get('furniture/create', [
    'as' => 'furniture_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\FurnitureCategoryController@create'
]);

Route::get('furniture/update', [
    'as' => 'furniture_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\FurnitureCategoryController@update'
]);

Route::get('furniture/view', [
    'as' => 'furniture_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\FurnitureCategoryController@view'
]);

/*-------------------------------- Electric -------------------------------*/
Route::get('electric/index', [
    'as' => 'electric_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ElectricCategoryController@index'
]);

Route::get('electric/create', [
    'as' => 'electric_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ElectricCategoryController@create'
]);

Route::get('electric/update', [
    'as' => 'electric_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ElectricCategoryController@update'
]);

Route::get('electric/view', [
    'as' => 'electric_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ElectricCategoryController@view'
]);

/*-------------------------------- Kitchenware -------------------------------*/
Route::get('kitchenware/index', [
    'as' => 'kitchenware_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\KitchenwareCategoryController@index'
]);

Route::get('kitchenware/create', [
    'as' => 'kitchenware_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\KitchenwareCategoryController@create'
]);

Route::get('kitchenware/update', [
    'as' => 'kitchenware_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\HomeCategoryController@update'
]);

Route::get('kitchenware/view', [
    'as' => 'kitchenware_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\KitchenwareCategoryController@view'
]);

/*-------------------------------- Contractor -------------------------------*/
Route::get('contractor/index', [
    'as' => 'contractor_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ContractorCategoryController@index'
]);

Route::get('contractor/create', [
    'as' => 'contractor_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ContractorCategoryController@create'
]);

Route::get('contractor/update', [
    'as' => 'contractor_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ContractorCategoryController@update'
]);

Route::get('contractor/view', [
    'as' => 'contractor_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ContractorCategoryController@view'
]);

/*-------------------------------- Garden -------------------------------*/
Route::get('garden/index', [
    'as' => 'garden_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\GardenCategoryController@index'
]);

Route::get('garden/create', [
    'as' => 'garden_index_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\GardenCategoryController@create'
]);

Route::get('garden/update', [
    'as' => 'garden_index_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\GardenCategoryController@update'
]);

Route::get('garden/view', [
    'as' => 'garden_index_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\GardenCategoryController@view'
]);

/*-------------------------------- OldFurniture -------------------------------*/
Route::get('oldFurniture/index', [
    'as' => 'oldFurniture_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\OldFurnitureCategoryController@index'
]);

Route::get('oldFurniture/create', [
    'as' => 'oldFurniture_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\OldFurnitureCategoryController@create'
]);

Route::get('oldFurniture/update', [
    'as' => 'oldFurniture_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\OldFurnitureCategoryController@update'
]);

Route::get('oldFurniture/view', [
    'as' => 'oldFurniture_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\OldFurnitureCategoryController@view'
]);
/*------------------------------------------------------------------------------*/

/*-------------------------------- Review -------------------------------*/
//Route::get('review/index', [
//    'as' => 'review_index',
//    'before' => 'frontend_auth',
//    'uses' => 'Frontend\ReviewCategoryController@index'
//]);
//
//Route::get('review/create', [
//    'as' => 'review_create',
//    'before' => 'frontend_auth',
//    'uses' => 'Frontend\ReviewCategoryController@create'
//]);
//
//Route::post('review/create', [
//    'as' => 'post_review_create',
//    'before' => 'frontend_auth',
//    'uses' => 'Frontend\ReviewCategoryController@post_create'
//]);
//
//Route::get('review/update', [
//    'as' => 'review_update',
//    'before' => 'frontend_auth',
//    'uses' => 'Frontend\ReviewCategoryController@update'
//]);
//
//Route::get('review/view/{id}', [
//    'as' => 'review_view',
//    'before' => 'frontend_auth',
//    'uses' => 'Frontend\ReviewCategoryController@view'
//]);
//
//Route::get('review/admin_index', [
//    'as' => 'review_admin_index',
//    'before' => 'frontend_auth',
//    'uses' => 'Frontend\ReviewCategoryController@admin_index'
//]);

/*------------------------------------------------------------------------------*/

/*-------------------------------- Idea -------------------------------*/
Route::get('idea/index', [
    'as' => 'idea_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\IdeaCategoryController@index'
]);

Route::get('idea/create', [
    'as' => 'idea_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\IdeaCategoryController@create'
]);

Route::get('idea/update', [
    'as' => 'idea_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\IdeaCategoryController@update'
]);

Route::get('idea/view', [
    'as' => 'idea_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\IdeaCategoryController@view'
]);

Route::get('idea/admin_index', [
    'as' => 'idea_admin_index',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\IdeaCategoryController@admin_index'
]);

/*------------------------------------------------------------------------------*/

/*-------------------------------- Buysellrent -------------------------------*/
Route::get('buysellrent/index', [
    'as' => 'buysellrent_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\BuysellrentCategoryController@index'
]);

Route::get('buysellrent/create', [
    'as' => 'buysellrent_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\BuysellrentCategoryController@create'
]);

Route::get('buysellrent/update', [
    'as' => 'buysellrent_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\BuysellrentCategoryController@update'
]);

Route::get('buysellrent/view', [
    'as' => 'buysellrent_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\BuysellrentCategoryController@view'
]);
/*------------------------------------------------------------------------------*/

/*-------------------------------- Article -------------------------------*/
Route::get('article/index', [
    'as' => 'article_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@index'
]);

Route::get('article/create', [
    'as' => 'article_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@create'
]);

Route::get('article/update', [
    'as' => 'article_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@update'
]);

Route::get('article/view/{id}', [
    'as' => 'article_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@view'
]);

Route::get('article/admin_index', [
    'as' => 'article_admin_index',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@admin_index'
]);

Route::post('article/create', [
    'as' => 'article_post_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@post_create'
]);

/*------------------------------------------------------------------------------*/

/*-------------------------------- Job -------------------------------*/
Route::get('job/index', [
    'as' => 'job_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\JobCategoryController@index'
]);

Route::get('job/create', [
    'as' => 'job_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\JobCategoryController@create'
]);

Route::get('job/update', [
    'as' => 'job_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\JobCategoryController@update'
]);

Route::get('job/view', [
    'as' => 'job_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\JobCategoryController@view'
]);
/*------------------------------------------------------------------------------*/

/*-------------------------------- 2hand -------------------------------*/
Route::get('2hand/index', [
    'as' => '2hand_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\TwohandCategoryController@index'
]);

Route::get('2hand/create', [
    'as' => '2hand_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\TwohandCategoryController@create'
]);

Route::get('2hand/update', [
    'as' => '2hand_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\TwohandCategoryController@update'
]);

Route::get('2hand/view', [
    'as' => '2hand_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\TwohandCategoryController@view'
]);
/*------------------------------------------------------------------------------*/

/*-------------------------------- Public Route -------------------------------*/
Route::any('post/upload', [
    'as' => 'post_upload',
    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@post_upload'
]);
/*------------------------------------------------------------------------------*/

/*-------------------------------- Project -------------------------------*/
Route::get('project/index', [
    'as' => 'project_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@index'
]);

Route::get('project/create', [
    'as' => 'project_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@create'
]);

Route::post('project/create', [
    'as' => 'post_project_create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@post_create'
]);

Route::get('project/update', [
    'as' => 'project_update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@update'
]);

Route::get('project/view/{id}', [
    'as' => 'project_view',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@view'
]);

Route::get('project/getSubArea', [
    'as' => 'project_getSubArea',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@getSubArea'
]);

Route::get('project/getAmphoe', [
    'as' => 'project_getAmphoe',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@getAmphoe'
]);

Route::get('project/getTambon', [
    'as' => 'project_getTambon',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@getTambon'
]);

Route::get('project/view_project/{id}', [
    'as' => 'project_view_project',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@projectViewProject'
]);

Route::any('project/get_project', [
    'as' => 'project_get_project',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@get_project'
]);

Route::any('project/get_shop_project', [
    'as' => 'project_get_shop_project',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@get_shop_project'
]);

Route::any('project/get_latlong', [
    'as' => 'project_get_latlong',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ProjectCategoryController@get_latlong'
]);

/*------------------------------------------------------------------------------*/

/*-------------------------------- Shop -------------------------------*/
Route::get('shop/admin_index', [
    'as' => 'shop_admin_index',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@admin_index'
]);
/*------------------------------------------------------------------------------*/

/*-------------------------------- Tags -------------------------------*/
Route::any('get_tag', [
    'as' => 'get_tag',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\TagController@get_tag'
]);
/*------------------------------------------------------------------------------*/

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

/*-------------------------------- รีวิวทั้งหมด -------------------------------*/
Route::get('review', [
    'as' => 'review',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ReviewController@index'
]);

Route::get('review/create', [
    'as' => 'review/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ReviewController@create'
]);

Route::post('review/store', [
    'as' => 'review/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ReviewController@store'
]);

Route::get('review/edit/{id}', [
    'as' => 'review/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ReviewController@edit'
]);

Route::post('review/update', [
    'as' => 'review/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ReviewController@update'
]);

Route::get('review/{id}', [
    'as' => 'review/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ReviewController@show'
]);

/*-------------------------------- พรีวิวทั้งหมด -------------------------------*/
Route::get('preview', [
    'as' => 'preview',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\PreviewController@index'
]);

Route::get('preview/create', [
    'as' => 'preview/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\PreviewController@create'
]);

Route::post('preview/store', [
    'as' => 'preview/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\PreviewController@store'
]);

Route::get('preview/edit/{id}', [
    'as' => 'preview/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\PreviewController@edit'
]);

Route::post('preview/update', [
    'as' => 'preview/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\PreviewController@update'
]);

Route::get('preview/{id}', [
    'as' => 'preview/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\PreviewController@show'
]);

/*-------------------------------- ลงทะเบียนบ้านใหม่ -------------------------------*/
Route::get('register', [
    'as' => 'register',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\RegisterController@index'
]);

Route::get('register/create', [
    'as' => 'register/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\RegisterController@create'
]);

Route::post('register/store', [
    'as' => 'register/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\RegisterController@store'
]);

Route::get('register/edit/{id}', [
    'as' => 'register/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\RegisterController@edit'
]);

Route::post('register/update', [
    'as' => 'register/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\RegisterController@update'
]);

Route::get('register/{id}', [
    'as' => 'register/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\RegisterController@show'
]);


/*-------------------------------- รับสร้างบ้าน -------------------------------*/
Route::get('construct', [
    'as' => 'construct',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructController@index'
]);

Route::get('construct/create', [
    'as' => 'construct/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructController@create'
]);

Route::post('construct/store', [
    'as' => 'construct/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructController@store'
]);

Route::get('construct/edit/{id}', [
    'as' => 'construct/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructController@edit'
]);

Route::post('construct/update', [
    'as' => 'construct/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructController@update'
]);

Route::get('construct/{id}', [
    'as' => 'construct/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructController@show'
]);

/*-------------------------------- ต่อเติมบ้าน -------------------------------*/
Route::get('enlarge', [
    'as' => 'enlarge',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\EnlargeController@index'
]);

Route::get('enlarge/create', [
    'as' => 'enlarge/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\EnlargeController@create'
]);

Route::post('enlarge/store', [
    'as' => 'enlarge/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\EnlargeController@store'
]);

Route::get('enlarge/edit/{id}', [
    'as' => 'enlarge/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\EnlargeController@edit'
]);

Route::post('enlarge/update', [
    'as' => 'enlarge/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\EnlargeController@update'
]);

Route::get('enlarge/{id}', [
    'as' => 'enlarge/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\EnlargeController@show'
]);

/*-------------------------------- รับเหมาก่อสร้าง -------------------------------*/
Route::get('constructor', [
    'as' => 'constructor',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructorController@index'
]);

Route::get('constructor/create', [
    'as' => 'constructor/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructorController@create'
]);

Route::post('constructor/store', [
    'as' => 'constructor/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructorController@store'
]);

Route::get('constructor/edit/{id}', [
    'as' => 'constructor/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructorController@edit'
]);

Route::post('constructor/update', [
    'as' => 'constructor/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructorController@update'
]);

Route::get('constructor/{id}', [
    'as' => 'constructor/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ConstructorController@show'
]);

/*-------------------------------- ร้านค้าต่างๆ -------------------------------*/
Route::get('shop', [
    'as' => 'shop',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@shop_index'
]);

Route::get('shop/{id}', [
    'as' => 'shop/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@shop_show'
]);

/*-------------------------------- บริการจัดสวน -------------------------------*/
Route::get('garden', [
    'as' => 'garden',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@garden_index'
]);

Route::get('garden/create', [
    'as' => 'garden/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@garden_create'
]);

Route::post('garden/store', [
    'as' => 'garden/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@garden_store'
]);

Route::get('garden/edit/{id}', [
    'as' => 'garden/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@garden_edit'
]);

Route::post('garden/update', [
    'as' => 'garden/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@garden_update'
]);

Route::get('garden/{id}', [
    'as' => 'garden/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@garden_show'
]);

/*-------------------------------- บริการทำความสะอาด -------------------------------*/
Route::get('clean', [
    'as' => 'clean',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@clean_index'
]);

Route::get('clean/create', [
    'as' => 'clean/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@clean_create'
]);

Route::post('clean/store', [
    'as' => 'clean/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@clean_store'
]);

Route::get('clean/edit/{id}', [
    'as' => 'clean/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@clean_edit'
]);

Route::post('clean/update', [
    'as' => 'clean/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@clean_update'
]);

Route::get('clean/{id}', [
    'as' => 'clean/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@clean_show'
]);

/*-------------------------------- ออกแบบภายใน ภายนอก -------------------------------*/
Route::get('interior', [
    'as' => 'interior',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@interior_index'
]);

Route::get('interior/create', [
    'as' => 'interior/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@interior_create'
]);

Route::post('interior/store', [
    'as' => 'interior/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@interior_store'
]);

Route::get('interior/edit/{id}', [
    'as' => 'interior/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@interior_edit'
]);

Route::post('interior/update', [
    'as' => 'interior/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@interior_update'
]);

Route::get('interior/{id}', [
    'as' => 'interior/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@interior_show'
]);

/*-------------------------------- ที่ดิน -------------------------------*/
Route::get('land', [
    'as' => 'land',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@land_index'
]);

Route::get('land/create', [
    'as' => 'land/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@land_create'
]);

Route::post('land/store', [
    'as' => 'land/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@land_store'
]);

Route::get('land/edit/{id}', [
    'as' => 'land/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@land_edit'
]);

Route::post('land/update', [
    'as' => 'land/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@land_update'
]);

Route::get('land/{id}', [
    'as' => 'land/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@land_show'
]);

/*-------------------------------- ที่อยู่อาศัยมือสอง -------------------------------*/
Route::get('secondhand', [
    'as' => 'secondhand',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@secondhand_index'
]);

Route::get('secondhand/create', [
    'as' => 'secondhand/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@secondhand_create'
]);

Route::post('secondhand/store', [
    'as' => 'secondhand/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@secondhand_store'
]);

Route::get('secondhand/edit/{id}', [
    'as' => 'secondhand/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@secondhand_edit'
]);

Route::post('secondhand/update', [
    'as' => 'secondhand/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@secondhand_update'
]);

Route::get('secondhand/{id}', [
    'as' => 'secondhand/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@secondhand_show'
]);

/*-------------------------------- ปล่อยเช่า -------------------------------*/
Route::get('rent', [
    'as' => 'rent',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@rent_index'
]);

Route::get('rent/create', [
    'as' => 'rent/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@rent_create'
]);

Route::post('rent/store', [
    'as' => 'rent/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@rent_store'
]);

Route::get('rent/edit/{id}', [
    'as' => 'rent/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@rent_edit'
]);

Route::post('rent/update', [
    'as' => 'rent/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@rent_update'
]);

Route::get('rent/{id}', [
    'as' => 'rent/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@rent_show'
]);

/*-------------------------------- อพาร์ทเม้นต์ -------------------------------*/
Route::get('apartment', [
    'as' => 'apartment',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@apartment_index'
]);

Route::get('apartment/create', [
    'as' => 'apartment/create',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@apartment_create'
]);

Route::post('apartment/store', [
    'as' => 'apartment/store',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@apartment_store'
]);

Route::get('apartment/edit/{id}', [
    'as' => 'apartment/edit',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@apartment_edit'
]);

Route::post('apartment/update', [
    'as' => 'apartment/update',
    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@apartment_update'
]);

Route::get('apartment/{id}', [
    'as' => 'apartment/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ShopCategoryController@apartment_show'
]);

/*-------------------------------- บทความ / ไอเดีย -------------------------------*/
Route::get('article_idea', [
    'as' => 'article_idea',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@article_idea_index'
]);

Route::get('article/{id}', [
    'as' => 'article/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@article_show'
]);

Route::get('idea/{id}', [
    'as' => 'idea/show',
//    'before' => 'frontend_auth',
    'uses' => 'Frontend\ArticleCategoryController@idea_show'
]);

/*-------------------------------- Click Tags show all related -------------------------------*/
Route::get('tag_list/{id}', [
    'as' => 'tag_list',
//    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@tag_list'
]);

/*-------------------------------- Click Logo shop and show all related -------------------------------*/
Route::get('shop_list/{id}', [
    'as' => 'shop_list',
//    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@shop_list'
]);

/*-------------------------------- Click Logo project and show all related -------------------------------*/
Route::get('project_list/{id}', [
    'as' => 'project_list',
//    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@project_list'
]);

/*-------------------------------- Click Search all in website -------------------------------*/
Route::post('search_list', [
    'as' => 'search_list',
//    'before' => 'frontend_auth',
    'uses' => 'AllofhomeController@search_list'
]);