<?php namespace App\Http\Controllers\Backend;

use Config;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;
use Validator;

class BackendLoginController extends Controller {

    use AuthenticatesAndRegistersUsers;

    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function index()
    {
        return view('web.backend.login');
    }

    public function post_login()
    {
        $data = Request::all();

        (isset($data['rememberme']))? $remember = true : $remember=false;

        $rules = [
            'email_or_username' => 'required',
            'password' => 'required'
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
            return redirect('backend/login')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        }
        else{
            if (\Auth::attempt(array(
                    'email'     => $data['email_or_username'],
                    'password'  => $data['password']
                ),$remember) ||
                \Auth::attempt(array(
                    'username'  => $data['email_or_username'],
                    'password'  => $data['password']
                ),$remember)) {

                // admin or superadmin
                $user = User::where('username','=',$data['email_or_username'])
                    ->whereIn('role',[1,2])
                    ->get();

                $user2 = User::where('email','=',$data['email_or_username'])
                    ->whereIn('role',[1,2])
                    ->get();

                if(count($user) == 0 && count($user2) == 0)
                {
                    if (\Auth::check())
                        \Auth::logout();

                    // User not allowed
                    return redirect('backend/login')
                        ->withErrors(['msg'=>'Permission, user is not allowed to access !'])
                        ->withInput(\Input::except('password'));
                }
                else
                {
                    return redirect('backend/index');
                }
            } else {
                return redirect('backend/login')
                    ->withErrors(['msg'=>'User not found or you are not allowed.'])
                    ->withInput(\Input::except('password'));
            }
        }
    }

    public function logout()
    {
        if (\Auth::check())
        {
            \Auth::logout();
        }
        return redirect('backend/login');
    }

}