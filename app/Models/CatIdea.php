<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatIdea extends Model {

    protected $table = 'cat_idea';
    protected $primaryKey = 'id';
    public $timestamps = true;



    public function user()
    {
        return $this->belongsTo("App\User");
    }



    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function picture()
    {
        return $this->hasMany('App\Models\Picture');
    }

    public function tagSub()
    {
        return $this->belongsToMany('App\Models\TagSub', 'tag', 'cat_home_id', 'tag_sub_id' );
    }

}
