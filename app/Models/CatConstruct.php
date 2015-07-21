<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatConstruct extends Model {

    protected $table = 'cat_construct';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public static function getFullPrjAddress($cat_construct_id)
    {
        return "";

//        $catHome = CatConstruct::find($cat_construct_id);
//        $tambon = Tambon::where('tambid','=',$catHome->tambid)
//            ->where('amphid','=', $catHome->amphid)
//            ->where('provid','=', $catHome->provid)->get();
//        $amphoe = Amphoe::where('amphid','=', $catHome->amphid)
//            ->where('provid','=', $catHome->provid)->get();
//        $province = Provinces::where('provid','=', $catHome->provid)->get();
//
//        $ret = ($catHome->provid == 10? "แขวง" : "ตำบล").$tambon[0]->name." "
//            .($catHome->provid == 10? "เขต" : "อำเภอ").$amphoe[0]->name." "
//            ."จังหวัด".$province[0]->name;
//
//        if($catHome->add_street != null && $catHome->add_street != "")
//        {
//            $ret = "ถนน".$catHome->add_street." ".$ret;
//        }
//
//        if($catHome->add_floor != null && $catHome->add_floor != "")
//        {
//            $ret = "ชั้น ".$catHome->add_floor." ".$ret;
//        }
//
//        if($catHome->add_building != null && $catHome->add_building != "")
//        {
//            $ret = "ตึก/อาคาร ".$catHome->add_building." ".$ret;
//        }
//
//        if($catHome->add_no != null && $catHome->add_no != "")
//        {
//            $ret = "เลขที่".$catHome->add_no." ".$ret;
//        }
//
//        return $ret;
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
