<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendCategoryController extends Controller {

    public function category()
    {
        return view('web.backend.category');
    }
}