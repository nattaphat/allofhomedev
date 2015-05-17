<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;

class TwohandCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.2hand.index');
    }

    public function create()
    {
        return view('web.frontend.2hand.create');
    }

    public function update()
    {
        return view('web.frontend.2hand.update');
    }

    public function view()
    {
        return view('web.frontend.2hand.view');
    }
}