<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;


class ContractorCategoryController extends Controller {

    public function index()
    {
        return view('web.frontend.contractor.index');
    }

    public function create()
    {
        return view('web.frontend.contractor.create');
    }

    public function update()
    {
        return view('web.frontend.contractor.update');
    }

    public function view()
    {
        return view('web.frontend.contractor.view');
    }
}