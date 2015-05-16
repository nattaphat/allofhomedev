<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestOrder extends Model {

    protected $table = 'test_order';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function photos()
    {
        return $this->morphMany('App\Models\TestPhoto', 'imageable');
    }

}
