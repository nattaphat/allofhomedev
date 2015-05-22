<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model {

    protected $table = 'facility';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = array('fac_name');

    public function project_facilityable()
    {
        return $this->morphTo();
    }

    public static function getFacilityName($id)
    {
        $fac = Facility::find($id);
        return $fac->fac_name;
    }

}