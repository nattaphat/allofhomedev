<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagMain extends Model {

    protected $table = 'tag_main';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function tagSub()
    {
        return $this->hasMany('App\Models\TagSub');
    }

    public static function getTagMainName($id)
    {
        $tag = TagMain::find($id);
        return $tag->tag_main_name;
    }

}
