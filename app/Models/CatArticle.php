<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatArticle extends Model {

    protected $table = 'cat_article';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function picture()
    {
        return $this->morphMany('App\Models\Picture', 'pictureable');
    }

    public function tag()
    {
        return $this->morphMany('App\Models\Tag', 'tagable');
    }

    public function comment()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
