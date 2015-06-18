<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'category';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public static function getCategoryName($id)
    {
        return Category::find($id)->category_name;
    }


}
