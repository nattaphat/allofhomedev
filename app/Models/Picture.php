<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $table = 'picture';
    protected $primaryKey = 'id';
    public $timestamps = false;

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

}
