<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class GardenCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.garden.index');
    }

    public function create()
    {
        return view('web.frontend.garden.create');
    }

    public function update()
    {
        return view('web.frontend.garden.update');
    }

    public function view()
    {
        return view('web.frontend.garden.view');
    }
}