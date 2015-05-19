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
}