<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function index()
    {
        return view('web.backend.userindex');
    }

}