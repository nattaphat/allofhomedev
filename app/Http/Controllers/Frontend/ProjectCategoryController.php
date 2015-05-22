<?php namespace App\Http\Controllers\Frontend;

use App\Models\ProjectAirportLink;
use App\Models\ProjectBts;
use App\Models\ProjectFacility;
use App\Models\ProjectMrt;
use Config;
use App\Http\Controllers\Controller;
use Gmaps;
use Request;
use Validator;
use Input;

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

class ProjectCategoryController extends Controller {

    public function index()
    {
        $projects = Project::all();
        return view('web.frontend.project.index')
            ->with('projects',$projects);
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
            ->with('apl', $apl);
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

        $rules = [
            'project_name' => 'required|unique:project,project_name,NULL,id,project_company_owner,'. Input::get('project_company_owner'),
            'project_company_owner' => 'required|unique:project,project_company_owner,NULL,id,project_name,'. Input::get('project_name'),
            'file' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'add_street' => 'required',
            'tambid' => 'required',
            'amphid' => 'required',
            'provid' => 'required'
        ];

        $messages = [
            'required' => 'This field is required.',
            'unique' => 'This field has already been added.'
        ];

        $validator = Validator::make(
            $input,
            $rules,
            $messages
        );

        if ($validator->fails())
        {
            return redirect('project/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else{
//            try
//            {
            $f = explode("@@@", $input['file']);
            $attachment = Attachment::create([
                'filename' => $f[0], 'path' => $f[2], 'filesize' => $f[1]
            ]);

            $user_id = \Auth::user()->id;
            $provine = Provinces::find($input['provid']);
            $region_id = $provine->region_id;

            $project = new Project();
            $project->user_id = $user_id;
            $project->project_name = $input['project_name'];
            $project->project_company_owner = $input['project_company_owner'];
            $project->attachment_id = $attachment->id;
            $project->lat = $input['lat'];
            $project->long = $input['long'];
            $project->add_street = $input['add_street'];
            $project->tambid = $input['tambid'];
            $project->amphid = $input['amphid'];
            $project->provid = $input['provid'];
            $project->region_id = $region_id;
            if($input['area_id'] != "")
                $project->area_id = $input['area_id'];
            if($input['subarea_id'] != "")
                $project->subarea_id = $input['subarea_id'];
            $project->map_url = $input['map_url'];
            $project->website = $input['website'];
            $project->facebook = $input['facebook'];
            $project->nearby_str = $input['nearby_str'];
            $project->facility_str = $input['facility_str'];

            $project->save();

            if(Input::has('bts'))
            {
                foreach($input['bts'] as $key=>$value)
                {
                    $projectBts = new ProjectBts();
                    $projectBts->bts_id = $value;
                    $project->projectBts()->save($projectBts);
                }
            }

            if(Input::has('mrt'))
            {
                foreach($input['mrt'] as $key=>$value)
                {
                    $projectMrt = new ProjectMrt();
                    $projectMrt->mrt_id = $value;
                    $project->projectMrt()->save($projectMrt);
                }
            }

            if(Input::has('apl'))
            {
                foreach($input['apl'] as $key=>$value)
                {
                    $projectAplink = new ProjectAirportLink();
                    $projectAplink->apl_id = $value;
                    $project->projectAplink()->save($projectAplink);
                }
            }

            if(Input::has('facility'))
            {
                foreach($input['facility'] as $key=>$value)
                {
                    $projectFacility = new ProjectFacility();
                    $projectFacility->facility_id = $value;
                    $project->projectFacility()->save($projectFacility);
                }
            }


            return redirect('project/index')
                ->with('flash_message', 'บันทึกข้อมูลสำเร็จ')
                ->with('flash_type', 'alert-success');
        }
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

        return view('web.frontend.project.view_project')
            ->with('map',$map)
            ->with('project', $project)
            ->with('facility', $fac)
            ->with('bts', $bts)
            ->with('mrt', $mrt)
            ->with('apl', $apl);
    }
}