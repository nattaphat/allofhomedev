<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Models\Provinces;

class UserinfoController extends Controller {

    private $salaryObj;
    private $provObj;

	public function __construct()
    {
        $this->salaryObj = new Salary();
        $this->provObj = new Provinces();

    }

    public function userInfo()
    {
        $salary = $this->salaryObj->getAllSalary();
        $prov = $this->provObj->getAllProvince();

        return view('web.frontend.useraccount')
                ->with('salary',$salary)
                ->with('prov', $prov);
    }

}
