<?php namespace App\Http\Controllers\Frontend;

use App\Models\CatHome;
use App\Models\CatHomePic;
use App\Models\CatHomePromotion;
use App\Models\Picture;
use App\Models\ProjectAirportLink;
use App\Models\ProjectBts;
use App\Models\ProjectFacility;
use App\Models\ProjectMrt;
use App\Models\Tag;
use Config;
use App\Http\Controllers\Controller;
use Gmaps;
use Request;
use Validator;
use Input;
use DB;

use App\Models\Tambon;
use App\Models\Amphoe;
use App\Models\Provinces;
use App\Models\GeoRegion;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Project;
use App\Models\ProjectRating;
use App\Models\Facility;
use App\Models\Bts;
use App\Models\Mrt;
use App\Models\AirportRailLink;
use App\Models\Attachment;
use App\User;
use App\Models\Promotion;
use JsValidator;

class ProjectCategoryController extends Controller {

    public function index()
    {
        $catHome = CatHome::orderBy('created_at','desc')->get();

        return view('web.frontend.project.index')
            ->with('catHome',$catHome);
    }

    public function create()
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
                'center' => 'auto',
                'zoom' => '7',
                'panControl' => false,
                'zoomControl' => false,
                'scaleControl' => true,
                //'scrollwheel' => false
                'onboundschanged' =>
                    'if (!centreGot) {
                    var mapCentre = map.getCenter();
                    marker_0.setOptions({
                        position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                    });
                }
                centreGot = true;'
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

        return view('web.frontend.project.create')
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

    public function getSubArea()
    {
        $id = Request::get("id");
        $sub = SubArea::getSubArea($id);
        return $sub;
    }

    public function getAmphoe()
    {
        $id = Request::get("provid");
        $sub = Amphoe::getAmphoe($id);
        return $sub;
    }

    public function getTambon()
    {
        $provid = Request::get("provid");
        $amphid = Request::get("amphid");
        $tambon = Tambon::getTambon($provid, $amphid);
        return $tambon;
    }

    public function post_create()
    {
        $input = Input::all();

//        dd($input);

        $f = explode("@@@", $input['project_owner_logo']);
        $attachment = Attachment::create([
            'filename' => $f[0], 'path' => $f[3], 'filesize' => $f[2], 'filetype' => $f[1]
        ]);

        $construct_date_array = explode("/", $input['construct_date']);
        $construct_date = $construct_date_array[2].'-'.$construct_date_array[1].'-'.$construct_date_array[0];
        $finish_date_array = explode("/", $input['finish_date']);
        $finish_date = $finish_date_array[2].'-'.$finish_date_array[1].'-'.$finish_date_array[0];

        $provine = Provinces::find($input['provid']);
        $region_id = $provine->region_id;

        $catHome = new CatHome();
        $catHome->user_id = intval($input['user_id']);
        $catHome->title = $input['title'];
        $catHome->subtitle = $input['subtitle'];
        $catHome->for_cat = serialize($input['for_cat']);
        $catHome->project_name = $input['project_name'];
        $catHome->project_owner = $input['project_owner'];
        $catHome->project_owner_logo = $attachment->id;
        $catHome->telephone = $input['telephone'];
        $catHome->email = $input['email'];
        $catHome->website = $input['website'];
        $catHome->facebook = $input['facebook'];
        $catHome->line = $input['line'];
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

        $catHome->area_1 = $input['area_1'];
        $catHome->area_2 = $input['area_2'];
        $catHome->area_3 = $input['area_3'];
        $catHome->num_building = $input['num_building'];
        $catHome->num_unit = $input['num_unit'];
        $catHome->num_elev_person = $input['num_elev_person'];
        $catHome->num_elev_object = $input['num_elev_object'];
        $catHome->ratio_elev = $input['ratio_elev'];
        $catHome->num_parking = $input['num_parking'];
        $catHome->percent_parking = $input['percent_parking'];
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
        $catHome->construct_date = $construct_date;
        $catHome->finish_date = $finish_date;
        $catHome->video_url = $input['video_url'];
        $catHome->review_status = $input['review_status'][0];
        $catHome->status = $input['status'][0];
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
        $catHome->save();

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

        if(Input::has('pics_filename')) {
            $filename = $input['pics_filename'];
            $filetype = $input['pics_filetype'];
            $filesize = $input['pics_filesize'];
            $filepath = $input['pics_filepath'];
            $description = $input['pics_description'];

            $count_pic = count($filename);
            for($j=0; $j<$count_pic; $j++)
            {
                $pic = new Picture();
                $pic->file_name = $filename[$j];
                $pic->file_path = $filepath[$j];
                $pic->file_size = $filesize[$j];
                $pic->file_type = $filetype[$j];
                $pic->description = $description[$j];

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
                    $catHomePic = CatHomePic::create([
                        'cat_home_id' => $catHome->id,
                        'pic_for' => $i,
                        'filename' => $filename[$j],
                        'filesize' => $filesize[$j],
                        'filetype' => $filetype[$j],
                        'filepath' => $filepath[$j],
                        'description' => $description[$j]
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

        return redirect('project/index')
            ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
            ->with('flash_type', 'alert-success');
    }

    public function update()
    {
        $config = array();
        $config['center'] = '13.7714348,100.5520891';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        Gmaps::initialize($config);

        $marker = array('position' => '13.7714348,100.5520891');
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.project.update')
            ->with('map',$map);
    }

    public function view($id)
    {
        $project = Project::find($id);
        $fac = $project->projectFacility()->get();
        $bts = $project->projectBts()->get();
        $mrt = $project->projectMrt()->get();
        $apl = $project->projectAplink()->get();

        $config =
            [
                'center' => $project->lat.','.$project->long,
                'zoom' => '15',
                'scrollwheel' => false,
                'streetViewControl' => false
            ];
        Gmaps::initialize($config);

        $marker =
            [
                'position' => $project->lat.','.$project->long,
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.project.view')
            ->with('map',$map)
            ->with('project', $project)
            ->with('facility', $fac)
            ->with('bts', $bts)
            ->with('mrt', $mrt)
            ->with('apl', $apl);
    }

    public function projectViewProject($id)
    {
        $project = Project::find($id);
        $fac = $project->projectFacility()->get();
        $bts = $project->projectBts()->get();
        $mrt = $project->projectMrt()->get();
        $apl = $project->projectAplink()->get();

//        $config =
//        [
//            'center' => $project->lat.','.$project->long,
//            'zoom' => '15',
//            'scrollwheel' => false,
//            'streetViewControl' => false
//        ];
//        Gmaps::initialize($config);
//
//        $marker =
//        [
//            'position' => $project->lat.','.$project->long,
//        ];
//        Gmaps::add_marker($marker);
//
//        $map = Gmaps::create_map();

        return view('web.frontend.project.view_project')
//            ->with('map',$map)
            ->with('project', $project)
            ->with('facility', $fac)
            ->with('bts', $bts)
            ->with('mrt', $mrt)
            ->with('apl', $apl);
    }

    public function get_project()
    {
        $search_char = strtolower(Request::get('term'));

        $project = DB::table('project')
            ->join('geo_tambon', function ($join){
                $join->on( 'project.tambid', '=', 'geo_tambon.tambid');
                $join->on( 'project.amphid', '=', 'geo_tambon.amphid');
                $join->on( 'project.provid', '=', 'geo_tambon.provid');
            })
            ->join('geo_amphoe', function ($join){
                $join->on( 'project.amphid', '=', 'geo_amphoe.amphid');
                $join->on( 'project.provid', '=', 'geo_amphoe.provid');
            })
            ->join('geo_province', function ($join){
                $join->on( 'project.provid', '=', 'geo_province.provid');
            })
            ->select(DB::raw('project.id,project.project_name || \' - \' || geo_tambon.name
                || \' \' || geo_amphoe.name || \' \' || geo_province.name as text,
                project.lat, project.long'))
            ->whereRaw('lower(project.project_name) like \'%'.$search_char.'%\' or
                lower(geo_tambon.name) like \'%'.$search_char.'%\' or
                lower(geo_amphoe.name) like \'%'.$search_char.'%\' or
                lower(geo_province.name) like \'%'.$search_char.'%\'
                ')
            ->orderBy('project.project_name')
            ->orderBy('geo_tambon.name')
            ->orderBy('geo_amphoe.name')
            ->orderBy('geo_province.name')
            ->get();

        return json_encode($project);
    }

    public function get_shop_project()
    {
        $search_char = strtolower(Request::get('term'));

        $project = DB::table('project')
            ->join('geo_tambon', function ($join){
                $join->on( 'project.tambid', '=', 'geo_tambon.tambid');
                $join->on( 'project.amphid', '=', 'geo_tambon.amphid');
                $join->on( 'project.provid', '=', 'geo_tambon.provid');
            })
            ->join('geo_amphoe', function ($join){
                $join->on( 'project.amphid', '=', 'geo_amphoe.amphid');
                $join->on( 'project.provid', '=', 'geo_amphoe.provid');
            })
            ->join('geo_province', function ($join){
                $join->on( 'project.provid', '=', 'geo_province.provid');
            })
            ->select(DB::raw('project.id,project.project_name || \' - \' || geo_tambon.name
                || \' \' || geo_amphoe.name || \' \' || geo_province.name as text,
                project.lat, project.long, \'project\' as type'))
            ->whereRaw('lower(project.project_name) like \'%'.$search_char.'%\' or
                lower(geo_tambon.name) like \'%'.$search_char.'%\' or
                lower(geo_amphoe.name) like \'%'.$search_char.'%\' or
                lower(geo_province.name) like \'%'.$search_char.'%\'
                ')
            ->orderBy('project.project_name')
            ->orderBy('geo_tambon.name')
            ->orderBy('geo_amphoe.name')
            ->orderBy('geo_province.name')
            ->get();

        return json_encode($project);
    }

    public function get_latlong()
    {
        $project_id = Request::get('project_id');
        $project = Project::find($project_id);
        $address = Project::getPrjAddress($project_id);

        return json_encode(['lat' => $project->lat,
            'long' => $project->long,
            'project_full_name' => $project->project_name . ' - ' . $address]);
    }

}