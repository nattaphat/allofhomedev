<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class CatConstruct extends Model {

    use SearchableTrait;

    protected $table = 'cat_construct';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $searchable = [
        'columns' => [
            'title' => 10,
            'subtitle' => 10
        ],
    ];

    public static function getFullPrjAddress($cat_construct_id)
    {
        $catHome = CatConstruct::find($cat_construct_id);

        $ret = "";
        $tambon = null;
        $amphoe = null;
        $province = null;

        if($catHome->tambid != null) {
            $tambon = Tambon::where('tambid', '=', $catHome->tambid)
                ->where('amphid', '=', $catHome->amphid)
                ->where('provid', '=', $catHome->provid)->get();

            $ret .= ($catHome->provid == 10? "แขวง" : "ตำบล").$tambon[0]->name." ";
        }

        if($catHome->amphid != null) {
            $amphoe = Amphoe::where('amphid', '=', $catHome->amphid)
                ->where('provid', '=', $catHome->provid)->get();

            $ret .= ($catHome->provid == 10? "เขต" : "อำเภอ").$amphoe[0]->name." ";
        }

        if($catHome->provid != null) {
            $province = Provinces::where('provid', '=', $catHome->provid)->get();
            $ret .= "จังหวัด".$province[0]->name;
        }

        if($catHome->add_street != null && $catHome->add_street != "")
        {
            $ret = "ถนน".$catHome->add_street." ".$ret;
        }

        if($catHome->add_floor != null && $catHome->add_floor != "")
        {
            $ret = "ชั้น ".$catHome->add_floor." ".$ret;
        }

        if($catHome->add_building != null && $catHome->add_building != "")
        {
            $ret = "ตึก/อาคาร ".$catHome->add_building." ".$ret;
        }

        if($catHome->add_no != null && $catHome->add_no != "")
        {
            $ret = "เลขที่ ".$catHome->add_no." ".$ret;
        }

        return $ret;
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
