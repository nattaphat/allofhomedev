<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;

class BackendDashboardController extends Controller {

    public function index()
    {
        return view('web.backend.dashboard');
    }
}