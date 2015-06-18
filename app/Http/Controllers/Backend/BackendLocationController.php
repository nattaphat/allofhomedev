<?php namespace App\Http\Controllers\Backend;

use App\Models\SubArea;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Area;
use Input;
use Redirect;

class BackendLocationController extends Controller {

    public function location()
    {
        $areas = Area::all();
        return view('web.backend.location')->with('areas', $areas);
    }

    public function location_new()
    {
        return view('web.backend.location_new');
    }

    public function location_store()
    {
        $input = Input::all();

        try
        {
            $area = new Area();
            $area->area_name = $input['area_name'];
            $area->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_location')
                ->with('flash_message', 'บันทึกข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_location')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function location_edit($id)
    {
        $area = Area::find($id);
        return view('web.backend.location_edit')->with("area",$area);
    }

    public function location_update()
    {
        $input = Input::all();

        try{
            $area = Area::find($input['id']);
            $area->area_name = $input['area_name'];
            $area->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_location')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_location')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }


    public function subArea()
    {
        $subAreas = SubArea::orderBy('area_id')->orderBy('subarea_name')->get();
        return view('web.backend.subArea')->with('subAreas', $subAreas);
    }

    public function subArea_new()
    {
        $areas = ['' => '-- กรุณาเลือก --'] + Area::all()->lists('area_name', 'id');
        return view('web.backend.subArea_new')->with('areas', $areas);
    }

    public function subArea_store()
    {
        $input = Input::all();

        try
        {
            $subArea = new SubArea();
            $subArea->area_id = $input['area_id'];
            $subArea->subarea_name = $input['subarea_name'];
            $subArea->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_subArea')
                ->with('flash_message', 'บันทึกข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_subArea')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function subArea_edit($id)
    {
        $area = Area::find($id);
        return view('web.backend.subArea_edit')->with("area",$area);
    }

    public function subArea_update()
    {
        $input = Input::all();

        try{
            $area = Area::find($input['id']);
            $area->area_name = $input['area_name'];
            $area->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_subArea')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_subArea')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }

}