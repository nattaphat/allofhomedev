<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;
use Request;
use Validator;
use Gmaps;

class CondoCategoryController extends Controller {

    public function index()
    {
//        return view('web.frontend.condo.index');

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

        return view('web.frontend.condo.index')
            ->with('map',$map);

    }

    public function create()
    {
        return view('web.frontend.condo.create');
    }

    public function update()
    {
        return view('web.frontend.condo.update');
    }

    public function view()
    {
        return view('web.frontend.condo.view');
    }
}