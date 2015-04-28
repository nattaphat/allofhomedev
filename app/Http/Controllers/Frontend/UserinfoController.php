<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Models\Provinces;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class UserinfoController extends Controller {

    private $salaryObj;
    private $provObj;

    /**
     * @param Guard $auth
     */
	public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->salaryObj = new Salary();
        $this->provObj = new Provinces();

    }

    /**
     * @return $this
     */
    public function userInfo()
    {
        $salary = $this->salaryObj->getAllSalary();
        $userInfo = Auth::user();
        return view('web.frontend.useraccount')
                ->with('salary',$salary)
                ->with('userInfo',$userInfo);
    }

    /**
     *
     */
    public function postUpdateInfo()
    {

    }

    /**
     * 
     */
    public function userChangPwd()
    {

    }

}
