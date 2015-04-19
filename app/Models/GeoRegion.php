<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeoRegion extends Model {
    protected $table = 'geo_region';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function provinces()
    {
        return $this->hasOne('App\Models\Provinces');
    }
}
