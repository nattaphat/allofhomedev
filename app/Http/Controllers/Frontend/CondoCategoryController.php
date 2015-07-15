<?php namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\CatHomePic;
use App\Http\Controllers\Controller;
use Validator;
use Gmaps;
use App\Models\CatHome;
use App\Models\CatHomePromotion;
use App\Models\PicLayout;
use App\Models\Promotion;
use App\Models\Tag;
use Input;
use DB;
use Redirect;

class CondoCategoryController extends Controller {

    public function index()
    {
//        $catHome = DB::table('cat_home as ch')
//            ->leftJoin(DB::raw('
//                (
//                        select id
//                          from cat_home
//                          where vip = true
//                          ORDER BY random() limit 5
//                ) as vip
//            '), function ($join){
//                $join->on( 'ch.id', '=', 'vip.id');
//            })
//            ->orderBy('vip.id')
//            ->orderBy('ch.created_at', 'desc')
//            ->get();
//
//        dd($catHome);

//        $brand = \App\Models\CatHome::distinct()->select('project_owner')
//            ->groupBy('project_owner')->take(14)->get();
//
//        // VIP 5 อัน Random
//        $catHomeVip = CatHome::where('status','=',1)
//            ->where('vip','=',true)
//            ->whereRaw('for_cat like \'%"3"%\'')
//            ->orderBy(DB::raw('random()'))
//            ->take(5)
//            ->get();
//
//        // post ทั่วไป กรองไม่เอาหัวข้อ vip 5 อัน มาแสดง
//        $str_not_in = null;
//        if($catHomeVip != null && count($catHomeVip) > 0)
//        {
//            foreach($catHomeVip as $item)
//            {
//                $str_not_in[] = $item->id;
//            }
//        }
//
//        if($str_not_in != null)
//        {
//            $catHome = CatHome::where('status','=',1)
//                ->whereRaw('for_cat like \'%"3"%\'')
//                ->whereNotIn('id', $str_not_in)
//                ->orderBy('created_at', 'desc')
//                ->paginate(10);
//        }
//        else
//        {
//            $catHome = CatHome::where('status','=',1)
//                ->whereRaw('for_cat like \'%"3"%\'')
//                ->orderBy('created_at', 'desc')
//                ->paginate(10);
//        }
//
//        $config =
//            [
//                'center' => '13.7646393,100.5378279',
//                'zoom' => 'auto',
//                'scrollwheel' => false
//            ];
//
//        Gmaps::initialize($config);
//
//        if(($catHomeVip != null && count($catHomeVip) > 0) || ($catHome != null && count($catHome)))
//        {
//            foreach($catHomeVip as $item)
//            {
//                $attachment = Attachment::find($item->project_owner_logo);
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$attachment->path.'"'.
//                            'alt="'.$attachment->filename.'" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('condo/view/').'/'.$item->id.'" target="_blank">'.$item->project_name.'</a></h5>'.
//                            '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.$item->project_owner.'</p>'.
//                            '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatHome::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.$item->telephone.'</p>'.
//                            '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
//                            '</div>'.
//                            '</div>'
//                    ];
//                Gmaps::add_marker($marker);
//            }
//            foreach($catHome as $item)
//            {
//                $attachment = Attachment::find($item->project_owner_logo);
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$attachment->path.'"'.
//                            'alt="'.$attachment->filename.'" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('condo/view/').'/'.$item->id.'" target="_blank">'.$item->project_name.'</a></h5>'.
//                            '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.$item->project_owner.'</p>'.
//                            '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatHome::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.$item->telephone.'</p>'.
//                            '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
//                            '</div>'.
//                            '</div>'
//                    ];
//                Gmaps::add_marker($marker);
//            }
//        }
//
//        $map = Gmaps::create_map();
//
//        return View::make('web.frontend.condo.index',
//            [
//                'map' => $map,
//                'catHome' => $catHome,
//                'catHomeVip' => $catHomeVip,
//                'brand' => $brand
//            ]);

        $catHome = null;
        try{
            $catHome = DB::table('cat_home as ch')
                ->leftJoin(DB::raw('
                (
                        select id
                          from cat_home
                          where vip = true
                          ORDER BY random() limit 5
                ) as vip
            '), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->join(DB::raw('
                    (
                        select distinct pictureable_id, pictureable_type from picture
                        where pictureable_type = \'App\\Models\\CatHome\'
                    ) pic
                '), function($join){
                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
                })
                ->whereRaw('ch.for_cat like \'%"1"%\'')
                ->select('ch.*')
                ->orderByRaw('case when vip.id is not null then 1 else 0 end desc')
                ->orderBy('ch.created_at', 'desc')
                ->paginate(15);
        }
        catch(\Exception $e)
        {

        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        if($catHome != null && count($catHome) > 0)
        {
            foreach($catHome as $item)
            {
                $path_logo = "";
                $brand = null;
                if($item->brand_id != null && $item->brand_id != "")
                {
                    $path_logo = Brand::getPathLogo($item->brand_id);
                    $brand = Brand::find($item->brand_id);
                }

                $marker =
                    [
                        'position' => $item->latitude.','.$item->longitude,
                        'draggable' => false,
                        'infowindow_content' =>
                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
                            '<div class="col-md-6">'.
                            '<img src="'.$path_logo.'"'.
                            'alt="" class=\'img-responsive\' '.
                            'style="max-width: 100%;" />'.
                            '</div>'.
                            '<div class="col-md-6">'.
                            '<h5><a href="'.url('condo/view/').'/'.$item->id.'" target="_blank">'.$item->project_name.'</a></h5>'.
                            '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                            '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatHome::getFullPrjAddress($item->id)).'</p>'.
                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                            '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                            '</div>'.
                            '</div>'
                    ];
                Gmaps::add_marker($marker);
            }
        }

        $map = Gmaps::create_map();

        return view('web.frontend.condo_index')
            ->with('catHome', $catHome)
            ->with('map', $map);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function view($id)
    {
        $catHome = CatHome::find($id);
        $brand = Brand::find($catHome->brand_id);

        $fac = $catHome->projectFacility()->get();
        $bts = $catHome->projectBts()->get();
        $mrt = $catHome->projectMrt()->get();
        $apl = $catHome->projectAplink()->get();
        $promotion = $catHome->catHomePromotion()->get();
        $tag = $catHome->tag()->get();
        $pic = $catHome->picture()->get();

        $catHomePic = null;
        for($i=3; $i<=43; $i++)
        {
            $catHomePic[$i] = CatHomePic::where('cat_home_id', '=', $id)
                ->where('pic_for', '=', $i)
                ->get();
        }

        $config =
            [
                'center' => $catHome->latitude.','.$catHome->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
        [
            'position' => $catHome->latitude.','.$catHome->longitude,
            'draggable' => false,
            'infowindow_content' =>
                '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                '<div style="width: 50%; float:left;">'.
                '<img src="'.Brand::getPathLogo($brand->id).'"'.
                'alt="" style="max-width: 90%; height: auto;" />'.
                '</div>'.
                '<div style="width: 50%; float:left;">'.
                '<h5><a href="'.url('condo/view/').'/'.$catHome->id.'" target="_blank">'.$catHome->project_name.'</a></h5>'.
                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.$brand->brand_name.'</p>'.
                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatHome::getFullPrjAddress($catHome->id)).'</p>'.
                '<p><strong>ราคาเริ่มต้น</strong> : '.$catHome->sell_price.' &nbsp;&nbsp;บาท</p>'.
                '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                '<p><strong>เว็บไซต์</strong> : '.$catHome->website.'</p>'.
                '</div>'.
                '</div>'
        ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.condo_view')
            ->with('map',$map)
            ->with('catHome', $catHome)
            ->with('catHomePic', $catHomePic)
            ->with('facility', $fac)
            ->with('bts', $bts)
            ->with('mrt', $mrt)
            ->with('apl', $apl)
            ->with('promotion', $promotion)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);

//        return view('web.frontend.condo_view');
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

        return view('web.frontend.condo.create')
            ->with('map', $map)
            ->with('promotion', $promotion);
    }

    public function post_create()
    {
        $input = Input::all();

        $rules = [
            'user_id' => 'required',
            'project_id' => 'required',
            'title' => 'required|max:100',
            'subtitle' => 'required|max:255',
            'contact_company_name' => 'required',
            'contact_telephone' => 'required|max:50',
            'contact_email' => 'max:50',
            'contact_website' => 'max:50',
            'contact_lineid' => 'max:50',
            'project_type' => 'required',
            'sell_price' => 'required',
            'sell_price_from' => 'required',
            'sell_price_to' => 'required',
            'construct_date' => 'required',
            'finish_date' => 'required',
            'status' => 'required'
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
            return redirect('condo/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else{

            $construct_date_array = explode("/", $input['construct_date']);
            $construct_date = $construct_date_array[2].'-'.$construct_date_array[1].'-'.$construct_date_array[0];
            $finish_date_array = explode("/", $input['finish_date']);
            $finish_date = $finish_date_array[2].'-'.$finish_date_array[1].'-'.$finish_date_array[0];

            $catHome = new CatHome();
            $catHome->user_id = $input['user_id'];
            $catHome->project_id = $input['project_id'];
            $catHome->title = $input['title'];
            $catHome->subtitle = $input['subtitle'];
            $catHome->contact_company_name = $input['contact_company_name'];
            $catHome->contact_telephone = $input['contact_telephone'];
            $catHome->contact_email = $input['contact_email'];
            $catHome->contact_website = $input['contact_website'];
            $catHome->contact_lineid = $input['contact_lineid'];
            $catHome->project_type = serialize($input['project_type']);
            $catHome->project_area = $input['project_area'];
            $catHome->num_unit = $input['num_unit'];
            $catHome->home_type_per_area = $input['home_type_per_area'];
            $catHome->home_area = $input['home_area'];
            $catHome->home_material = $input['home_material'];
            $catHome->home_style = $input['home_style'];
            if(Input::has('eia'))
                $catHome->eia = $input['eia'][0];
            $catHome->sell_price = str_replace(",", "", $input['sell_price']);
            $catHome->construct_date = $construct_date;
            $catHome->finish_date = $finish_date;
            if(Input::has('spare_price'))
                $catHome->spare_price = str_replace(",", "", $input['spare_price']);
            if(Input::has('central_price'))
                $catHome->central_price = str_replace(",", "", $input['central_price']);
            $catHome->project_layout = $input['project_layout'];
            $catHome->project_env = $input['project_env'];
            $catHome->project_scene = $input['project_scene'];
            $catHome->project_deliver = $input['project_deliver'];
            $catHome->loan_detail = $input['loan_detail'];
            $catHome->video_url = $input['video_url'];
            $catHome->promotion_str = $input['promotion_str'];
            if(Input::has('status'))
                $catHome->status = $input['status'][0];
            $catHome->sell_price_from = str_replace(",", "", $input['sell_price_from']);
            $catHome->sell_price_to = str_replace(",", "", $input['sell_price_to']);

            $catHome->num_building = $input['num_building'];
            $catHome->num_elev_person = $input['num_elev_person'];
            $catHome->num_elev_object = $input['num_elev_object'];
            $catHome->ratio_elev_per_unit = $input['ratio_elev_per_unit'];
            $catHome->num_parking = $input['num_parking'];
            $catHome->percent_parking = $input['percent_parking'];

            $catHome->category = "โครงการคอนโดใหม่";
            if(Input::has('vip'))
                $catHome->vip = $input['vip'];
            else
                $catHome->vip = false;
            $catHome->save();

            if(Input::has('promotion'))
            {
                foreach($input['promotion'] as $key=>$value)
                {
                    CatHomePromotion::create(['promotion_id' => $value, 'cat_home_id' => $catHome->id]);
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

            if(Input::has('pic_layout'))
            {
                $files = explode("###", $input['pic_layout']);
                foreach($files as $file)
                {
                    if($file != "")
                    {
                        $f = explode("@@@", $file);
                        PicLayout::create
                        ([
                            'cat_home_id' => $catHome->id,
                            'type' => 'layout',
                            'filename' => $f[0],
                            'filetype' => $f[1],
                            'filesize' => $f[2],
                            'filepath' => $f[3]
                        ]);
                    }
                }
            }

            if(Input::has('pic_env'))
            {
                $files = explode("###", $input['pic_env']);
                foreach($files as $file)
                {
                    if($file != "")
                    {
                        $f = explode("@@@", $file);
                        PicLayout::create
                        ([
                            'cat_home_id' => $catHome->id,
                            'type' => 'env',
                            'filename' => $f[0],
                            'filetype' => $f[1],
                            'filesize' => $f[2],
                            'filepath' => $f[3]
                        ]);
                    }
                }
            }

            if(Input::has('pic_scene'))
            {
                $files = explode("###", $input['pic_scene']);
                foreach($files as $file)
                {
                    if($file != "")
                    {
                        $f = explode("@@@", $file);
                        PicLayout::create
                        ([
                            'cat_home_id' => $catHome->id,
                            'type' => 'scene',
                            'filename' => $f[0],
                            'filetype' => $f[1],
                            'filesize' => $f[2],
                            'filepath' => $f[3]
                        ]);
                    }
                }
            }

            if(Input::has('pic_deliver'))
            {
                $files = explode("###", $input['pic_deliver']);
                foreach($files as $file)
                {
                    if($file != "")
                    {
                        $f = explode("@@@", $file);
                        PicLayout::create
                        ([
                            'cat_home_id' => $catHome->id,
                            'type' => 'deliver',
                            'filename' => $f[0],
                            'filetype' => $f[1],
                            'filesize' => $f[2],
                            'filepath' => $f[3]
                        ]);
                    }
                }
            }

            return Redirect::to('condo/view/'.$catHome->id)
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

        return view('web.frontend.condo.update')
            ->with('map',$map);
    }
}