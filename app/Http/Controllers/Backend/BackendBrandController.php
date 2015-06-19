<?php namespace App\Http\Controllers\Backend;

use App\Models\Attachment;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Brand;
use Input;
use Redirect;

class BackendBrandController extends Controller {

    public function brand()
    {
        $brands = Brand::orderBy('suggest', 'desc')->orderBy('brand_name', 'asc')->get();
        return view('web.backend.brand')->with('brands', $brands);
    }

    public function brand_new()
    {
        return view('web.backend.brand_new');
    }

    public function brand_store()
    {
        $input = Input::all();

//        dd($input);

        try
        {
            $brand = new Brand();
            $brand->user_id = \Auth::getUser()->id;
            $brand->brand_name = $input['brand_name'];
            $brand->type = "brand";

            if(Input::has('filename') && $input['filename'] != "")
            {
                $attachment = new Attachment();
                $attachment->filename = $input['filename'];
                $attachment->filetype = $input['filetype'];
                $attachment->filesize = $input['filesize'];
                $attachment->path = $input['filepath'];
                $attachment->save();
                $brand->attachment_id = $attachment->id;
            }

            $brand->telephone = $input['telephone'];
            $brand->email = $input['email'];
            $brand->facebook = $input['facebook'];
            $brand->line = $input['line'];
            $brand->suggest = $input['suggest'][0];
            $brand->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_brand')
                ->with('flash_message', 'บันทึกข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_brand')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function brand_edit($id)
    {
        $brand = Brand::find($id);
        $attachment = null;

        if($brand->attachment_id != null)
        {
            $attachment = Attachment::find($brand->attachment_id);
        }

        return view('web.backend.brand_edit')->with("brand",$brand)
            ->with('attachment', $attachment);
    }

    public function brand_update()
    {
        $input = Input::all();

//        dd($input);

        try
        {
            $brand = Brand::find($input['id']);
            $brand->user_id = \Auth::getUser()->id;
            $brand->brand_name = $input['brand_name'];
            $brand->type = "brand";

            if($input['filename'] != "")
            {
                if($brand->attachment_id != null)
                {
                    $attachment = Attachment::find($brand->attachment_id);
                    $attachment->filename = $input['filename'];
                    $attachment->filetype = $input['filetype'];
                    $attachment->filesize = $input['filesize'];
                    $attachment->path = $input['filepath'];
                    $attachment->save();
                }
                else
                {
                    $attachment = new Attachment();
                    $attachment->filename = $input['filename'];
                    $attachment->filetype = $input['filetype'];
                    $attachment->filesize = $input['filesize'];
                    $attachment->path = $input['filepath'];
                    $attachment->save();
                    $brand->attachment_id = $attachment->id;
                }
            }
            else
            {
                $brand->attachment_id = null;
            }

            $brand->telephone = $input['telephone'];
            $brand->email = $input['email'];
            $brand->facebook = $input['facebook'];
            $brand->line = $input['line'];
            $brand->suggest = $input['suggest'][0];
            $brand->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_brand')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_brand')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }
}