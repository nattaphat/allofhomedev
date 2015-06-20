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

Form::macro('dropzoneRegion', function($id) {
    return '
    <div class="form-group">
        <label class="col-md-1 control-label text-right"></label>
        <div class="col-md-10">
            <div id="dZUpload'.$id.'" class="dropzone uploadify"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="table table-striped" class="files" id="previews'.$id.'" style="padding-top: 20px;">
                <div id="template'.$id.'" class="file-row" style="margin-top: 20px;">
                    <div class="row well active">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <img data-dz-thumbnail />
                                </div>
                                <div class="col-md-9">
                                    <textarea name="pics_description'.$id.'[]" rows="5" style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" data-dz-remove>
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    ';
});
