<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'project';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // belongsTo
    public function user()  // create_by
    {
        return $this->belongsTo("App\User");
    }

    public function attachment()
    {
        return $this->belongsTo("App\Models\Attachment");
    }

    public function tambon()
    {
        return $this->belongsTo("App\Models\Tambon");
    }

    public function region()
    {
        return $this->belongsTo("App\Models\GeoRegion");
    }

    public function area()
    {
        return $this->belongsTo("App\Models\Area");
    }

    public function subarea()
    {
        return $this->belongsTo("App\Models\SubArea");
    }

    // Morph
    public function bts()
    {
        return $this->morphMany('App\Models\Bts', 'project_btsable');
    }

    public function mrt()
    {
        return $this->morphMany('App\Models\Mrt', 'project_mrtable');
    }

    public function airportRailLink()
    {
        return $this->morphMany('App\Models\AirportRailLink', 'project_aplinkable');
    }

    public function facility()
    {
        return $this->morphMany('App\Models\Facility', 'project_facilityable');
    }

    // Has
    public function projectRating()
    {
        return $this->hasMany('App\Models\ProjectRating');
    }

    public function catHome()
    {
        return $this->hasMany('App\Models\CatHome');
    }

    public function catReview()
    {
        return $this->hasMany('App\Models\CatReview');
    }
}
