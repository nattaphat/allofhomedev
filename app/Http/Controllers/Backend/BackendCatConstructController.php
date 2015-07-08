<?php namespace App\Http\Controllers\Backend;

use App\Models\AirportRailLink;
use App\Models\AllFunction;
use App\Models\Amphoe;
use App\Models\Area;
use App\Models\Bts;
use App\Models\CatConstruct;
use App\Models\Facility;
use App\Models\Mrt;
use App\Models\Picture;
use App\Models\ProjectAirportLink;
use App\Models\ProjectBts;
use App\Models\ProjectFacility;
use App\Models\ProjectMrt;
use App\Models\Promotion;
use App\Models\Provinces;
use App\Models\SubArea;
use App\Models\Tag;
use App\Models\Tambon;
use App\Http\Controllers\Controller;
use Gmaps;
use Input;
use Request;
use DB;

class BackendCatConstructController extends Controller {

    public function catConstruct()
    {
        $catConstruct = CatConstruct::orderBy('vip', 'desc')->orderBy('created_at', 'desc')->get();
        return view('web.backend.catConstruct')->with('catConstruct', $catConstruct);
    }

    public function catConstruct_new()
    {
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

        return view('web.backend.catConstruct_new')
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

    public function catConstruct_store()
    {
        $input = Input::all();

//        dd($input);

        $provine = Provinces::find($input['provid']);
        $region_id = $provine->region_id;

        $catConstruct = new catConstruct();
        $catConstruct->user_id = intval($input['user_id']);
        $catConstruct->title = $input['title'];
        $catConstruct->subtitle = $input['subtitle'];
        $catConstruct->for_type = serialize($input['for_cat']);

        if(Input::has('website'))
            $catConstruct->website = $input['website'];

        $catConstruct->region_id = $region_id;
        $catConstruct->provid = $input['provid'];
        $catConstruct->amphid = $input['amphid'];
        $catConstruct->tambid = $input['tambid'];

        if(Input::has('add_street'))
            $catConstruct->add_street = $input['add_street'];
        if(Input::has('add_no'))
            $catConstruct->add_no = $input['add_no'];
        if(Input::has('add_building'))
            $catConstruct->add_building = $input['add_building'];
        if(Input::has('add_floor'))
            $catConstruct->add_floor = $input['add_floor'];

        $catConstruct->latitude = $input['latitude'];
        $catConstruct->longitude = $input['longitude'];
        $catConstruct->map_url = $input['map_url'];

        if(Input::has('service_day_time'))
            $catConstruct->service_day_time = $input['service_day_time'];
        if(Input::has('credit_card'))
            $catConstruct->credit_card = $input['credit_card'][0];
        if(Input::has('parking'))
            $catConstruct->parking = $input['parking'][0];
        if(Input::has('video_url'))
            $catConstruct->video_url = $input['video_url'];
        $catConstruct->status = 1;  // 0 = รอพิจารณาอนุมัติ, 1 = อนุมัติผลแล้ว
        $catConstruct->vip = (Input::has('vip'))? true : false;
        $catConstruct->num_view = 0;
        $catConstruct->num_shared = 0;
        $catConstruct->num_comment = 0;
        $catConstruct->num_rating = 0;
        $catConstruct->brand_id = $input['brand_id'];
        $catConstruct->save();

//        dd($catConstruct);

        if(Input::has('pics_filename2')) {
            $filename = $input['pics_filename2'];
            $filetype = $input['pics_filetype2'];
            $filesize = $input['pics_filesize2'];
            $filepath = $input['pics_filepath2'];
            $description = $input['pics_description2'];

            $count_pic = count($filename);
            for($j=0; $j<$count_pic; $j++)
            {
                $pic = new Picture();
                $pic->file_name = $filename[$j];
                $pic->file_path = $filepath[$j];
                $pic->file_size = $filesize[$j];
                $pic->file_type = $filetype[$j];
                $pic->description = $description[$j] == null? "" : $description[$j];
                $thumbnail = AllFunction::createThumbnailFix($filepath[$j], 80, 70);

                $pic->thumbnail = $thumbnail;

                $catConstruct->picture()->save($pic);
            }
        }

        if(Input::has('tag'))
        {
            foreach($input['tag'] as $key=>$value)
            {
                $tag = new Tag();
                $tag->tag_sub_id = $value;
                $catConstruct->tag()->save($tag);
            }
        }

//        dd($catConstruct);

        return redirect('backend/catConstruct')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function catConstruct_edit($id)
    {
//        $fac = Project::find($id);
//        return view('web.backend.catConstruct_edit')->with("fac",$fac);
    }

    public function catConstruct_update()
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
//            return Redirect::route('backend_catConstruct')
//                ->with('flash_message', 'แก้ไขข้อมูลล้มเหลว')
//                ->with('flash_type', 'alert-danger');
//        }
//
//        return Redirect::route('backend_catConstruct')
//            ->with('flash_message', 'แก้ไขข้อมูลสำเร็จ')
//            ->with('flash_type', 'alert-success');
    }

    public  function get_cat_home()
    {
        $search_char = strtolower(Request::get('term'));

        $catConstruct = DB::table('cat_home')
            ->join('geo_tambon', function ($join){
                $join->on( 'cat_home.tambid', '=', 'geo_tambon.tambid');
                $join->on( 'cat_home.amphid', '=', 'geo_tambon.amphid');
                $join->on( 'cat_home.provid', '=', 'geo_tambon.provid');
            })
            ->join('geo_amphoe', function ($join){
                $join->on( 'cat_home.amphid', '=', 'geo_amphoe.amphid');
                $join->on( 'cat_home.provid', '=', 'geo_amphoe.provid');
            })
            ->join('geo_province', function ($join){
                $join->on( 'cat_home.provid', '=', 'geo_province.provid');
            })
            ->select(DB::raw('cat_home.id,cat_home.catConstruct_name || \' - \' || geo_tambon.name
                || \' \' || geo_amphoe.name || \' \' || geo_province.name as text,
                cat_home.latitude, cat_home.longitude'))
            ->whereRaw('lower(cat_home.catConstruct_name) like \'%'.$search_char.'%\' or
                lower(geo_tambon.name) like \'%'.$search_char.'%\' or
                lower(geo_amphoe.name) like \'%'.$search_char.'%\' or
                lower(geo_province.name) like \'%'.$search_char.'%\'
                ')
            ->orderBy('cat_home.catConstruct_name')
            ->orderBy('geo_tambon.name')
            ->orderBy('geo_amphoe.name')
            ->orderBy('geo_province.name')
            ->get();

        return json_encode($catConstruct);
    }

}