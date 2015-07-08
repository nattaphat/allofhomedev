<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class EnlargeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $catArticle = null;
        try{
            $catArticle = DB::table('cat_article as ch')
                ->join(DB::raw('
                    (
                        select distinct pictureable_id, pictureable_type from picture
                        where pictureable_type = \'App\\Models\\CatArticle\'
                    ) pic
                '), function($join){
                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
                })
                ->orderBy('ch.created_at', 'desc')
                ->take(5)
                ->get();
        }
        catch(\Exception $e)
        {

        }

        return view('web.frontend.enlarge_index')
            ->with('catArticle', $catArticle);
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
		//
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
