<?php namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CatArticle;
use App\Models\CatConstruct;
use App\Models\Category;
use App\Models\CatHome;
use App\Models\CatIdea;
use App\Models\CatReview;
use App\Models\Tag;
use App\Models\TagSub;
use Config;
use App\Models\geoRegion;
use Request;
use Validator;
use Response;
use Input;
use File;
use DB;

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


//        $catHome = null;
//        try{
//            $catHome = DB::table('cat_home as ch')
//                ->leftJoin(DB::raw('
//                (
//                        select id
//                          from cat_home
//                          where vip = true
//                          ORDER BY random() limit 5
//                ) as vip
//            '), function ($join){
//                    $join->on( 'ch.id', '=', 'vip.id');
//                })
//                ->join(DB::raw('
//                (
//                    select distinct pictureable_id, pictureable_type from picture
//                    where pictureable_type = \'App\\Models\\CatHome\'
//                ) pic
//            '), function($join){
//                    $join->on( 'ch.id', '=', 'pic.pictureable_id');
//                })
//                ->whereRaw('ch.status = 1')
//                ->select('ch.*')
//                ->orderByRaw('case when vip.id is not null then 1 else 0 end desc')
//                ->orderBy('ch.created_at', 'desc')
//                ->take(5)
//                ->get();
//
//        }
//        catch(\Exception $e)
//        {
//
//        }


        //// ### Cat Home ### ///
        $temp = null;
        try{
            $temp = DB::table('cat_home as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_home
                      where status = 1
                      and vip = true
                      ORDER BY random() limit 2
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e) {}

        $temp_cat_home = null;
        $temp_cat_home_vip = null;
        if($temp != null && count($temp) > 0)
        {
            foreach($temp as $item)
            {
                $vip[] = $item->id;
            }

            $temp_cat_home = \DB::table('cat_home')
                ->select('id', 'title','subtitle', 'created_at', 'vip', 'sell_price', 'avg_rating', 'brand_id',
                    DB::raw('\'cat_home\' as for_cat'), DB::raw('for_cat as for_type'))
                ->where('status', '=', '1')
                ->whereNotIn('id', $vip);

            $temp_cat_home_vip = \DB::table('cat_home')
                ->select('id', 'title','subtitle', 'created_at', 'vip', 'sell_price', 'avg_rating', 'brand_id',
                    DB::raw('\'cat_home\' as for_cat'), DB::raw('for_cat as for_type'))
                ->whereIn('id', $vip);
        }
        else
        {
            $temp_cat_home = \DB::table('cat_home')
                ->select('id', 'title','subtitle', 'created_at', 'vip', 'sell_price', 'avg_rating', 'brand_id',
                    DB::raw('\'cat_home\' as for_cat'), DB::raw('for_cat as for_type'))
                ->where('status', '=', '1');
        }

        //// ### Cat Construct ### ///
        $temp = null;
        try{
            $temp = DB::table('cat_construct as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_construct
                      where status = 1
                      and vip = true
                      ORDER BY random() limit 3
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e) {}

        $temp_cat_construct = null;
        $temp_cat_construct_vip = null;
        $vip = null;
        if($temp != null && count($temp) > 0)
        {
            foreach($temp as $item)
            {
                $vip[] = $item->id;
            }

            $temp_cat_construct = \DB::table('cat_construct')
                ->select('id', 'title','subtitle', 'created_at', 'vip', 'sell_price', 'avg_rating', 'brand_id',
                    DB::raw('\'cat_construct\' as for_cat'), DB::raw('for_type as for_type'))
                ->where('status', '=', '1')
                ->whereNotIn('id', $vip);

            $temp_cat_construct_vip = \DB::table('cat_construct')
                ->select('id', 'title','subtitle', 'created_at', 'vip', 'sell_price', 'avg_rating', 'brand_id',
                    DB::raw('\'cat_construct\' as for_cat'), DB::raw('for_type as for_type'))
                ->whereIn('id', $vip);
        }
        else
        {
            $temp_cat_construct = \DB::table('cat_construct')
                ->select('id', 'title','subtitle', 'created_at', 'vip', 'sell_price', 'avg_rating', 'brand_id',
                    DB::raw('\'cat_construct\' as for_cat'), DB::raw('for_type as for_type'))
                ->where('status', '=', '1');
        }

        $catHomeVip = $temp_cat_home_vip
            ->union($temp_cat_construct_vip)
            ->orderBy('created_at', 'desc')
            ->get();

        $catHome = $temp_cat_home
            ->union($temp_cat_construct)
            ->orderBy('created_at', 'desc')
            ->simplePaginate(5);

        // ############## Ariticle ################ //
        // #### VIP
        $catArticleVip = null;
        try{
            $catArticleVip = DB::table('cat_article as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_article
                      where visible = true
                      and suggest = true
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

        // #### General (Not include vip)
        $catArticle = null;
        if($catArticleVip != null && count($catArticleVip) > 0)
        {
            foreach($catArticleVip as $item)
            {
                $vip[] = $item->id;
            }

            $catArticle = CatArticle::where('visible','=','true')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }
        else
        {
            $catArticle = CatArticle::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        // ############## Idea ################ //
        // #### VIP
        $catIdeaVip = null;
        try{
            $catIdeaVip = DB::table('cat_idea as ch')
                ->join(DB::raw('
                (
                    select id
                      from cat_idea
                      where visible = true
                      and suggest = true
                      ORDER BY random() limit 5
                ) as vip'), function ($join){
                    $join->on( 'ch.id', '=', 'vip.id');
                })
                ->select('ch.*')
                ->orderByRaw('random()')
                ->get();
        }
        catch(\Exception $e)
        {

        }

        // #### General (Not include vip)
        $catIdea = null;
        if($catIdeaVip != null && count($catIdeaVip) > 0)
        {
            foreach($catIdeaVip as $item)
            {
                $vip[] = $item->id;
            }

            $catIdea = CatIdea::where('visible','=','true')
                ->whereNotIn('id', $vip)
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }
        else
        {
            $catIdea = CatIdea::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->paginate(15);
        }

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"1"%\' and visible = true')  // 1 = หน้าแรก
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.index')
            ->with('catVip', $catHomeVip)
            ->with('cat', $catHome)
            ->with('catArticleVip', $catArticleVip)
            ->with('catArticle', $catArticle)
            ->with('catIdeaVip', $catIdeaVip)
            ->with('catIdea', $catIdea)
            ->with('articleItems',$articleItems);
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

    public function tag_list($id)
    {
        $tag_list = Tag::where('tag_sub_id', '=', $id)
            ->where(function ($query) {
                $query->where('tagable_type', '=', 'App\\Models\\CatHome')
                    ->orWhere('tagable_type', '=', 'App\\Models\\CatConstruct')
                    ->orWhere('tagable_type', '=', 'App\\Models\\CatArticle')
                    ->orWhere('tagable_type', '=', 'App\\Models\\CatIdea');
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('web.frontend.tag_list')
            ->with('tag_list', $tag_list);
    }

    public function shop_list($id)
    {
        $cat = CatConstruct::where('brand_id', '=', $id)
            ->where('status','=','1')
            ->orderBy('id', 'desc')
            ->paginate(15);

        $brand = Brand::find($id);

        return view('web.frontend.shop_list')
            ->with('cat', $cat)
            ->with('brand_name', $brand->brand_name);
    }

    public function project_list($id)
    {
        $cat = CatHome::where('brand_id', '=', $id)
            ->where('status','=','1')
            ->orderBy('id', 'desc')
            ->paginate(15);

        $brand = Brand::find($id);

        return view('web.frontend.project_list')
            ->with('cat', $cat)
            ->with('brand_name', $brand->brand_name);
    }
}

