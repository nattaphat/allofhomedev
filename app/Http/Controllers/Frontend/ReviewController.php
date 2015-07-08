<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CatHome;
use App\Models\CatHomePic;
use DB;
use Gmaps;
use App\Models\Brand;

use Illuminate\Http\Request;

class ReviewController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
                ->whereRaw('ch.status = 1 and ch.review_status = 1')
                ->select('ch.*')
                ->orderByRaw('case when vip.id is not null then 1 else 0 end desc')
                ->orderBy('ch.created_at', 'desc')
                ->paginate(15);

        }
        catch(\Exception $e)
        {

        }

        return view('web.frontend.review_index')
            ->with('catHome', $catHome);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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

        return view('web.frontend.review_view')
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
