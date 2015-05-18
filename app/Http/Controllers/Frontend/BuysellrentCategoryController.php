<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;

class BuysellrentCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.buysellrent.index');
    }

    public function create()
    {
        return view('web.frontend.buysellrent.create');
    }

    public function update()
    {
        return view('web.frontend.buysellrent.update');
    }

    public function view()
    {
        return view('web.frontend.buysellrent.view');
    }
}