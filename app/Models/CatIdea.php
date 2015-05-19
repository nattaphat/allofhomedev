<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatIdea extends Model {

    protected $table = 'cat_idea';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['user_id','title', 'subtitle', 'other_detail', 'video_url'];

    /// belongsTo
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    // Morph
    public function comment()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function picture()
    {
        return $this->morphMany('App\Models\Picture', 'pictureable');
    }

    public function tag()
    {
        return $this->morphMany('App\Models\Tag', 'tagable');
    }

}
