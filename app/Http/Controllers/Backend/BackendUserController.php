<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendUserController extends Controller {

    public function index()
    {
        $users = User::all();
        return view('web.backend.user')->with('users', $users);
    }
}