<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model {

    protected $table = 'my_list';
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function catHome()
    {
        return $this->belongsTo("App\Models\CatHome");
    }


}
