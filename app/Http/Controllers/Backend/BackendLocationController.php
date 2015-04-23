<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendLocationController extends Controller {

    public function location()
    {
        return view('web.backend.location');
    }
}