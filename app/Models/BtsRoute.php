<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BtsRoute extends Model {

    protected $table = 'bts_route';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function bts()
    {
        return $this->hasMany('App\Models\Bts', 'route_id');
    }

}
