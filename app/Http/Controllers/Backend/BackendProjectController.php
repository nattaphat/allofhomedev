<?php namespace App\Http\Controllers\Backend;

use App\Models\AirportRailLink;
use App\Models\AllFunction;
use App\Models\Amphoe;
use App\Models\Area;
use App\Models\Bts;
use App\Models\CatHome;
use App\Models\CatHomePic;
use App\Models\CatHomePromotion;
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

class BackendProjectController extends Controller {

    public function project()
    {
        $catHome = CatHome::orderBy('vip', 'desc')->orderBy('created_at', 'desc')->get();
        return view('web.backend.project')->with('catHome', $catHome);
    }

    public function project_new()
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
        $input = Input::all();

//        dd($input);

        $construct_date = null;
        $finish_date = null;

        if($input["construct_date"] != "")
        {
            $construct_date_array = explode("/", $input['construct_date']);
            $construct_date = $construct_date_array[2].'-'.$construct_date_array[1].'-'.$construct_date_array[0];
        }
        if($input["finish_date"] != "") {
            $finish_date_array = explode("/", $input['finish_date']);
            $finish_date = $finish_date_array[2].'-'.$finish_date_array[1].'-'.$finish_date_array[0];
        }

        $provine = Provinces::find($input['provid']);
        $region_id = $provine->region_id;

        $catHome = new CatHome();
        $catHome->user_id = intval($input['user_id']);
        $catHome->title = $input['title'];
        $catHome->subtitle = $input['subtitle'];
        $catHome->for_cat = serialize($input['for_cat']);
        $catHome->project_name = $input['project_name'];
        $catHome->website = $input['website'];
        $catHome->region_id = $region_id;
        $catHome->provid = $input['provid'];
        $catHome->amphid = $input['amphid'];
        $catHome->tambid = $input['tambid'];
        $catHome->add_street = $input['add_street'];
        $catHome->latitude = $input['latitude'];
        $catHome->longitude = $input['longitude'];
        $catHome->map_url = $input['map_url'];

        if($input['area_id'] != "")
            $catHome->area_id = $input['area_id'];
        if($input['subarea_id'] != "")
            $catHome->subarea_id = $input['subarea_id'];

        $catHome->area_1 = str_replace(".00", "", $input['area_1']);
        $catHome->area_2 = str_replace(".00", "", $input['area_2']);
        $catHome->area_3 = str_replace(".00", "", $input['area_3']);
        $catHome->num_building = $input['num_building'];
        $catHome->num_unit = $input['num_unit'];
        $catHome->num_elev_person = $input['num_elev_person'];
        $catHome->num_elev_object = $input['num_elev_object'];
        $catHome->ratio_elev = $input['ratio_elev'];
        $catHome->num_parking = $input['num_parking'];
        $catHome->percent_parking = str_replace(".00", "", $input['percent_parking']);
        $catHome->home_type_per_area = $input['home_type_per_area'];
        $catHome->home_area = $input['home_area'];

        if(Input::has('eia'))
            $catHome->eia = $input['eia'][0];

        $catHome->sell_price = $input['sell_price'];
        $catHome->sell_price_from = $input['sell_price_from'];
        $catHome->sell_price_to = $input['sell_price_to'];
        $catHome->sell_price_detail = $input['sell_price_detail'];
        $catHome->home_material = $input['home_material'];
        $catHome->home_style = $input['home_style'];

        if($construct_date != null)
            $catHome->construct_date = $construct_date;
        if($finish_date != null)
            $catHome->finish_date = $finish_date;

