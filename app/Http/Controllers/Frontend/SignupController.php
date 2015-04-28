<?php namespace App\Http\Controllers\Frontend;

use Config;
use App\Http\Controllers\Controller;

use App\Models\Salary;
use App\Models\Provinces;
use Request;
use Validator;
use App\User;

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
    public $userObj;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->salaryObj = new Salary();
        $this->provObj = new Provinces();
        $this->userObj = new User();
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
            'username' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
        $messages = [
            'email' => 'Invalid :attribute format.',
            "g-recaptcha-response.required" => 'Verify you are not robot.',
            'required' => 'The :attribute field is required.',
        ];

        $validator = Validator::make(
            $data,
            $rules,
            $messages
        );

        if ($validator->fails())
        {
            return redirect('signup')
                ->withErrors($validator)
                ->withInput(\Input::except(array('password', 'password_confirmation')));
        }
        else{
            $user = User::where('email', '=', \Input::get('email'))
                            ->orWhere('username','=',\Input::get('username'))
                            ->exists();
            if($user){// user exists
                return redirect('signup')
                        ->withErrors(['msg'=>'Your email or username already registered.'])
                        ->withInput(\Input::except(array('password', 'password_confirmation')));
            } else {

                $this->userObj->username = $data['username'];
                $this->userObj->password = bcrypt($data['password']);
                $this->userObj->role = $data['role_id'];
                $this->userObj->firstname = $data['first_name'];
                $this->userObj->lastname = $data['last_name'];
                $this->userObj->email = $data['email'];
                $this->userObj->signup_type = 'regular';
                $this->userObj->save();

                (isset($data['rememberme']))? $remember = true : $remember=false;
                \Auth::attempt(
                    array(
                        'email'     => $data['email'],
                        'password'  => $data['password']
                    ),
                    $remember);

                \Session::flash('notifyUser', 'Message|Register completed and Welcome to AllOfHome.|success');
                return redirect('/');
//                //Carbon::now();
            }
        }
    }//end func

}

