<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salary extends Model {

    protected $table = 'salary';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getAllSalary()
    {
        return salary::all();
    }
}
