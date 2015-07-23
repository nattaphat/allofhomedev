<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

    protected $table = 'picture';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected  $fillable = [
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'description'
    ];

    public static function getUrlPicture($id, $model)
    {
        $picture = Picture::where('pictureable_type', '=', $model)
            ->where('pictureable_id','=', $id)
            ->get();
        return $picture;
    }

    // Morph
    public function pictureable()
    {
        return $this->morphTo();
    }

}
