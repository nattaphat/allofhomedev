<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatConstructRating extends Model {

    protected $table = 'cat_construct_rating';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function catConstruct()
    {
        return $this->belongsTo('App\Models\CatConstruct');
    }

}
