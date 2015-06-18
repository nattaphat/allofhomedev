<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Category;
use Input;
use Redirect;

class BackendCategoryController extends Controller {

    public function category()
    {
        $cats = Category::orderBy('id')->get();
        return view('web.backend.category')->with('cats', $cats);
    }

    public function category_edit($id)
    {
        $cat = Category::find($id);
        return view('web.backend.category_edit')->with("cat",$cat);
    }

    public function category_update()
    {
        $input = Input::all();

        try{
            $cat = Category::find($input['id']);
            $cat->category_name = $input['category_name'];
            $cat->visible = $input['visible'][0];
            $cat->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_category')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_category')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }
}