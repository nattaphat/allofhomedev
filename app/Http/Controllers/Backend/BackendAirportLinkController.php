<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

class BackendAirportLinkController extends Controller {

    public function airportLink()
    {
        return view('web.backend.airportLink');
    }
}