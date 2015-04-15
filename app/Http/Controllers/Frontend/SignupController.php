<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;

use App\Models\Salary;
use App\Models\Provinces;

class SignupController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */
    public $fb;
    public $salaryObj;
    public $provObj;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fb = \Socialize::with("facebook");
        $this->salaryObj = new Salary();
        $this->provObj = new Provinces();
        $this->middleware('guest');
    }

    /**
     * @return $this
     */
    public function signup()
    {
        $rs_salary = $this->salaryObj->getAllSalary();
        $rs_prov = $this->provObj->getAllProvince();

        return view('web.frontend.signup')
                    ->with('salary',$rs_salary)
                    ->with('prov',$rs_prov);
    }

}

