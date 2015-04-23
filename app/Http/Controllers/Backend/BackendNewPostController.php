<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendNewPostController extends Controller {

    public function newPost()
    {
        return view('web.backend.newPost');
    }
}