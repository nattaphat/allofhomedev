<?php namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;

class BackendBannerController extends Controller {

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







}