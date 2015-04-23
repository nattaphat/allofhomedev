<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendNewsController extends Controller {

    public function news()
    {
        return view('web.backend.news');
    }
}