<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amphoe extends Model {

    protected $table = 'geo_amphoe';
    protected $primaryKey = array('provid','amphid');
    public $timestamps = false;

    public function provinces()
    {
        return $this->hasMany('App\Models\Provinces');
    }

    public function getAmphoeByProvid()
    {
        $rs = Amphoe::find(18);
    }
}
