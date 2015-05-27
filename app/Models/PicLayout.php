<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public static function getPic($cat_home_id, $type)
    {
        $pic = DB::select(DB::raw("
            select * from pic_layout where cat_home_id = ".$cat_home_id." and type = '".$type."'
        "));

        return $pic;
    }
}
