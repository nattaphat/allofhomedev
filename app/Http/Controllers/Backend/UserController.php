<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller {

    public function index()
    {
        $user = new User();
        return $user::find(1)->get();
    }
}