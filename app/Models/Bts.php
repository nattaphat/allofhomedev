<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bts extends Model {

    protected $table = 'bts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function btsRoute()
    {
        return $this->belongsTo('App\Models\BtsRoute', 'route_id');
    }

    public static function getBts()
    {
//        return DB::table('bts')
//            ->join('bts_route', 'bts_route.id', '=', 'bts.route_id')
//            ->where('bts.status','=','true')
//            ->select('bts_route.name', 'bts.bts_name as bts_name', 'bts.id',
//                DB::raw('bts_route.name || \' - \' || bts.bts_name as full_name') )
//            ->orderBy('bts_route.id', 'bts.id')
//            ->get();

        return Bts::where('status','=','true')->get();
    }

}
