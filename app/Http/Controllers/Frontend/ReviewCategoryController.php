<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;
use Input;

class ReviewCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.review.index');
    }

    public function create()
    {
        return view('web.frontend.review.create');
    }

    public function post_create()
    {
        $input = Input::all();
        dd($input);
    }

    public function update()
    {
        return view('web.frontend.review.update');
    }

    public function view($id = 0)
    {
        return view('web.frontend.review.view');
    }
}