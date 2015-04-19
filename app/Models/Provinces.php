<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\geoRegion;

class Provinces extends Model {

    protected $table = 'geo_province';
    protected $primaryKey = 'provid';
    public $timestamps = false;

    public function region()
    {
        return $this->belongsTo('App\Models\geoRegion','region_id');
    }

    public function amphoe()
    {
        return $this->belongsTo('App\Models\Amphoe');
    }

    public function getAllProvince()
    {
//        $phone = Provinces::find(10)->region->name;
//        dd($phone);exit;
        return Provinces::orderBy('name')->get();
    }
}
