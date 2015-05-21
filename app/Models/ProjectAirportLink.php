<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectAirportLink extends Model {

    protected $table = 'project_aplink';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function project_aplinkable()
    {
        return $this->morphTo();
    }
}
