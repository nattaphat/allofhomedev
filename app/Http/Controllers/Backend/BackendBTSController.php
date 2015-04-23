<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendBTSController extends Controller {

    public function bts()
    {
        return view('web.backend.bts');
    }
}