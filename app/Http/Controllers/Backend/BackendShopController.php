<?php namespace App\Http\Controllers\Backend;

use App\Models\AllFunction;
use App\Models\Attachment;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use DB;
use Input;
use Redirect;
use Request;

class BackendShopController extends Controller {

    public function shop()
    {
        $shops = Brand::where('type','=','shop')
            ->orderBy('suggest', 'desc')->orderBy('brand_name', 'asc')->get();
        return view('web.backend.shop')->with('shops', $shops);
    }

    public function shop_new()
    {
        return view('web.backend.shop_new');
    }

    public function shop_store()
    {
        $input = Input::all();

//        dd($input);

        try
        {
            $shop = new Brand();
            $shop->user_id = \Auth::getUser()->id;
            $shop->brand_name = $input['shop_name'];
            $shop->type = "shop";

            if(Input::has('filename') && $input['filename'] != "")
            {
                $attachment = new Attachment();
                $attachment->filename = $input['filename'];
                $attachment->filetype = $input['filetype'];
                $attachment->filesize = $input['filesize'];
                $attachment->path = $input['filepath'];
                $attachment->save();
                $shop->attachment_id = $attachment->id;
            }

            $shop->telephone = $input['telephone'];
            $shop->email = $input['email'];
            $shop->facebook = $input['facebook'];
            $shop->line = $input['line'];
            $shop->line_url = $input['line_url'];
            $shop->display_button = $input['display_button'][0];
            $shop->suggest = $input['suggest'][0];
            $shop->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_shop')
                ->with('flash_message', 'บันทึกข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_shop')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function shop_edit($id)
    {
        $shop = Brand::find($id);
        $attachment = null;
        $logo = null;

        if($shop->attachment_id != null)
        {
            $attachment = Attachment::find($shop->attachment_id);
            $logo = AllFunction::createThumbnailAutoHeight($attachment->path, 115, 'temp');
        }

        return view('web.backend.shop_edit')->with("shop",$shop)
            ->with('attachment', $attachment)
            ->with('logo', $logo);
    }

    public function shop_update()
    {
        $input = Input::all();

//        dd($input);

        try
        {
            $shop = Brand::find($input['id']);
            $shop->user_id = \Auth::getUser()->id;
            $shop->brand_name = $input['shop_name'];
            $shop->type = "shop";

            if($input['filename'] != "")
            {
                if($shop->attachment_id != null)
                {
                    $attachment = Attachment::find($shop->attachment_id);
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
                    $shop->attachment_id = $attachment->id;
                }
            }
            else
            {
                $shop->attachment_id = null;
            }

            $shop->telephone = $input['telephone'];
            $shop->email = $input['email'];
            $shop->facebook = $input['facebook'];
            $shop->line = $input['line'];
            $shop->line_url = $input['line_url'];
            $shop->display_button = $input['display_button'][0];
            $shop->suggest = $input['suggest'][0];
            $shop->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_shop')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_shop')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function get_shop()
    {
        $search_char = strtolower(Request::get('term'));
        $shop = DB::table('brand')
            ->leftjoin('attachment', function ($join){
                $join->on( 'brand.attachment_id', '=', 'attachment.id');
            })
            ->where('brand.type','=','shop')
            ->select(DB::raw('brand.id,brand.brand_name, brand.telephone, brand.facebook, brand.email, brand.line,
                attachment.filename, attachment.filesize, attachment.path'))
            ->whereRaw('lower(brand.brand_name) like \'%'.$search_char.'%\'')
            ->orderBy('brand.brand_name')
            ->get();

        return json_encode($shop);
    }
}