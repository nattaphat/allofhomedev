<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendFacilityController extends Controller {

    public function facility()
    {
        return view('web.backend.facility');
    }
}