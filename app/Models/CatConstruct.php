<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatConstruct extends Model {

    protected $table = 'cat_construct';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public static function getFullPrjAddress($cat_construct_id)
    {
        $catHome = CatConstruct::find($cat_construct_id);
        $tambon = Tambon::where('tambid','=',$catHome->tambid)
            ->where('amphid','=', $catHome->amphid)
            ->where('provid','=', $catHome->provid)->get();
        $amphoe = Amphoe::where('amphid','=', $catHome->amphid)
            ->where('provid','=', $catHome->provid)->get();
        $province = Provinces::where('provid','=', $catHome->provid)->get();

        return "ถนน".$catHome->add_street." "
        .($catHome->provid == 10? "แขวง" : "ตำบล").$tambon[0]->name." "
        .($catHome->provid == 10? "เขต" : "อำเภอ").$amphoe[0]->name." "
        ."จังหวัด".$province[0]->name;
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    /*  Morph */
    public function picture()
    {
        return $this->morphMany('App\Models\Picture', 'pictureable');
    }

    public function tag()
    {
        return $this->morphMany('App\Models\Tag', 'tagable');
    }

    /* Belong to many */
    public function tagSub()
    {
        return $this->belongsToMany('App\Models\TagSub', 'tag', 'cat_construct_id', 'tag_sub_id' );
    }

}
