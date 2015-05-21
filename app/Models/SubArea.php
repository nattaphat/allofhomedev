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

    public function project()
    {
        return $this->hasMany("App\Models\Project");
    }

    public static function getSubArea($id)
    {
        return SubArea::where('area_id', '=', $id)->orderBy('subarea_name')->get();
    }
}
