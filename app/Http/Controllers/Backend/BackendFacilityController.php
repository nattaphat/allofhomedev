<?php namespace App\Http\Controllers\Backend;

use App\Models\Facility;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;

class BackendFacilityController extends Controller {

    public function facility()
    {
        $facs = Facility::orderBy('fac_name')->get();
        return view('web.backend.facility')->with('facs', $facs);
    }

    public function facility_new()
    {
        return view('web.backend.facility_new');
    }

    public function facility_store()
    {
        $input = Input::all();

        try
        {
            $fac = new Facility();
            $fac->fac_name = $input['fac_name'];
            $fac->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_facility')
                ->with('flash_message', 'บันทึกข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_facility')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function facility_edit($id)
    {
        $fac = Facility::find($id);
        return view('web.backend.facility_edit')->with("fac",$fac);
    }

    public function facility_update()
    {
        $input = Input::all();

        try{
            $fac = Facility::find($input['id']);
            $fac->fac_name = $input['fac_name'];
            $fac->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_facility')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_facility')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }

}