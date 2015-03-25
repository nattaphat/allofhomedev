<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	// public function login(SocialLoginController $authenticateUser, Request $request)
	// {
	// 	$authenticateUser->execute($request->has('code'));
	// }

	public function facebooklogin(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
	{
		$login_url = $fb->getLoginUrl(['email']);
	    // Obviously you'd do this in blade :)
	    echo '<a href="' . $login_url . '">Login with Facebook</a>';
	}

	public function facebooklogined(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
	{
		// Obtain an access token.
		try {
			$token = $fb->getAccessTokenFromRedirect();
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
			dd($e->getMessage());
		}

		// Access token will be null if the user denied the request
		// or if someone just hit this URL outside of the OAuth flow.
		if (! $token) {
		    // Get the redirect helper
		    $helper = $fb->getRedirectLoginHelper();

		    if (! $helper->getError()) {
		        abort(403, 'Unauthorized action.');
		    }

		    // User denied the request
		    dd(
		        $helper->getError(),
		        $helper->getErrorCode(),
		        $helper->getErrorReason(),
		        $helper->getErrorDescription()
		    );
		}

		if (! $token->isLongLived()) {
		    // OAuth 2.0 client handler
		    $oauth_client = $fb->getOAuth2Client();

		    // Extend the access token.
		    try {
		        $token = $oauth_client->getLongLivedAccessToken($token);
		    } catch (Facebook\Exceptions\FacebookSDKException $e) {
		        dd($e->getMessage());
		    }
		}

		$fb->setDefaultAccessToken($token);

		// Save for later
		\Session::put('fb_user_access_token', (string) $token);

		// Get basic info on the user from Facebook.
		try {
		    $response = $fb->get('/me?fields=id,name,first_name,last_name,email,age_range,gender');
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
		    dd($e->getMessage());
		}

		// Convert the response to a `Facebook/GraphNodes/GraphUser` collection
		$facebook_user = $response->getGraphUser();
		dd($facebook_user);
		// Create the user if it does not exist or update the existing entry.
		// This will only work if you've added the SyncableGraphNodeTrait to your User model.
		//$user = App\User::createOrUpdateGraphNode($facebook_user);

		// Log the user into Laravel
		//Auth::login($user);

		//return redirect('/')->with('message', 'Successfully logged in with Facebook');
	}
}
