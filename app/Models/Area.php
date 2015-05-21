<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

    protected $table = 'area';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = array('area_name');

    public function subArea()
 	{
        return $this->hasMany('App\Models\SubArea');
 	}

    public function project()
    {
        return $this->hasMany("App\Models\Project");
    }

    public static function getAllArea()
    {
        return Area::orderBy('area_name')->get();
    }

}
