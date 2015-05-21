<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFacility extends Model {

    protected $table = 'project_facility';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function project_facilityable()
    {
        return $this->morphTo();
    }

}
