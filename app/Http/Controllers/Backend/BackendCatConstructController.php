<?php namespace App\Http\Controllers\Backend;

use App\Models\AirportRailLink;
use App\Models\AllFunction;
use App\Models\Amphoe;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Bts;
use App\Models\CatConstruct;
use App\Models\Facility;
use App\Models\Mrt;
use App\Models\Picture;
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
        $province = Provinces::getAllProvince();
        $amphoe = Amphoe::where('amphid','=','-1')->get();
        $tambon = Tambon::where('tambid','=','-1')->get();

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
            ->with('province', $province)
            ->with('amphoe', $amphoe)
            ->with('tambon', $tambon);
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

        if(Input::has('sell_price'))
            $catConstruct->sell_price = $input['sell_price'];

        if(Input::has('sell_price_detail'))
            $catConstruct->sell_price_detail = $input['sell_price_detail'];

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
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);
        $province = Provinces::getAllProvince();
        $tag = $catConstruct->tag()->get();
        $pic = $catConstruct->picture()->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '7',
                'panControl' => false,
                'zoomControl' => false,
                'scaleControl' => true
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => true,
                'title' => "เลื่อนเพื่อเลือกตำแหน่ง",
                'ondragend' =>
                    '
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

        return view('web.backend.catConstruct_edit')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand)
            ->with('province', $province);
    }

    public function catConstruct_update()
    {
        $input = Input::all();

//        dd($input);

        $provine = Provinces::find($input['provid']);
        $region_id = $provine->region_id;

        $catConstruct = CatConstruct::find($input['id']);
        $catConstruct->user_id = intval($input['user_id']);
        $catConstruct->title = $input['title'];
        $catConstruct->subtitle = $input['subtitle'];
        $catConstruct->for_type = serialize($input['for_cat']);

        if(Input::has('website'))
            $catConstruct->website = $input['website'];
        else
            $catConstruct->website = null;

        $catConstruct->region_id = $region_id;
        $catConstruct->provid = $input['provid'];
        $catConstruct->amphid = $input['amphid'];
        $catConstruct->tambid = $input['tambid'];

        if(Input::has('add_street'))
            $catConstruct->add_street = $input['add_street'];
        else
            $catConstruct->add_street = null;

        if(Input::has('add_no'))
            $catConstruct->add_no = $input['add_no'];
        else
            $catConstruct->add_no = null;

        if(Input::has('add_building'))
            $catConstruct->add_building = $input['add_building'];
        else
            $catConstruct->add_building = null;

        if(Input::has('add_floor'))
            $catConstruct->add_floor = $input['add_floor'];
        else
            $catConstruct->add_floor = null;

        $catConstruct->latitude = $input['latitude'];
        $catConstruct->longitude = $input['longitude'];
        $catConstruct->map_url = $input['map_url'];

        if(Input::has('service_day_time'))
            $catConstruct->service_day_time = $input['service_day_time'];
        else
            $catConstruct->service_day_time = null;

        if(Input::has('credit_card'))
            $catConstruct->credit_card = $input['credit_card'][0];
        else
            $catConstruct->credit_card = null;

        if(Input::has('parking'))
            $catConstruct->parking = $input['parking'][0];
        else
            $catConstruct->parking = null;

        if(Input::has('video_url'))
            $catConstruct->video_url = $input['video_url'];
        else
            $catConstruct->video_url = null;

        $catConstruct->vip = (Input::has('vip'))? true : false;
        $catConstruct->brand_id = $input['brand_id'];

        if(Input::has('sell_price'))
            $catConstruct->sell_price = $input['sell_price'];
        else
            $catConstruct->sell_price = null;

        if(Input::has('sell_price_detail'))
            $catConstruct->sell_price_detail = $input['sell_price_detail'];
        else
            $catConstruct->sell_price_detail;


        $catConstruct->update();

//        dd($catConstruct);

        $catConstruct->picture()->delete();

//        dd($catConstruct->picture());

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

        $catConstruct->tag()->delete();

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

}