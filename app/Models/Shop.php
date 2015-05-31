<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model {

    protected $table = 'shop';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    // Morph
    public function catReview()
    {
        return $this->morphMany('App\Models\CatReview', 'reviewable');
    }

}
