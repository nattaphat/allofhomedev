<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRating extends Model {

    protected $table = 'project_rating';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

}
