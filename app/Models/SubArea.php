<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubArea extends Model {

    protected $table = 'subarea';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = array('area_id', 'subarea_name');

    public function area()
 	{
        return $this->belongsTo('App\Models\Area');
 	}
}
