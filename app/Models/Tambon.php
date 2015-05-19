<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tambon extends Model {

    protected $table = 'geo_tambon';
    protected $primaryKey = 'tambid';
    public $timestamps = false;

    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'provid, amphid, tambid');
    }

    public function project()
    {
        return $this->hasMany("App\Models\Project");
    }

}
