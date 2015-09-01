<?php namespace App\Http\Controllers\Frontend;

use App\Models\Branch;
use App\Models\CatReview;
use App\Models\Picture;
use App\Models\Project;
use App\Models\Shop;
use App\Models\Tag;
use Config;
use App\Http\Controllers\Controller;
use DB;
use Request;
use Validator;
use Gmaps;
use Input;
use Redirect;

class ReviewCategoryController extends Controller {

    public function index()
    {
//        $catReview = CatReview::orderBy('created_at', 'desc')
//            ->paginate(15);
//
//        return view('web.frontend.review.index')
//            ->with('catReview', $catReview);

        $catReview = null;
        try{
            $catReview = DB::table('cat_review as ch')
                ->join(DB::raw('
                    (
                        select distinct pictureable_id, pictureable_type from picture
                        where pictureable_type = \'App\\Models\\CatReview\'
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

        return view('web.frontend.review_index')
            ->with('catReview', $catReview);
    }

    public function create()
    {
        return view('web.frontend.review.create');
    }

    public function post_create()
    {
        $input = Input::all();
//        dd($input);

        $rules = [
            'user_id' => 'required',
            'project_id' => 'required',
            'type' => 'required',
            'title' => 'required|max:255',
            'subtitle' => 'required|max:500',
            'other_detail' => 'required',
            'pics' => 'required'
        ];

        $messages = [
            'required' => 'This field is required.'
        ];

        $validator = Validator::make(
            $input,
            $rules,
            $messages
        );

        if ($validator->fails())
        {
            return redirect('review/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else{
//            dd($input);

            $catReview = new CatReview();
            $catReview->title = $input['title'];
            $catReview->subtitle = $input['subtitle'];
            $catReview->user_id = $input['user_id'];
            $catReview->other_detail = $input['other_detail'];
            $catReview->video_url = $input['video_url'];

            $catReview->shop_rating_avg = $input['shop_avg'];
            $catReview->project_rating1 = $input['project_star_1'];
            $catReview->project_rating2 = $input['project_star_2'];
            $catReview->project_rating3 = $input['project_star_3'];
            $catReview->project_rating4 = $input['project_star_4'];
            $catReview->project_rating5 = $input['project_star_5'];
            $catReview->project_rating6 = $input['project_star_6'];
            $catReview->project_rating7 = $input['project_star_7'];
            $catReview->project_rating8 = $input['project_star_8'];
            $catReview->project_rating9 = $input['project_star_9'];
            $catReview->project_rating_avg = $input['project_avg'];

            $catReview->reviewable_id = $input['project_id'];

            if($input['type'] == "project")
            {
                $catReview->reviewable_type = 'App\Models\Project';
            }
            else if($input['type'] == "shop")
            {
                $catReview->reviewable_type = 'App\Models\Shop';
            }
            else
            {
                $catReview->reviewable_type = 'App\Models\Branch';
            }

            $catReview->save();

            if(Input::has('tags'))
            {
                foreach($input['tags'] as $key=>$value)
                {
                    $tag = new Tag();
                    $tag->tag_sub_id = $value;
                    $catReview->tag()->save($tag);
                }
            }

            if(Input::has('pics'))
            {
                $files = explode("###", $input['pics']);
                foreach($files as $file)
                {
                    if($file != "")
                    {
                        $f = explode("@@@", $file);
                        $pic = new Picture();
                        $pic->file_name = $f[0];
                        $pic->file_type = $f[1];
                        $pic->file_size = $f[2];
                        $pic->file_path = $f[3];

                        $catReview->picture()->save($pic);
                    }
                }
            }

            return Redirect::to('review/view/'.$catReview->id)
                ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
                ->with('flash_type', 'alert-success');
        }
    }

    public function update()
    {
        return view('web.frontend.review.update');
    }

    public function view($id)
    {
        $catReview = CatReview::find($id);
        $tag = $catReview->tag()->orderBy('id','asc')->get();
        $pic = $catReview->picture()->orderBy('id','asc')->get();
        $project_name = "";
        $type = "";

        $type = $catReview->reviewable_type;
        if ($type == "App\\Models\\Project")
        {
            $project = Project::find($catReview->reviewable_id);
            $project_name = $project->project_name;
            $type = "project";
        } else if ($type == "App\\Models\\Shop")
        {
            $shop = Shop::find($catReview->reviewable_id);
            $type = "shop";
        } else
        {
            $branch = Branch::find($catReview->reviewable_id);
            $type = "branch";
        }

        return view('web.frontend.review.view')
            ->with('catReview', $catReview)
            ->with('tag', $tag)
            ->with('pic', $pic)
            ->with('project_name', $project_name)
            ->with('type', $type);
    }

    public function admin_index()
    {
        return view('web.frontend.review.admin_index');
    }

}