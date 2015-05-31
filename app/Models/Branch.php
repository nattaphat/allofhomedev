<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model {

    protected $table = 'branch';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function tambon()
    {
        return $this->belongsTo("App\Models\Tambon", 'provid, amphid, tambid');
    }

    // Morph
    public function catReview()
    {
        return $this->morphMany('App\Models\CatReview', 'reviewable');
    }

}
