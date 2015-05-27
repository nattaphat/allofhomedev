<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatHomePromotion extends Model {

    protected $table = 'cat_home_promotion';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected  $fillable = [
        'promotion_id', 'cat_home_id'
    ];

    public function catHome()
    {
        return $this->belongsTo('App\Models\CatHome');
    }
}
