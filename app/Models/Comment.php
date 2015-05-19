<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function catHome()
    {
        return $this->belongsTo("App\Models\CatHome");
    }

    public function catReview()
    {
        return $this->belongsTo("App\Models\CatReview");
    }

    public function catIdea()
    {
        return $this->belongsTo("App\Models\CatIdea");
    }


    // Morph
    public function commentable()
    {
        return $this->morphTo();
    }

}
