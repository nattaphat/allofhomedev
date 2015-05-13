<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model {

    protected $table = 'promotion';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = array('promotion_name');
}