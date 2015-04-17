<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}

    public function getEmail()
    {
        return view('web.frontend.forgotpwd');
    }

    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = $this->passwords->sendResetLink($request->only('email'), function($m)
        {
            $m->subject($this->getEmailSubject());
        });

        switch ($response)
        {
            case PasswordBroker::RESET_LINK_SENT:
                return redirect()->back()->withErrors(['email_sent' => trans($response)]);

            case PasswordBroker::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    public function getReset($token = null)
    {
        $token = "cdb37c6a1b1f87d6d5169c9984233f08a8caba4b488ca0ebe497284007f515bd";
        if (is_null($token))
        {
            throw new NotFoundHttpException;
        }

        return view('web.frontend.resetpwd')->with('token', $token);
    }

    public function postReset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = $this->passwords->reset($credentials, function($user, $password)
        {
            $user->password = bcrypt($password);

            $user->save();

            $this->auth->login($user);
        });

        switch ($response)
        {
            case PasswordBroker::PASSWORD_RESET:
                return redirect($this->redirectPath());

            default:
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
        }
    }
}
