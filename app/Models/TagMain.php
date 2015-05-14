<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagMain extends Model {

    protected $table = 'tag_main';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function tagSub()
    {
        return $this->hasMany('App\Models\TagSub');
    }

}
