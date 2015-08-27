<?php namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class CatArticle extends Model {

    use Eloquence;

    protected $table = 'cat_article';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $searchableColumns = [
        'title' => 10,
        'subtitle' => 9,
        'other_detail' => 8
    ];

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
