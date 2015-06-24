<?php namespace App\Http\Controllers\Backend;

use App\Models\AllFunction;
use App\Models\CatReview;
use App\Models\Picture;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class BackendReviewController extends Controller {

    public function review()
    {
        $reviews = CatReview::orderBy('suggest', 'desc')->orderBy('created_at', 'desc')->get();
        return view('web.backend.review')->with('reviews', $reviews);
    }

    public function review_new()
    {
        return view('web.backend.review_new');
    }

    public function review_store()
    {
        $input = Input::all();
//        dd($input);

        $cat = new CatReview();
        $cat->user_id = $input['user_id'];
        $cat->title = $input['title'];
        $cat->subtitle = $input['subtitle'];

        if(Input::has('other_detail'))
            $cat->other_detail = $input['other_detail'];

        if(Input::has('video_url'))
            $cat->video_url = $input['video_url'];

        if(Input::has('suggest'))
            $cat->suggest = true;
        else
            $cat->suggest = false;

        if(Input::has('visible'))
            $cat->visible = $input['visible'][0];

        $cat->num_view = 0;
        $cat->num_shared = 0;
        $cat->num_comment = 0;

        if(Input::has('rating_score'))
            $cat->rating_score = $input['rating_score'];

        if(Input::has('cat_home_id'))
            $cat->cat_home_id = $input['cat_home_id'];

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

                $thumbnail = AllFunction::createThumbnailFix($filepath[$j], 106, 93);
                $pic->thumbnail = $thumbnail;

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

        return Redirect::route('backend_review')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }
}