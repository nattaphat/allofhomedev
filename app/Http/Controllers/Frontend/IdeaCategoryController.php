<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;

class IdeaCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.idea.index');
    }

    public function create()
    {
        return view('web.frontend.idea.create');
    }

    public function update()
    {
        return view('web.frontend.idea.update');
    }

    public function view()
    {
        return view('web.frontend.idea.view');
    }
}