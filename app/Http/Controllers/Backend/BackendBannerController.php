<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendBannerController extends Controller {

    public function banner()
    {
        return view('web.backend.banner');
    }
}