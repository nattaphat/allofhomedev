<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tag';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function tagSub()
    {
        return $this->belongsTo('App\Models\TagSub', 'tag_sub_id');
    }

}
