<?php namespace App\Http\Controllers\Frontend;

use App\Models\Promotion;
use Config;
use App\Http\Controllers\Controller;
use Gmaps;
use Request;
use Validator;
use Input;
use DB;

use App\Models\Project;
use App\Models\ProjectAirportLink;
use App\Models\ProjectBts;
use App\Models\ProjectFacility;
use App\Models\ProjectMrt;
use App\Models\Tambon;
use App\Models\Amphoe;
use App\Models\Provinces;
use App\Models\GeoRegion;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\ProjectRating;
use App\Models\Facility;
use App\Models\Bts;
use App\Models\Mrt;
use App\Models\AirportRailLink;
use App\Models\Attachment;
use App\User;

class HomeCategoryController extends Controller {

    public function index()
    {
        //return view('web.frontend.home.index');

//        $config = array();
//        $config['center'] = 'auto';
//        $config['onboundschanged'] = 'if (!centreGot) {
//            var mapCentre = map.getCenter();
//            marker_0.setOptions({
//                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
//            });
//        }
//        centreGot = true;';
//
//        Gmaps::initialize($config);
//
//        $marker = array();
//        Gmaps::add_marker($marker);
//
//        $map = Gmaps::create_map();
//
//        return view('web.frontend.home.index')
//            ->with('map',$map);

        $config =
        [
            'center' => '13.7646393,100.5378279',
            'zoom' => '12',
            'panControl' => false,
            'zoomControl' => false,
            'scaleControl' => true,
            'scrollwheel' => false,
            'onboundschanged' =>
                'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;'
        ];

        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        Gmaps::initialize($config);

        $marker =
        [
            'position' => '13.7646393,100.5378279',
            'draggable' => false
        ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.home.index')
            ->with('map',$map);
    }

    public function create()
    {
        $promotion = Promotion::orderBy('promotion_name')->get();

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
                || \' \' || geo_amphoe.name || \' \' || geo_province.name as text '))
            ->orderBy('project.project_name')
            ->orderBy('geo_tambon.name')
            ->orderBy('geo_amphoe.name')
            ->orderBy('geo_province.name')
            ->get();

        $project = json_encode($project);

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => '15',
                'panControl' => false,
                'zoomControl' => false,
                'scaleControl' => true,
                'scrollwheel' => false,
                'onboundschanged' =>
                    'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;'
            ];

        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        Gmaps::initialize($config);

        $marker =
            [
                'position' => '13.7646393,100.5378279',
                'draggable' => false
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.home.create')
            ->with('map',$map)
            ->with('promotion', $promotion)
            ->with('project', $project);
    }

    public function searchProject()
    {
        $associate = ['java','javascript','php','c#'];
        return json_encode($associate);


//        $term = Input::get('term');
//        $associate = array();
//        $search    = DB::select(
//            "
//            select id , rank_id ,associate_no as value ,CONCAT(name ,'  ID  ',associate_no) as label
//            from associates
//            where match (name, associate_no )
//            against ('+{$term}*' IN BOOLEAN MODE)
//            "
//        );
//
//        foreach ($search as $result) {
//            $associate[] = $result;
//
//        }
//
//        return json_encode($associate);
    }


    public function post_create()
    {
        return "Under Construction";
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

        return view('web.frontend.home.update')
            ->with('map',$map);
    }

    public function view($id = 0)
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

        return view('web.frontend.home.view')
            ->with('map',$map);
    }
}