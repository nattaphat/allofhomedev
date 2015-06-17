<?php namespace App\Http\Controllers\Backend;

use App\Models\TagMain;
use App\Models\TagSub;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;
use Request;

class BackendTagController extends Controller {

    public function tag()
    {
        $tags = TagMain::orderBy('tag_main_name')->get();
//        dd($tagmain);

        return view('web.backend.tag')->with('tags',$tags);
    }

    public function tag_new()
    {
        return view('web.backend.tag_new');
    }

    public function tag_store()
    {
        $input = Input::all();

        $tag = new TagMain();
        $tag->tag_main_name = $input['tag_main_name'];
        $tag->save();

        return Redirect::route('backend_tag')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function tag_edit($id)
    {
        $tag = TagMain::find($id);
        return view('web.backend.tag_edit')->with("tag",$tag);
    }

    public function tag_update()
    {
        $input = Input::all();

        $tag = TagMain::find($input['id']);
        $tag->tag_main_name = $input['tag_main_name'];
        $tag->save();

        $tags = TagMain::orderBy('tag_main_name')->get();

        return Redirect::route('backend_tag')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }

    public function subTag()
    {
        $tagSubs = TagSub::orderBy('tag_main_id')->orderBy('tag_sub_name')->get();
        return view('web.backend.subTag')->with('tagSubs',$tagSubs);
    }

    public function subTag_new()
    {
        $tagMain = ['' => '-- กรุณาเลือก --'] + TagMain::lists('tag_main_name', 'id');

        return view('web.backend.subTag_new')->with('tagMain', $tagMain);
    }

    public function subTag_store()
    {
        $input = Input::all();

        $tagSub = new TagSub();
        $tagSub->tag_main_id = $input['tag_main_id'];
        $tagSub->tag_sub_name = $input['tag_sub_name'];
        $tagSub->save();

        return Redirect::route('backend_subTag')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function subTag_edit($id)
    {
        $tagMain = ['' => '-- กรุณาเลือก --'] + TagMain::lists('tag_main_name', 'id');
        $tagSub = TagSub::find($id);
        return view('web.backend.subTag_edit')->with("tagMain",$tagMain)
            ->with('tagSub',$tagSub);
    }

    public function subTag_update()
    {
        $input = Input::all();

//        dd($input);

        $tagSub = TagSub::find($input['id']);
        $tagSub->tag_main_id = $input['tag_main_id'];
        $tagSub->tag_sub_name = $input['tag_sub_name'];
        $tagSub->save();

        return Redirect::route('backend_subTag')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }

}