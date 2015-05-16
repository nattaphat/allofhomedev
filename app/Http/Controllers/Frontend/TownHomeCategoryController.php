<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class TownHomeCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.townhome.index');
    }

    public function create()
    {
        return view('web.frontend.townhome.create');
    }

    public function update()
    {
        return view('web.frontend.townhome.update');
    }

    public function view()
    {
        return view('web.frontend.townhome.view');
    }
}