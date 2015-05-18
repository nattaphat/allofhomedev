<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'project';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function catHome()
 	{
 		return $this->hasMany('App\Models\CatHome');
 	}

    public function catReview()
    {
        return $this->hasMany('App\Models\CatReview');
    }

    public function promotion()
    {
        return $this->belongsToMany('App\Models\Promotion');
    }

    public function facility()
    {
        return $this->belongsToMany('App\Models\Facility', 'project_facility');
    }

    public function projectRating()
    {
        return $this->hasMany('App\Models\ProjectRating');
    }

    public function bts()
    {
        return $this->belongsToMany('App\Models\Bts', 'shop_project_bts');
    }

    public function mrt()
    {
        return $this->belongsToMany('App\Models\Mrt', 'shop_project_mrt');
    }

    public function airportRailLink()
    {
        return $this->belongsToMany('App\Models\AirportRailLink',
            'shop_project_aplink', 'project_id', 'apl_id');
    }
}
