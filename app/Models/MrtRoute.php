<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MrtRoute extends Model {

    protected $table = 'mrt_route';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function mrt()
    {
        return $this->hasMany('App\Models\Mrt', 'route_id');
    }

}
