<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirportRailLink extends Model {

    protected $table = 'airport_link';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function project()
    {
        return $this->belongsToMany('App\Models\Project',
            'shop_project_aplink', 'apl_id', 'project_id');
    }
}
