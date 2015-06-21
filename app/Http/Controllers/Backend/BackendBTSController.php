<?php namespace App\Http\Controllers\Backend;

use App\Models\Bts;
use App\Models\BtsRoute;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class BackendBTSController extends Controller {

    public function bts()
    {
        $bts = Bts::orderBy('route_id')
            ->orderBy('bts_code')->get();

        return view('web.backend.bts')->with('bts', $bts);
    }

    public function bts_edit($id)
    {
        $bts = Bts::find($id);
        $btsRoute = BtsRoute::all()->lists('name','id');
        return view('web.backend.bts_edit')->with('bts', $bts)->with('btsRoute', $btsRoute);
    }

    public function bts_update()
    {
        $input = Input::all();

//        dd($input);

        try{
            $bts = Bts::find($input['id']);
            $bts->route_id = $input['route_id'];
            $bts->bts_name = $input['bts_name'];
            $bts->status = $input['status'];
            $bts->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_bts')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_bts')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }
}