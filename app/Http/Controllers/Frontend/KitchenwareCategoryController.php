<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class KitchenwareCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.kitchenware.index');
    }

    public function create()
    {
        return view('web.frontend.kitchenware.create');
    }

    public function update()
    {
        return view('web.frontend.kitchenware.update');
    }

    public function view()
    {
        return view('web.frontend.kitchenware.view');
    }
}