<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;

use App\Models\salary;

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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fb = \Socialize::with("facebook");
        $this->salaryObj = new salary();
        $this->middleware('guest');
    }

    public function signup()
    {
        $rs_salary = $this->salaryObj->getAllSalary();
        return view('web.frontend.signup')
                    ->with('salary',$rs_salary);
    }

}

