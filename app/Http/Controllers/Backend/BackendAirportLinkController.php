<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AirportRailLink;
use Input;
use Redirect;

class BackendAirportLinkController extends Controller {

    public function airportLink()
    {
        $airportLink = AirportRailLink::orderBy('id')->get();
        return view('web.backend.airportLink')->with('airportLink', $airportLink);
    }

    public function airportLink_edit($id)
    {
        $airportLink = AirportRailLink::find($id);
        return view('web.backend.airportLink_edit')->with('airportLink', $airportLink);
    }

    public function airportLink_update()
    {
        $input = Input::all();

//        dd($input);

        try{
            $airportLink = AirportRailLink::find($input['id']);
            $airportLink->apl_name = $input['apl_name'];
            $airportLink->status = $input['status'];
            $airportLink->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_airportLink')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_airportLink')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }

}