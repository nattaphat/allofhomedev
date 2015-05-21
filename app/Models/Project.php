<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'project';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected  $fillable = [
        'user_id','project_name','project_company_owner','attachment_id',
        'lat','long','add_street','tambid','amphid','provid','region_id','area_id',
        'subarea_id','map_url','facebook','nearby_str','facility_str'
    ];

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
    public function projectBts()
    {
        return $this->morphMany('App\Models\ProjectBts', 'project_btsable');
    }

    public function projectMrt()
    {
        return $this->morphMany('App\Models\ProjectMrt', 'project_mrtable');
    }

    public function projectAplink()
    {
        return $this->morphMany('App\Models\ProjectAirportLink', 'project_aplinkable');
    }

    public function projectFacility()
    {
        return $this->morphMany('App\Models\ProjectFacility', 'project_facilityable');
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
