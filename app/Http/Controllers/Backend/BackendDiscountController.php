<?php namespace App\Http\Controllers\Backend;

use App\Models\Promotion;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;

class BackendDiscountController extends Controller {

    public function discount()
    {
        $promotions = Promotion::orderBy('promotion_name')->get();
        return view('web.backend.discount')->with('promotions', $promotions);
    }

    public function discount_new()
    {
        return view('web.backend.discount_new');
    }

    public function discount_store()
    {
        $input = Input::all();

        try {
            $promotion = new Promotion();
            $promotion->promotion_name = $input['promotion_name'];
            $promotion->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_discount')
                ->with('flash_message', 'บันทึกข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_discount')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function discount_edit($id)
    {
        $promotion = Promotion::find($id);
        return view('web.backend.discount_edit')->with("promotion",$promotion);
    }

    public function discount_update()
    {
        $input = Input::all();

        try
        {
            $promotion = Promotion::find($input['id']);
            $promotion->promotion_name = $input['promotion_name'];
            $promotion->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_discount')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_discount')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }
}