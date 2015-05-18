<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class LandCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.land.index');
    }

    public function create()
    {
        return view('web.frontend.land.create');
    }

    public function update()
    {
        return view('web.frontend.land.update');
    }

    public function view()
    {
        return view('web.frontend.land.view');
    }
}