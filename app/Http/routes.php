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
use App\Models\Area;
use App\Models\SubArea;

use App\Models\TestStaff;
use App\Models\TestOrder;
use App\Models\TestPhoto;

include app_path().'/Http/Routes/allofhome.php';
include app_path().'/Http/Routes/allofhome_backend.php';

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

 Route::controllers([
 	'auth' => 'Auth\AuthController',
 	'password' => 'Auth\PasswordController',
 ]);

Route::get('testModel', function(){
//    $m = \App\Models\Promotion::all()->toArray();
//    dd($m);

//    $m = Area::find(1)->subArea()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatHome::all()->toArray();
//    dd($m);

//    $m = \App\Models\Project::find(1)->promotion()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Promotion::find(1)->project()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Project::find(1)->facility()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Facility::find(10)->project()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Project::find(1)->projectRating()->get()->toArray();
//    dd($m);

//    $m = \App\Models\ProjectRating::findOrFail(1)->project()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Bts::findOrFail(11)->btsRoute()->get()->toArray();
//    dd($m);

//    $m = \App\Models\BtsRoute::findOrFail(1)->bts()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Mrt::findOrFail(1)->mrtRoute()->get()->toArray();
//    dd($m);

//    $m = \App\Models\MrtRoute::findOrFail(1)->mrt()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Project::findOrFail(1)->bts()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Project::findOrFail(1)->mrt()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Mrt::findOrFail(4)->project()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Project::findOrFail(1)->airportRailLink()->get()->toArray();
//    dd($m);

//    $m = \App\Models\AirportRailLink::findOrFail(1)->project()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatHome::findOrFail(1)->comment()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Comment::findOrFail(1)->catHome()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Picture::findOrFail(1)->catHome()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatHome::findOrFail(1)->picture()->get()->toArray();
//    dd($m);

//    $m = \App\Models\TagMain::findOrFail(1)->tagSub()->get()->toArray();
//    dd($m);

//    $m = \App\Models\TagSub::findOrFail(1)->tagMain()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Tag::findOrFail(1)->tagSub()->get()->toArray();
//    dd($m);

//    $m = \App\Models\TagSub::findOrFail(3)->catHome()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatHome::findOrFail(1)->tagSub()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatReview::findOrFail(1)->shop()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatReview::findOrFail(1)->comment()->findOrFail(3)->user()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatReview::findOrFail(1)->tagSub()->get()->toArray();
//    dd($m);

//    $m = \App\Models\CatReview::findOrFail(1)->picture()->get()->toArray();
//    dd($m);

//    $m = \App\Models\Branch::findOrFail(1)->tambon()->get()->toArray();
//    dd($m);

//    $staff = new TestStaff;
//    $staff->name = "thapakit";
//    $staff->save();

//    $order = new TestOrder;
//    $order->price = 200;
//    $order->save();

//    $order = TestOrder::find(1);
//    $photo = $order->photos()->create(array('path' => 'foo'));
//    dd($photo);

});
