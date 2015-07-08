<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CatConstruct;
use DB;
use Gmaps;
use Illuminate\Http\Request;

class EnlargeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $cat = null;
        try{
            $cat = DB::table('cat_construct as ch')
                ->leftJoin(DB::raw('
                (
                    select id
                      from cat_construct
                      where vip = true
                      and for_type like \'%"2"%\'
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->join(DB::raw('
                    (
                        select distinct pictureable_id, pictureable_type from picture
                        where pictureable_type = \'App\\Models\\CatConstruct\'
                    ) pic
                '), function($join){
                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
                })
                ->whereRaw('ch.status = 1 and ch.for_type like \'%"2"%\'')
                ->select('ch.*')
                ->orderBy('ch.created_at', 'desc')
                ->paginate(15);
        }
        catch(\Exception $e)
        {

        }

//        dd($cat);

        return view('web.frontend.enlarge_index')
            ->with('cat', $cat);
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
        $catConstruct = CatConstruct::find($id);
        $brand = Brand::find($catConstruct->brand_id);

        $tag = $catConstruct->tag()->get();
        $pic = $catConstruct->picture()->get();

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
                    '<h5><a href="'.url('construct').'/'.$catConstruct->id.'" target="_blank">'.$catConstruct->title.'</a></h5>'.
                    '<p><strong>ที่ตั้งร้านค้า</strong> : '.(\App\Models\CatConstruct::getFullPrjAddress($catConstruct->id)).'</p>'.
                    '<p><strong>เบอร์ติดต่อ</strong> : '.$brand->telephone.'</p>'.
                    '<p><strong>เว็บไซต์</strong> : '.$catConstruct->website.'</p>'.
                    '</div>'.
                    '</div>'
            ];
        Gmaps::add_marker($marker);

        $map = Gmaps::create_map();

        return view('web.frontend.enlarge_view')
            ->with('map',$map)
            ->with('catConstruct', $catConstruct)
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
