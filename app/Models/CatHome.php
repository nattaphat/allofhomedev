<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatHome extends Model {

    protected $table = 'cat_home';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public static function getFullPrjAddress($cat_home_id)
    {
        $catHome = CatHome::find($cat_home_id);
        $tambon = Tambon::where('tambid','=',$catHome->tambid)
            ->where('amphid','=', $catHome->amphid)
            ->where('provid','=', $catHome->provid)->get();
        $amphoe = Amphoe::where('amphid','=', $catHome->amphid)
            ->where('provid','=', $catHome->provid)->get();
        $province = Provinces::where('provid','=', $catHome->provid)->get();

        return "ถนน".$catHome->add_street." "
        .($catHome->provid == 10? "แขวง" : "ตำบล").$tambon[0]->name." "
        .($catHome->provid == 10? "เขต" : "อำเภอ").$amphoe[0]->name." "
        ."จังหวัด".$province[0]->name;
    }

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
