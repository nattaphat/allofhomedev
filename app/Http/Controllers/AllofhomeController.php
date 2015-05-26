<?php namespace App\Http\Controllers;

use Config;
use App\Models\geoRegion;
use Request;
use Validator;
use Response;
use Input;
use File;

class AllofhomeController extends Controller {

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->fb = \Socialize::with("facebook");
        $this->middleware('guest');
    }

    public function test()
    {
        $m = new geoRegion();
        return 'yes';
    }
    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        // if (\Input::has('code'))
        //    {
        //        $user = $this->fb->user();

        //        // var_dump($this->fb->user());
        //        print 'yes';exit;
        //    }
        // $user = \Socialize::with('facebook')->user();
        // echo $this->fb->user()->getEmail();
        // $user->getNickname();
        // $user->getName();
        // echo $user->getEmail();
        // $user->getAvatar();

        return view('web.index');
    }


//    public function login()
//    {
//        return view('web.frontend.signin');
//    }

    public function about_ex()
    {
        return view('web.aboutex');
    }

    public function about()
    {
        return view('web.about');
    }

    public function about_me()
    {
        return view('web.aboutme');
    }

    public function teamlist()
    {
        return view('web.teamlist');
    }

    public function teamgrid()
    {
        return view('web.teamgrid');
    }

    public function teammemb()
    {
        return view('web.teammemb');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function pricing()
    {
        return view('web.pricing');
    }

    public function pricing_table()
    {
        return view('web.pricing_table');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function timeline()
    {
        return view('web.timeline');
    }

    public function timelineleft()
    {
        return view('web.timeleft');
    }

    public function timelineright()
    {
        return view('web.timeright');
    }

    public function timelinestacked()
    {
        return view('web.timelinestacked');
    }

    public function custumers()
    {
        return view('web.custumers');
    }

    public function features()
    {
        return view('web.features');
    }

    public function signup()
    {
        $user = \Socialize::with('facebook')->user();

        return view('web.signup');
    }

    public function starter()
    {
        return view('web.starter');
    }

    public function index_boxed()
    {
        return view('web.index_boxed');
    }

    public function blog()
    {
        if (\Auth::check())
        {
            echo "test";//return view('web.blog');
        } else
        {
            return redirect('/login');
        }
    }

    public function blogleft()
    {
        return view('web.blogleft');
    }

    public function blogtimeline()
    {
        return view('web.blogtimeline');
    }

    public function bloggrid()
    {
        return view('web.blogtimeline');
    }

    public function blogpost()
    {
        return view('web.blogpost');
    }

    public function blogvdo()
    {
        return view('web.blogpostvdo');
    }

    public function blogpostslide()
    {
        return view('web.blogpostslide');
    }

    public function blogpostaudio()
    {
        return view('web.blogpostaudio');
    }

    public function sliderdefault()
    {
        return view('web.slider_default');
    }

    public function sliderfull()
    {
        return view('web.slide_full');
    }

    public function sliderbehide()
    {
        return view('web.slide_behide');
    }

    public function sliderboxed()
    {
        return view('web.slide_boxed');
    }

    public function backstretch()
    {
        return view('web.backstretch');
    }

    public function backstretchboxed()
    {
        return view('web.backstretchboxed');
    }

    public function flexslider_default()
    {
        return view('web.flexslider_default');
    }

    public function flexslider_full()
    {
        return view('web.flexslider_full');
    }

    public function flexslider_behide()
    {
        return view('web.flexslider_behide');
    }

    public function flexslider_boxed()
    {
        return view('web.flexslider_boxed');
    }

    public function elements()
    {
        return view('web.elements');
    }

    public function colours()
    {
        return view('web.colours');
    }

    public function bs_mobilemenu()
    {
        return view('web.bs_mobilemenu');
    }

    public function createPost()
    {
        return view('web.frontend.createPost');
    }

    ////// #### Upload Pictures with dropzone
    public function post_upload()
    {
        $extension = Input::file('file')->guessClientExtension();
        $filename = sha1(time().time()).".{$extension}";
        $directory = __DIR__.'/../../../public/uploads';
        $filesize = Input::file('file')->getClientSize();
        Input::file('file')->move($directory,$filename);
        return asset('uploads/')."/".$filename;  // return url path
    }


    ///// แก้ให้มองไม่เห็น Layout //////
    public function login()
    {
        return view('web.frontend.login');
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
            return redirect('login')
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

                return redirect('/');

            } else {
                return redirect('login')
                    ->withErrors(['msg'=>'User is not found.'])
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
        return redirect('login');
    }

}

