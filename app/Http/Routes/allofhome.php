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
Route::get('/', [
	'as' => 'index',
	'uses' => 'AllofhomeController@index'
]);

Route::get('login', [
	'as' => 'login',
	'uses' => 'AllofhomeController@login'
]);


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

Route::get('twlogin', [
	'as' => 'twlogin',
	'uses' => 'SocialLoginController@TWlogin'
]);

Route::get('signup', [
	'as' => 'signup',
	'uses' => 'AllofhomeController@signup'
]);

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