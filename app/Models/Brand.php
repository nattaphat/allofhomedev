<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    protected $table = 'brand';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public static function getBrandName($id)
    {
        return Brand::find($id)->brand_name;
    }

    public static function getPathLogo($id)
    {
        $brand = Brand::find($id);
        $attachment = Attachment::find($brand->attachment_id);
        return $attachment->path;
    }

    public function catHome()
    {
        return $this->hasMany('App\Models\CatHome');
    }

}
