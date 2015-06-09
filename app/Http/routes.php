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

    /* Insert Idea */
    $catIdea = \App\Models\CatIdea::create([
        'user_id' => 1,
        'title' => 'หัวข้อไอเดีย',
        'subtitle' => 'เนื้อหาย่อย',
        'other_detail' => 'รายละเอียด',
        'video_url' => null
    ]);

      /* หา Cat Idea จาก ID */
    $catIdea = \App\Models\CatIdea::find($catIdea->id);

      /*  Insert 3 Comment */
    $comment = new \App\Models\Comment();
    $comment->comment = "คอมเม้นดูนะ";
    $comment->user_id = 1;
    $catIdea->comment()->save($comment);

    $comment = new \App\Models\Comment();
    $comment->comment = "อย่าลองคอมเม้นต์เลย";
    $comment->user_id = 1;
    $catIdea->comment()->save($comment);

    $comment = new \App\Models\Comment();
    $comment->comment = "ทำไมล่ะ มันไม่ดีหรอ";
    $comment->user_id = 1;
    $catIdea->comment()->save($comment);

    /* แสดงค่า Comment */
    $comments = $catIdea->comment()->get()->toArray();
    dd($comments);

});

Route::get('testPage', function(){
    return view('test');
});
