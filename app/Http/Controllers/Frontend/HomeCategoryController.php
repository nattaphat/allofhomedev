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
        $config =
        [
            'center' => '13.7646393,100.5378279',
            'zoom' => '12',
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
        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => '12',
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

        Gmaps::initialize($config);

        $marker =
            [
                'position' => '13.7646393,100.5378279',
                'draggable' => false
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        $promotion = Promotion::orderBy('promotion_name')->get();

        return view('web.frontend.home.create')
            ->with('map', $map)
            ->with('promotion', $promotion);
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