<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use DB;
class TagSub extends Model {

    protected $table = 'tag_sub';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function tagAll()
    {

        $rs = DB::table('tag_main')
            ->join('tag_sub','tag_main.id','=','tag_sub.tag_main_id')
            ->orderBy('tab_main.id')
            ->get();

        return $rs;
    }
    public function tagMain()
    {
        return $this->belongsTo('App\Models\TagMain');
    }

    public static function getTagSubName($tag_sub_id)
    {
        $ts = TagSub::find($tag_sub_id);
        return $ts->tag_sub_name;
    }



    public function tag()
    {
        return $this->hasOne('App\Models\Tag', 'tag_sub_id');
    }



    public function catHome()
    {
        return $this->belongsToMany('App\Models\CatHome', 'tag', 'tag_sub_id', 'cat_home_id' );
    }

    public function catReview()
    {
        return $this->belongsToMany('App\Models\CatReview', 'tag', 'tag_sub_id', 'cat_review_id' );
    }

    public function catIdea()
    {
        return $this->belongsToMany('App\Models\CatIdea', 'tag', 'tag_sub_id', 'cat_idea_id' );
    }

}
