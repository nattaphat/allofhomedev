<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirportRailLink extends Model {

    protected $table = 'airport_link';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function project_aplinkable()
    {
        return $this->morphTo();
    }

    public static function getAirportRailLink()
    {
        return AirportRailLink::where('status','=','true')->get();
    }

    public static function getAplinkName($id)
    {
        $apl = AirportRailLink::find($id);
        return $apl->apl_name;
    }
}
