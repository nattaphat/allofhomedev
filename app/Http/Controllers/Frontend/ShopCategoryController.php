<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CatArticle;
use Gmaps;
use App\Models\Brand;
use App\Models\CatConstruct;
use DB;

class ShopCategoryController extends Controller {

    public function admin_index()
    {
        return view('web.frontend.shop.admin_index');
    }

//    ร้านค้าต่างๆ
    public function shop_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"4"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"4"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('shop/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.shop_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"4"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"4"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"4"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('shop/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('shop/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"8"%\'  and visible = true')  // 8 = ร้านค้าต่างๆ
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.shop_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems', $articleItems);

    }

    public function shop_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('shop').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }

//    บริการจัดสวน
    public function garden_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"5"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"5"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('garden/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.garden_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"5"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"5"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(1);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"5"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(1);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('garden/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('garden/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"9"%\' and visible = true')  // 9 = จัดสวน
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.garden_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems',$articleItems);
    }

    public function garden_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('garden').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }

//    บริการทำความสะอาด
    public function clean_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"6"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"6"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('clean/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.clean_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"6"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"6"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"6"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('clean/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('clean/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"10"%\' and visible = true')  // 10 = ทำความสะอาด
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.clean_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems', $articleItems);

    }

    public function clean_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('clean').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }

    //    ออกแบบภายใน ภายนอก
    public function interior_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"7"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"7"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('interior/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.interior_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"7"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"7"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"7"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('interior/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('interior/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"11"%\' and visible = true')  // 11 = ออกแบบภายใน ภายนอก
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.interior_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems', $articleItems);
    }

    public function interior_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('interior').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }

    //    ที่ดิน
    public function land_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"8"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"8"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('land/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.land_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"8"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"8"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"8"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('land/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('land/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"12"%\' and visible = true')  // 12 = ที่ดินเปล่า
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.land_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems', $articleItems);

    }

    public function land_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('land').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }

    //    ที่อยู่อาศัยมือสอง
    public function secondhand_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"9"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"9"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('secondhand/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.secondhand_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"9"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"9"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"9"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('secondhand/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('secondhand/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"13"%\' and visible = true')  // 13 = มือสอง
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.secondhand_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems', $articleItems);

    }

    public function secondhand_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('secondhand').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }

    //    ปล่อยเช่า
    public function rent_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"10"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"10"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('rent/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.rent_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"10"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"10"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"10"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('rent/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('rent/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"14"%\' and visible = true')  // 14 = ปล่อยเช่า
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.rent_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems',$articleItems);

    }

    public function rent_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('rent').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }

    //    อพาร์ทเม้นท์
    public function apartment_index()
    {
//        $cat = null;
//        try{
//            $cat = DB::table('cat_construct as ch')
//                ->leftJoin(DB::raw('
//                (
//                    select id
//                      from cat_construct
//                      where vip = true
//                      and for_type like \'%"11"%\'
//                      ORDER BY random() limit 5
//                ) as vip'), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                    (
//                        select distinct pictureable_id, pictureable_type from picture
//                        where pictureable_type = \'App\\Models\\CatConstruct\'
//                    ) pic
//                '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1 and ch.for_type like \'%"11"%\'')
//                ->select('ch.*')
//                ->orderBy('ch.created_at', 'desc')
//                ->paginate(15);
//        }
//        catch(\Exception $e)
//        {
//
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
//        if($cat != null && count($cat) > 0)
//        {
//            foreach($cat as $item)
//            {
//                $path_logo = "";
//                $brand = null;
//                if($item->brand_id != null && $item->brand_id != "")
//                {
//                    $path_logo = Brand::getPathLogo($item->brand_id);
//                    $brand = Brand::find($item->brand_id);
//                }
//
//                $marker =
//                    [
//                        'position' => $item->latitude.','.$item->longitude,
//                        'draggable' => false,
//                        'infowindow_content' =>
//                            '<div class="row" style="width: 100%; margin-top: 5px; margin-bottom: 20px;">'.
//                            '<div class="col-md-6">'.
//                            '<img src="'.$path_logo.'"'.
//                            'alt="" class=\'img-responsive\' '.
//                            'style="max-width: 100%;" />'.
//                            '</div>'.
//                            '<div class="col-md-6">'.
//                            '<h5><a href="'.url('apartment/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
//                            '<p><strong>ชื่อร้านค้า</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
//                            '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
//                            '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
//                            '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
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
//        return view('web.frontend.apartment_index')
//            ->with('cat', $cat)
//            ->with('map', $map);

        // #### VIP
        $catVip = null;
        try{
            $catVip = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      and for_type like \'%"11"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

//        dd($catVip);

        // #### General (Not include vip)
        $cat = null;
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                $vip[] = $item->id;
            }

            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"11"%\'')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

//            dd($cat);
        }
        else
        {
            $cat = CatConstruct::where('status','=','1')
                ->whereRaw('for_type like \'%"11"%\'')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        $config =
            [
                'center' => '13.7646393,100.5378279',
                'zoom' => 'auto',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        // ### VIP
        if($catVip != null && count($catVip) > 0)
        {
            foreach($catVip as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('apartment/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        // General
        if($cat != null && count($cat) > 0)
        {
            foreach($cat as $item)
            {
                if($item->latitude != null && $item->latitude != "" &&
                    $item->longitude != null && $item->longitude != "")
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
                                '<h5><a href="'.url('apartment/').'/'.$item->id.'" target="_blank">'.$item->title.'</a></h5>'.
                                '<p><strong>บริษัทเจ้าของโครงการ</strong> : '.($brand == null? "" : $brand->brand_name).'</p>'.
                                '<p><strong>ที่ตั้งโครงการ</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($item->id)).'</p>'.
                                '<p><strong>ราคาเริ่มต้น</strong> : '.$item->sell_price.' &nbsp;&nbsp;บาท</p>'.
                                '<p><strong>เบอร์ติดต่อ</strong> : '.(($brand == null? "" : $brand->telephone)).'</p>'.
                                '<p><strong>เว็บไซต์</strong> : '.$item->website.'</p>'.
                                '</div>'.
                                '</div>'
                        ];
                    Gmaps::add_marker($marker);
                }
            }
        }

        $map = Gmaps::create_map();

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"15"%\' and visible = true')  // 15 = อพาร์ทเม้นท์
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.apartment_index')
            ->with('catVip', $catVip)
            ->with('cat', $cat)
            ->with('map', $map)
            ->with('articleItems', $articleItems);

    }

    public function apartment_show($id)
    {
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->orderBy('id','asc')->get();
        $pic = $catConstruct->picture()->orderBy('id','asc')->get();

        $config =
            [
                'center' => $catConstruct->latitude.','.$catConstruct->longitude,
                'zoom' => '12',
                'scrollwheel' => false
            ];

        Gmaps::initialize($config);

        $marker =
            [
                'position' => $catConstruct->latitude.','.$catConstruct->longitude,
                'draggable' => false,
                'infowindow_content' =>
                    '<div style="width: 100%; padding-top: 20px; padding-bottom: 20px;">'.
                    '<div style="width: 50%; float:left;">'.
                    '<img src="'.Brand::getPathLogo($brand->id).'"'.
                    'alt="" style="max-width: 90%; height: auto;" />'.
                    '</div>'.
                    '<div style="width: 50%; float:left;">'.
                    '<h5><a href="'.url('rent').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.construct_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
            ->with('tag', $tag)
            ->with('pic',$pic)
            ->with('brand', $brand);
    }
}