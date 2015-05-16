<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class CondoCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.condo.index');
    }

    public function create()
    {
        return view('web.frontend.condo.create');
    }

    public function update()
    {
        return view('web.frontend.condo.update');
    }

    public function view()
    {
        return view('web.frontend.condo.view');
    }
}