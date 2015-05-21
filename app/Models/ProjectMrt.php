<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMrt extends Model {

    protected $table = 'project_mrt';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function project_mrtable()
    {
        return $this->morphTo();
    }

}
