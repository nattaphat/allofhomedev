<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class HomeCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.home.index');
    }

    public function create()
    {
        return view('web.frontend.home.create');
    }
}