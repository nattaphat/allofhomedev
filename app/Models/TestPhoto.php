<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPhoto extends Model {

    protected $table = 'test_photo';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = array('path');

    public function imageable()
    {
        return $this->morphTo();
    }

}
