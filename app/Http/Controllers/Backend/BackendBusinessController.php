<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendBusinessController extends Controller {

    public function businessShop()
    {
        $users = User::all();
        return view('web.backend.businessShop');
    }
}