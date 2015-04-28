<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Models\Provinces;
use Illuminate\Support\Facades\Auth;
use Validator;


class UserinfoController extends Controller {

    private $salaryObj;
    private $provObj;
    private $currentUserObj;

    /**
     * @param Guard $auth
     */
	public function __construct(Request $request)
    {
        $this->auth = Auth::user();
        $this->currentUserObj = $request->user();
        $this->salaryObj = new Salary();
        $this->provObj = new Provinces();

    }

    /**
     * @return $this
     */
    public function userInfo()
    {
        $salary = $this->salaryObj->getAllSalary();
        return view('web.frontend.useraccount')
                ->with('salary',$salary)
                ->with('userInfo',$this->auth);
    }

    /**
     *
     */
    public function postUpdateInfo()
    {
        $data = \Input::all();
        $this->currentUserObj->firstname = $data['first_name'];
        $this->currentUserObj->lastname = $data['last_name'];
        $this->currentUserObj->salary_id = $data['salary'];
        $this->currentUserObj->telephone = $data['telephone'];
        $this->currentUserObj->birthday = $data['birthday'];
        $this->currentUserObj->sex = $data['sex'];
        $this->currentUserObj->address = $data['address'];
        $this->currentUserObj->occupation = $data['occupation'];
        $this->currentUserObj->receive_news = $data['newsletter'];
        $this->currentUserObj->save();

        return redirect()->back()->withErrors(['msg' => "Your account info updated."]);
    }

    /**
     * 
     */
    public function userChangePwd()
    {
        return view('web.frontend.userchangepwd');
    }

    public function postUserChangePwd()
    {
        $data = \Input::all();
        $rules = [
            'current_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        ];
        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        $validator = Validator::make(
            $data,
            $rules,
            $messages
        );

        if ($validator->fails())
        {
            return redirect('user/passwd')
                ->withErrors($validator);
        }
        else{

            $chk_pwd = \Hash::check($data['current_password'],$this->currentUserObj->password);
            if(! $chk_pwd){// invalid passwd
                return redirect('user/passwd')
                    ->withErrors(['msg'=>'Invalid current password.']);
            } else {

                $this->currentUserObj->password = bcrypt($data['password']);
                $this->currentUserObj->save();

                return redirect('user/passwd')
                    ->withErrors(['msg'=>'Your password had been changed.']);
            }
        }
    }

}
