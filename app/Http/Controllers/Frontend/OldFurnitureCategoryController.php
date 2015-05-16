<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class OldFurnitureCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.oldFurniture.index');
    }

    public function create()
    {
        return view('web.frontend.oldFurniture.create');
    }

    public function update()
    {
        return view('web.frontend.oldFurniture.update');
    }

    public function view()
    {
        return view('web.frontend.oldFurniture.view');
    }
}