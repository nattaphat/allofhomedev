<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model {

    protected $table = 'salary';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllSalary()
    {
        return Salary::all();
    }
}
