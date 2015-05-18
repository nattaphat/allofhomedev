<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mrt extends Model {

    protected $table = 'mrt';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function mrtRoute()
    {
        return $this->belongsTo('App\Models\MrtRoute', 'route_id');
    }

    public function project()
    {
        return $this->belongsToMany('App\Models\Project', 'shop_project_mrt');
    }
}
