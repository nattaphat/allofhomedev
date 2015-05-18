<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;

class ArticleCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.article.index');
    }

    public function create()
    {
        return view('web.frontend.article.create');
    }

    public function update()
    {
        return view('web.frontend.article.update');
    }

    public function view()
    {
        return view('web.frontend.article.view');
    }
}