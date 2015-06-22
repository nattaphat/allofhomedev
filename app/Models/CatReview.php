<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatReview extends Model {

    protected $table = 'cat_review';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function tagSub()
    {
        return $this->belongsToMany('App\Models\TagSub', 'tag', 'cat_home_id', 'tag_sub_id' );
    }

    // Morph
    public function reviewable()
    {
        return $this->morphTo();
    }

    public function tag()
    {
        return $this->morphMany('App\Models\Tag', 'tagable');
    }

    public function picture()
    {
        return $this->morphMany('App\Models\Picture', 'pictureable');
    }

    public function comment()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

}
