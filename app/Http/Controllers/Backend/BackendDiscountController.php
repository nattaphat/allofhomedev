<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendDiscountController extends Controller {

    public function discount()
    {
        return view('web.backend.discount');
    }
}