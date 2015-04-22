<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendMRTController extends Controller {

    public function mrt()
    {
        return view('web.backend.mrt');
    }
}