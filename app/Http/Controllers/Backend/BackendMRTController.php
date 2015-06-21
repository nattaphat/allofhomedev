<?php namespace App\Http\Controllers\Backend;

use App\Models\Mrt;
use App\Models\MrtRoute;
use App\Http\Controllers\Controller;
use Input;
use Redirect;

class BackendMRTController extends Controller {

    public function mrt()
    {
        $mrt = Mrt::orderBy('route_id')
            ->orderBy('mrt_code')->get();

        return view('web.backend.mrt')->with('mrt',$mrt);
    }

    public function mrt_edit($id)
    {
        $mrt = Mrt::find($id);
        $mrtRoute = MrtRoute::all()->lists('name','id');
        return view('web.backend.mrt_edit')->with('mrt', $mrt)->with('mrtRoute', $mrtRoute);
    }

    public function mrt_update()
    {
        $input = Input::all();

//        dd($input);

        try{
            $mrt = Mrt::find($input['id']);
            $mrt->route_id = $input['route_id'];
            $mrt->mrt_name = $input['mrt_name'];
            $mrt->status = $input['status'];
            $mrt->save();
        }
        catch(\Exception $e)
        {
            return Redirect::route('backend_mrt')
                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
                ->with('flash_type', 'alert-danger');
        }

        return Redirect::route('backend_mrt')
            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');

    }

}