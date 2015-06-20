<?php namespace App\Http\Controllers\Backend;

use App\Models\AirportRailLink;
use App\Models\Amphoe;
use App\Models\Area;
use App\Models\Bts;
use App\Models\CatHome;
use App\Models\Facility;
use App\Models\Mrt;
use App\Models\Promotion;
use App\Models\Provinces;
use App\Models\SubArea;
use App\Models\Tambon;
use Config;
use App\Http\Controllers\Controller;
use App\User;
use Gmaps;
use Input;
use Redirect;

class BackendProjectController extends Controller {

    public function project()
    {
        $catHome = CatHome::orderBy('vip', 'desc')->orderBy('project_name')->get();
        return view('web.backend.project')->with('catHome', $catHome);
    }

    public function project_new()
    {
        //return view('web.backend.project_new');
        $area = Area::getAllArea();
        $subarea = SubArea::where('id','=','-1')->get();

        $province = Provinces::getAllProvince();
        $amphoe = Amphoe::where('amphid','=','-1')->get();
        $tambon = Tambon::where('tambid','=','-1')->get();

        $facility = Facility::orderBy('fac_name')->get()->toArray();

        $bts = Bts::getBts();
        $mrt = Mrt::getMrt();
        $apl = AirportRailLink::getAirportRailLink();

        $promotion = Promotion::orderBy('promotion_name')->get();

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => '7',
                'panControl' => false,
                'zoomControl' => false,
                'scaleControl' => true
            ];
        Gmaps::initialize($config);

        $marker =
            [
                'position' => '13.7646393,100.5378279',
                'draggable' => true,
                'title' => "เลื่อนเพื่อเลือกตำแหน่ง",
                'ondragend' =>
                    'debugger;
            var latitude = document.getElementById("latitude");
            var longitude = document.getElementById("longitude");
            var map_url = document.getElementById("map_url");

            latitude.value = event.latLng.lat();
            longitude.value = event.latLng.lng();
            map_url.value = "http://maps.google.com/maps?z=13&q=" + event.latLng.lat() + "," + event.latLng.lng();
            '
            ];

        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.backend.project_new')
            ->with('map',$map)
            ->with('area', $area)
            ->with('subarea', $subarea)
            ->with('province', $province)
            ->with('amphoe', $amphoe)
            ->with('tambon', $tambon)
            ->with('facility',$facility)
            ->with('bts',$bts)
            ->with('mrt', $mrt)
            ->with('apl', $apl)
            ->with('promotion', $promotion);
    }

    public function project_store()
    {
//        $input = Input::all();
//
//        try
//        {
//            $fac = new Project();
//            $fac->fac_name = $input['fac_name'];
//            $fac->save();
//        }
//        catch(\Exception $e)
//        {
//            return Redirect::route('backend_project')
//                ->with('flash_message', 'บันทึกข้อมูลล้มเหลว')
//                ->with('flash_type', 'alert-danger');
//        }
//
//        return Redirect::route('backend_project')
//            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
//            ->with('flash_type', 'alert-success');
    }

    public function project_edit($id)
    {
//        $fac = Project::find($id);
//        return view('web.backend.project_edit')->with("fac",$fac);
    }

    public function project_update()
    {
//        $input = Input::all();
//
//        try{
//            $fac = Project::find($input['id']);
//            $fac->fac_name = $input['fac_name'];
//            $fac->save();
//        }
//        catch(\Exception $e)
//        {
//            return Redirect::route('backend_project')
//                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
//                ->with('flash_type', 'alert-danger');
//        }
//
//        return Redirect::route('backend_project')
//            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
//            ->with('flash_type', 'alert-success');
    }
}