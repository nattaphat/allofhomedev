<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;

use App\Models\Salary;
use App\Models\Provinces;
use Request;
use Validator;

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
    public $salaryObj;
    public $provObj;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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

    public function postSignup()
    {
        $data = Request::all();

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
        $messages = [
            'required' => 'The :attribute field is required.',
            'email' => 'Invalid :attribute format.',
        ];

        $validator = Validator::make(
            $data,
            $rules,
            $messages
        );

        if ($validator->fails())
        {
//            dd($validator->messages());
            return redirect('signup')
                ->withErrors($validator)
                ->withInput(\Input::except(array('password', 'password_confirmation')));
        }
        else{

            if(User::where('email', '=', Input::get('email'))->exists()){
                // user found
                \Session::flash('notifyUser', 'Message|Welcome to AllOfHome.|success');
                return redirect('/');
            } else {
                return redirect('login')
                    ->withErrors(['msg'=>'User not found or you not register yet.'])
                    ->withInput(\Input::except('password'));

                \Session::flash('notifyUser', 'Message|Welcome to AllOfHome.|success');
                return redirect('/');
                //Carbon::now();
            }
        }


    }

}

