<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class InteriorDesignCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.interiorDesign.index');
    }

    public function create()
    {
        return view('web.frontend.interiorDesign.create');
    }

    public function update()
    {
        return view('web.frontend.interiorDesign.update');
    }

    public function view()
    {
        return view('web.frontend.interiorDesign.view');
    }
}