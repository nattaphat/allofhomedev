<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Gmaps;
use Request;
use Validator;


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

        return view('web.frontend.home.index')
            ->with('map',$map);
    }

    public function create()
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

        return view('web.frontend.home.create')
            ->with('map',$map);
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