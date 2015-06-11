<?php namespace App\Http\Controllers\Frontend;

use App\Models\TagSub;
use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;

class IdeaCategoryController extends Controller {

    private $subTagObj;

    public function __construct()
    {
        $this->subTagObj = new TagSub();
    }
    public function index()
    {
        return view('web.frontend.idea.index');
    }

    public function create()
    {
//        $tag = $this->subTagObj->tagAll();
        return view('web.frontend.idea.create');
//                ->with('tag',$tag);
    }

    public function update()
    {
        return view('web.frontend.idea.update');
    }

    public function view()
    {
        return view('web.frontend.idea.view');
    }

    public function admin_index()
    {
        return view('web.frontend.idea.admin_index');
    }

}