<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class ElectricCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.electric.index');
    }

    public function create()
    {
        return view('web.frontend.electric.create');
    }

    public function update()
    {
        return view('web.frontend.electric.update');
    }

    public function view()
    {
        return view('web.frontend.electric.view');
    }
}