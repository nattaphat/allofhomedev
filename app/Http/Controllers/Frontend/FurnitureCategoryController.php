<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class FurnitureCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.furniture.index');
    }

    public function create()
    {
        return view('web.frontend.furniture.create');
    }

    public function update()
    {
        return view('web.frontend.furniture.update');
    }

    public function view()
    {
        return view('web.frontend.furniture.view');
    }
}