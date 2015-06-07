<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatHome extends Model {

    protected $table = 'cat_home';
    protected $primaryKey = 'id';
    public $timestamps = true;



    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }



    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function myList()
    {
        return $this->hasMany('App\Models\MyList');
    }

    public function picture()
    {
        return $this->morphMany('App\Models\Picture', 'pictureable');
    }

    public function tag()
    {
        return $this->morphMany('App\Models\Tag', 'tagable');
    }

    public function picLayout()
    {
        return $this->hasMany('App\Models\PicLayout');
    }

    public function catHomePromotion()
    {
        return $this->hasMany('App\Models\CatHomePromotion');
    }

    public function catHomePic()
    {
        return $this->hasMany('App\Models\CatHomePic');
    }


    public function tagSub()
    {
        return $this->belongsToMany('App\Models\TagSub', 'tag', 'cat_home_id', 'tag_sub_id' );
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

}
