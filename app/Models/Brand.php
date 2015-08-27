<?php namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    use Eloquence;

    protected $table = 'brand';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $searchableColumns = [
        'brand_name' => 10,
        'telephone' => 1,
        'email' => 1,
        'facebook' => 1,
        'line' => 1,
        'fax' => 1
    ];

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

    public function catConstruct()
    {
        return $this->hasMany('App\Models\CatConstruct');
    }

}
