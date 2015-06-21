<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatHomePic extends Model {

    protected $table = 'cat_home_pic';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected  $fillable = [
        'cat_home_id',
        'pic_for',
        'filename',
        'filesize',
        'filetype',
        'filepath',
        'description',
        'thumbnail'
    ];

    public function catHome()
    {
        return $this->belongsTo('App\Models\CatHome');
    }

}
