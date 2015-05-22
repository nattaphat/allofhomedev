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
        return Bts::where('status','=','true')->get();
    }

    public static function getBtsName($id)
    {
        $bts = Bts::find($id);
        return $bts->bts_name;
    }

}
