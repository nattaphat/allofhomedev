<?php namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;

class BackendBannerController extends Controller {

    //// ####### BannerA ######## /////
    public function bannerA()
    {
        $banner = Banner::where('type','=','A')
            ->orderBy('id')
            ->get();

        return view('web.backend.bannerA')
            ->with('banner', $banner);
    }

    public function bannerA_new()
    {
        return view('web.backend.bannerA_new');
    }

    public function bannerA_store()
    {
        $input = Input::all();

        $banner = new Banner();
        $banner->banner_name = $input['banner_name'];
        $banner->url = $input['url'];
        $banner->remark = $input['remark'];
        $banner->visible = $input['visible'][0];

        if(Input::has('filename'))
            $banner->file_name = $input['filename'];
        if(Input::has('filetype'))
            $banner->file_type = $input['filetype'];
        if(Input::has('filesize'))
            $banner->file_size = $input['filesize'];
        if(Input::has('filepath'))
            $banner->file_path = $input['filepath'];

        $banner->user_id = $input['user_id'];
        $banner->type = "A";

        $banner->save();

        return Redirect::route('backend_bannerA')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function bannerA_edit($id)
    {
        $banner = Banner::find($id);
        return view('web.backend.bannerA_edit')
            ->with('banner', $banner);
    }

    public function bannerA_update()
    {
        $input = Input::all();

        $banner = Banner::find($input['id']);
        $banner->banner_name = $input['banner_name'];
        $banner->url = $input['url'];
        $banner->remark = $input['remark'];
        $banner->visible = $input['visible'][0];

        if(Input::has('filename'))
            $banner->file_name = $input['filename'];
        else
            $banner->file_name = "";

        if(Input::has('filetype'))
            $banner->file_type = $input['filetype'];
        else
            $banner->file_type = "";

        if(Input::has('filesize'))
            $banner->file_size = $input['filesize'];
        else
            $banner->file_size = "";

        if(Input::has('filepath'))
            $banner->file_path = $input['filepath'];
        else
            $banner->file_path = "";

        $banner->user_id = $input['user_id'];

        $banner->update();

        return Redirect::route('backend_bannerA')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    //// ####### BannerB ######## /////
    public function bannerB()
    {
        $banner = Banner::where('type','=','B')
            ->orderBy('id')
            ->get();

        return view('web.backend.bannerB')
            ->with('banner', $banner);
    }

    public function bannerB_new()
    {
        return view('web.backend.bannerB_new');
    }

    public function bannerB_store()
    {
        $input = Input::all();

        $banner = new Banner();
        $banner->banner_name = $input['banner_name'];
        $banner->url = $input['url'];
        $banner->remark = $input['remark'];
        $banner->visible = $input['visible'][0];

        if(Input::has('filename'))
            $banner->file_name = $input['filename'];
        if(Input::has('filetype'))
            $banner->file_type = $input['filetype'];
        if(Input::has('filesize'))
            $banner->file_size = $input['filesize'];
        if(Input::has('filepath'))
            $banner->file_path = $input['filepath'];

        $banner->user_id = $input['user_id'];
        $banner->type = "B";

        $banner->save();

        return Redirect::route('backend_bannerB')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function bannerB_edit($id)
    {
        $banner = Banner::find($id);
        return view('web.backend.bannerB_edit')
            ->with('banner', $banner);
    }

    public function bannerB_update()
    {
        $input = Input::all();

        $banner = Banner::find($input['id']);
        $banner->banner_name = $input['banner_name'];
        $banner->url = $input['url'];
        $banner->remark = $input['remark'];
        $banner->visible = $input['visible'][0];

        if(Input::has('filename'))
            $banner->file_name = $input['filename'];
        else
            $banner->file_name = "";

        if(Input::has('filetype'))
            $banner->file_type = $input['filetype'];
        else
            $banner->file_type = "";

        if(Input::has('filesize'))
            $banner->file_size = $input['filesize'];
        else
            $banner->file_size = "";

        if(Input::has('filepath'))
            $banner->file_path = $input['filepath'];
        else
            $banner->file_path = "";

        $banner->user_id = $input['user_id'];

        $banner->update();

        return Redirect::route('backend_bannerB')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

}