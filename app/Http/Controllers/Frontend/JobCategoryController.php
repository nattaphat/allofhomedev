<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;

class JobCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.job.index');
    }

    public function create()
    {
        return view('web.frontend.job.create');
    }

    public function update()
    {
        return view('web.frontend.job.update');
    }

    public function view()
    {
        return view('web.frontend.job.view');
    }
}