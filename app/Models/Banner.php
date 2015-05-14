<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {

    protected $table = 'banner';
    protected $primaryKey = 'id';
    public $timestamps = true;



    public function user()
    {
        return $this->belongsTo("App\User");
    }
    public function attachment()
    {
        return $this->belongsTo("App\Models\Attachment");
    }


}
