<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bts extends Model {

    protected $table = 'bts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function btsRoute()
    {
        return $this->belongsTo('App\Models\BtsRoute', 'route_id');
    }

    public function bts()
    {
        return $this->belongsToMany('App\Models\Project', 'shop_project_bts');
    }

}
