<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

    protected $table = 'attachment';
    protected $primaryKey = 'id';
    public $timestamps = false;



    public function banner()
    {
        return $this->hasOne("App\Models\Banner");
    }

    public function project()
    {
        return $this->hasOne("App\Models\Project");
    }



}
