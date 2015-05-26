<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Input;
use DB;

use App\Models\TagSub;
use App\Models\TagMain;

class TagController extends Controller {

    public function get_tag()
    {
        $search_char = Request::get('term');

        $tag = DB::table('tag_sub')
            ->join('tag_main', function ($join){
                $join->on( 'tag_sub.tag_main_id', '=', 'tag_main.id');
            })
            ->select(DB::raw('tag_sub.id,tag_sub.tag_sub_name,
                tag_main.tag_main_name'))
            ->whereRaw('tag_sub.tag_sub_name like \'%'.$search_char.'%\'')
            ->orderBy('tag_main.id')
            ->orderBy('tag_sub.tag_sub_name')
            ->get();

        return json_encode($tag);
    }
}