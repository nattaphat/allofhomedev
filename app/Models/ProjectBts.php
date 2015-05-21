<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectBts extends Model {

    protected $table = 'project_bts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function project_btsable()
    {
        return $this->morphTo();
    }

}
