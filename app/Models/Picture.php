<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $table = 'picture';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public static function getUrlPicture($id, $model)
    {
        $picture = Picture::where('pictureable_type', '=', $model)
            ->where('pictureable_type','=', $id)
            ->get();
        return $picture;
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
    public function pictureable()
    {
        return $this->morphTo();
    }

}
