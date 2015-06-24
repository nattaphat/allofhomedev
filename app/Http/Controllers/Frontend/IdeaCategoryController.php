<?php namespace App\Http\Controllers\Frontend;

use App\Models\TagSub;
use Config;
use App\Http\Controllers\Controller;
use DB;
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
//        return view('web.frontend.idea.index');

        $catIdea = null;
        try{
            $catIdea = DB::table('cat_idea as ch')
                ->join(DB::raw('
                    (
                        select distinct pictureable_id, pictureable_type from picture
                        where pictureable_type = \'App\\Models\\CatIdea\'
                    ) pic
                '), function($join){
                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
                })
                ->orderBy('ch.created_at', 'desc')
                ->paginate(15);
        }
        catch(\Exception $e)
        {

        }

        return view('web.frontend.idea_index')
            ->with('catIdea', $catIdea);
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