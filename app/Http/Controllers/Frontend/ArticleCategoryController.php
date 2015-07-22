<?php namespace App\Http\Controllers\Frontend;

use App\Models\CatArticle;
use App\Models\CatIdea;
use App\Models\Picture;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use DB;
use Input;

class ArticleCategoryController extends Controller {

    public function index()
    {
//        $cat = CatArticle::where('visible','=','1')
//            ->orderBy('suggest', 'desc')
//            ->orderBy('created_at','desc')
//            ->paginate(10);
//
//        return view('web.frontend.article.index')
//            ->with('cat',$cat);

        $catArticle = null;
        try{
            $catArticle = DB::table('cat_article as ch')
                ->join(DB::raw('
                    (
                        select distinct pictureable_id, pictureable_type from picture
                        where pictureable_type = \'App\\Models\\CatArticle\'
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

        return view('web.frontend.article_index')
            ->with('catArticle', $catArticle);
    }

    public function admin_index()
    {
        $cat = CatArticle::orderBy('suggest', 'desc')
            ->orderBy('visible', 'desc')
            ->orderBy('created_at','desc')->get();

        return view('web.frontend.article.admin_index')
            ->with('cat',$cat);
    }

    public function create()
    {
        return view('web.frontend.article.create');
    }

    public function post_create()
    {
        $input = Input::all();
//        dd($input);

        $cat = new CatArticle();
        $cat->user_id = $input['user_id'];
        $cat->title = $input['title'];
        $cat->subtitle = $input['subtitle'];

        if(Input::has('for_cat'))
            $cat->for_cat = serialize($input['for_cat']);

        if(Input::has('other_detail'))
            $cat->other_detail = $input['other_detail'];

        if(Input::has('video_url'))
            $cat->video_url = $input['video_url'];

        if(Input::has('suggest'))
            $cat->suggest = true;
        else
            $cat->suggest = false;

        $cat->visible = $input['visible'][0];

        $cat->num_view = 0;
        $cat->num_shared = 0;
        $cat->num_comment = 0;
        $cat->save();

        if(Input::has('pics_filename')) {
            $filename = $input['pics_filename'];
            $filetype = $input['pics_filetype'];
            $filesize = $input['pics_filesize'];
            $filepath = $input['pics_filepath'];
            $description = $input['pics_description'];

            $count_pic = count($filename);
            for($j=0; $j<$count_pic; $j++)
            {
                $pic = new Picture();
                $pic->file_name = $filename[$j];
                $pic->file_path = $filepath[$j];
                $pic->file_size = $filesize[$j];
                $pic->file_type = $filetype[$j];
                $pic->description = $description[$j];

                $cat->picture()->save($pic);
            }
        }

        if(Input::has('tags'))
        {
            foreach($input['tags'] as $key=>$value)
            {
                $tag = new Tag();
                $tag->tag_sub_id = $value;
                $cat->tag()->save($tag);
            }
        }

        return redirect('article/admin_index')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function view($id)
    {
        $cat = CatArticle::find($id);

        return view('web.frontend.article.view')
            ->with('cat',$cat);
    }

    public function article_idea_index()
    {
//        $catArticle = null;
//        try{
//            $catArticle = DB::table('cat_article as ch')
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatArticle\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
//        }
//
//        $catIdea = null;
//        try{
//            $catIdea = DB::table('cat_idea as ch')
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatIdea\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
//        }
//
//        return view('web.frontend.article_idea_index')
//            ->with('catArticle', $catArticle)
//            ->with('catIdea', $catIdea);

        // ############## Ariticle ################ //
        // #### VIP
        $catArticleVip = null;
        try{
            $catArticleVip = DB::table('cat_article as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_article
                      where visible = true
                      and suggest = true
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catArticleVip);

        // #### General (Not include vip)
        $catArticle = null;
        if($catArticleVip != null && count($catArticleVip) > 0)
        {
            foreach($catArticleVip as $item)
            {
                $vip[] = $item->id;
            }

            $catArticle = CatArticle::where('visible','=','true')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }
        else
        {
            $catArticle = CatArticle::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

//        dd($catArticle);


        // ############## Idea ################ //
        // #### VIP
        $catIdeaVip = null;
        try{
            $catIdeaVip = DB::table('cat_idea as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_idea
                      where visible = true
                      and suggest = true
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catIdeaVip);

        // #### General (Not include vip)
        $catIdea = null;
        if($catIdeaVip != null && count($catIdeaVip) > 0)
        {
            foreach($catIdeaVip as $item)
            {
                $vip[] = $item->id;
            }

            $catIdea = CatIdea::where('visible','=','true')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }
        else
        {
            $catIdea = CatIdea::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

//        dd($catArticle);

        return view('web.frontend.article_idea_index')
            ->with('catArticleVip', $catArticleVip)
            ->with('catArticle', $catArticle)
            ->with('catIdeaVip', $catIdeaVip)
            ->with('catIdea', $catIdea);

    }

    public function article_show($id)
    {
        $catArticle = CatArticle::find($id);

        $tag = $catArticle->tag()->get();
        $pic = $catArticle->picture()->get();

        return view('web.frontend.article_view')
            ->with('catArticle', $catArticle)
            ->with('tag', $tag)
            ->with('pic',$pic);
    }

    public function idea_show($id)
    {
        $catIdea = CatIdea::find($id);

//        dd($catIdea);

        $tag = $catIdea->tag()->get();
        $pic = $catIdea->picture()->get();

        return view('web.frontend.idea_view')
            ->with('catIdea', $catIdea)
            ->with('tag', $tag)
            ->with('pic',$pic);
    }

}