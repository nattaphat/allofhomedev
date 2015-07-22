<?php namespace App\Http\Controllers\Backend;

use App\Models\AllFunction;
use App\Models\Attachment;
use App\Models\CatArticle;
use App\Models\Picture;
use App\Models\Tag;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Brand;
use DB;
use Input;
use Intervention\Image\Facades\Image;
use Redirect;
use Request;

class BackendArticleController extends Controller {

    public function article()
    {
        $articles = CatArticle::orderBy('suggest', 'desc')->orderBy('created_at', 'desc')->get();
        return view('web.backend.article')->with('articles', $articles);
    }

    public function article_new()
    {
        return view('web.backend.article_new');
    }

    public function article_store()
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
            $cat->other_detail = str_replace('src="../files/', 'src="'.asset("files").'/', $input['other_detail']);

        if(Input::has('video_url'))
            $cat->video_url = $input['video_url'];

        if(Input::has('suggest'))
            $cat->suggest = true;
        else
            $cat->suggest = false;

        $cat->visible = true;

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

        return Redirect::route('backend_article')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function article_edit($id)
    {
        $catArticle = CatArticle::find($id);
        $tag = $catArticle->tag()->get();
        $pic = $catArticle->picture()->get();

//        dd($catArticle);

        return view('web.backend.article_edit')
            ->with('catArticle', $catArticle)
            ->with('tag', $tag)
            ->with('pic',$pic);

    }

    public function article_update()
    {
        $input = Input::all();
//        dd($input);

        $cat = CatArticle::find($input['id']);

        $cat->user_id = $input['user_id'];
        $cat->title = $input['title'];
        $cat->subtitle = $input['subtitle'];

        if(Input::has('for_cat'))
            $cat->for_cat = serialize($input['for_cat']);

        if(Input::has('other_detail'))
            $cat->other_detail = str_replace('src="../../files/', 'src="'.asset("files").'/', $input['other_detail']);

        if(Input::has('video_url'))
            $cat->video_url = $input['video_url'];

        if(Input::has('suggest'))
            $cat->suggest = true;
        else
            $cat->suggest = false;

        $cat->update();

//        dd($cat);

        $cat->picture()->delete();

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

        $cat->tag()->delete();

        if(Input::has('tags'))
        {
            foreach($input['tags'] as $key=>$value)
            {
                $tag = new Tag();
                $tag->tag_sub_id = $value;
                $cat->tag()->save($tag);
            }
        }

        return Redirect::route('backend_article')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

}