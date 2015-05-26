<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PicLayout extends Model {

    protected $table = 'pic_layout';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public $fillable = [
        'cat_home_id','type','filename','filetype','filesize','filepath'
    ];

    public function catHome()
    {
        return $this->belongsTo('App\Models\CatHome');
    }

}