        $catHome->video_url = $input['video_url'];
        $catHome->review_status = $input['review_status'][0];
        $catHome->status = 1;  // 0 = รอพิจารณาอนุมัติ, 1 = อนุมัติผลแล้ว
        $catHome->spare_price = $input['spare_price'];
        $catHome->central_price = $input['central_price'];
        $catHome->promotion_str = $input['promotion_str'];
        $catHome->facility_str = $input['facility_str'];
        $catHome->nearby_str = $input['nearby_str'];
        $catHome->vip = (Input::has('vip'))? true : false;
        $catHome->num_view = 0;
        $catHome->num_shared = 0;
        $catHome->num_comment = 0;
        $catHome->num_rating = 0;
        $catHome->brand_id = $input['brand_id'];
        $catHome->save();

//        dd($catHome);

        if(Input::has('bts'))
        {
            foreach($input['bts'] as $key=>$value)
            {
                $projectBts = new ProjectBts();
                $projectBts->bts_id = $value;
                $catHome->projectBts()->save($projectBts);
            }
        }

        if(Input::has('mrt'))
        {
            foreach($input['mrt'] as $key=>$value)
            {
                $projectMrt = new ProjectMrt();
                $projectMrt->mrt_id = $value;
                $catHome->projectMrt()->save($projectMrt);
            }
        }

        if(Input::has('apl'))
        {
            foreach($input['apl'] as $key=>$value)
            {
                $projectAplink = new ProjectAirportLink();
                $projectAplink->apl_id = $value;
                $catHome->projectAplink()->save($projectAplink);
            }
        }

        if(Input::has('facility'))
        {
            foreach($input['facility'] as $key=>$value)
            {
                $projectFacility = new ProjectFacility();
                $projectFacility->facility_id = $value;
                $catHome->projectFacility()->save($projectFacility);
            }
        }

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

                $catHome->picture()->save($pic);
            }
        }

        for($i=3; $i<=43; $i++)
        {
            if(Input::has('pics_filename'.$i)) {
                $filename = $input['pics_filename'.$i];
                $filetype = $input['pics_filetype'.$i];
                $filesize = $input['pics_filesize'.$i];
                $filepath = $input['pics_filepath'.$i];
                $description = $input['pics_description'.$i];

                $count_pic = count($filename);
                for($j=0; $j<$count_pic; $j++)
                {
                    $thumbnail = AllFunction::createThumbnailFix($filepath[$j], 80, 70);

                    $catHomePic = CatHomePic::create([
                        'cat_home_id' => $catHome->id,
                        'pic_for' => $i,
                        'filename' => $filename[$j],
                        'filesize' => $filesize[$j],
                        'filetype' => $filetype[$j],
                        'filepath' => $filepath[$j],
                        'description' => $description[$j],
                        'thumbnail' => $thumbnail
                    ]);
                }
            }
        }

        if(Input::has('promotion')) {

            $items = $input['promotion'];
            foreach($items as $item)
            {
                CatHomePromotion::create(
                    [
                        'promotion_id' => $item,
                        'cat_home_id' => $catHome->id
                    ]
                );
            }
        }

        if(Input::has('tag'))
        {
            foreach($input['tag'] as $key=>$value)
            {
                $tag = new Tag();
                $tag->tag_sub_id = $value;
                $catHome->tag()->save($tag);
            }
        }

//        dd($catHome);

        return redirect('backend/project')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
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

    public  function get_cat_home()
    {
        $search_char = strtolower(Request::get('term'));

        $catHome = DB::table('cat_home')
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
            ->select(DB::raw('cat_home.id,cat_home.project_name || \' - \' || geo_tambon.name
                || \' \' || geo_amphoe.name || \' \' || geo_province.name as text,
                cat_home.latitude, cat_home.longitude'))
            ->whereRaw('lower(cat_home.project_name) like \'%'.$search_char.'%\' or
                lower(geo_tambon.name) like \'%'.$search_char.'%\' or
                lower(geo_amphoe.name) like \'%'.$search_char.'%\' or
                lower(geo_province.name) like \'%'.$search_char.'%\'
                ')
            ->orderBy('cat_home.project_name')
            ->orderBy('geo_tambon.name')
            ->orderBy('geo_amphoe.name')
            ->orderBy('geo_province.name')
            ->get();

        return json_encode($catHome);
    }
}