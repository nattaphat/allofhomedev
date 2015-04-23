<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendTagController extends Controller {

    public function tag()
    {
        return view('web.backend.tag');
    }

    public function subTag()
    {
        return view('web.backend.subTag');
    }
}