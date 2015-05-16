<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestStaff extends Model {

    protected $table = 'test_staff';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function photos()
    {
        return $this->morphMany('App\Models\TestPhoto', 'imageable');
    }

}
