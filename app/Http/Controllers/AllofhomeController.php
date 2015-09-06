<?php namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CatArticle;
use App\Models\CatConstruct;
use App\Models\CatConstructRating;
use App\Models\CatHome;
use App\Models\CatIdea;
use App\Models\Picture;
use App\Models\Tag;
use App\Models\geoRegion;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Request;
use Validator;
use Response;
use Input;
use DB;
use View;

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

        /*
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
                ->paginate(5);
        }
        else
        {
            $catArticle = CatArticle::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
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
                ->paginate(5);
        }
        else
        {
            $catIdea = CatIdea::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->paginate(5);
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

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"1"%\' and visible = true')  // 1 = หน้าแรก
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('web.frontend.index_new')
            ->with('articleItems',$articleItems);
        */

        /*
        // ##### CatHome + CatConstruct ##### //
        $tempVip = DB::select(DB::raw("
                select *
                from
                (
                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_home' as for_cat, for_cat as for_type
                    from cat_home
                    where status = 1
                    and vip = true

                    union

                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_construct' as for_cat, for_type as for_type
                    from cat_construct
                    where status = 1
                    and vip = true
                ) TableVIP
                order by random() limit 5
            "));

        $vip_string = "";
        $vip_home_string = "";
        $vip_construct_string = "";

        if($tempVip != null)
        {
            foreach($tempVip as $item)
            {
                $vip_string .= $item->id."@@@".$item->for_cat."###";
                if($item->for_cat == "cat_home")
                    $vip_home_string .= "'".$item->id."',";
                else
                    $vip_construct_string .= "'".$item->id."',";
            }
            $vip_string = substr($vip_string, 0, strlen($vip_string) - 3);

            if(strlen($vip_home_string) > 0)
                $vip_home_string = substr($vip_home_string, 0, strlen($vip_home_string) - 1);

            if(strlen($vip_construct_string) > 0)
                $vip_construct_string = substr($vip_construct_string, 0, strlen($vip_construct_string) - 1);
        }

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"1"%\' and visible = true')  // 1 = หน้าแรก
        ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return View::make('web.frontend.index_new', [
            'articleItems' => $articleItems
        ]);
         */

        // ##### CatHome + CatConstruct ##### //
        $catVip = DB::select(DB::raw("
                select *
                from
                (
                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_home' as for_cat, for_cat as for_type
                    from cat_home
                    where status = 1
                    and vip = true
                    and (for_cat like '%\"0\"%')

                    union

                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_construct' as for_cat, for_type as for_type
                    from cat_construct
                    where status = 1
                    and vip = true
                    and (for_type like '%\"4\"%' or for_type like '%\"5\"%' or for_type like '%\"7\"%')

                ) TableVIP
                order by random() limit 5
            "));

        $vip_home_string = "";
        $vip_construct_string = "";

        if($catVip != null)
        {
            foreach($catVip as $item)
            {
                if($item->for_cat == "cat_home")
                    $vip_home_string .= "'".$item->id."',";
                else
                    $vip_construct_string .= "'".$item->id."',";
            }

            if(strlen($vip_home_string) > 0)
                $vip_home_string = substr($vip_home_string, 0, strlen($vip_home_string) - 1);

            if(strlen($vip_construct_string) > 0)
                $vip_construct_string = substr($vip_construct_string, 0, strlen($vip_construct_string) - 1);
        }

        // #### General (Not include vip)
        if(strlen($vip_construct_string) == 0)
        {
            $temp_catNotVip = DB::select(DB::raw("
                select *
                from
                (
                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_home' as for_cat, for_cat as for_type
                    from cat_home
                    where status = 1
                    and (for_cat like '%\"0\"%')

                    union

                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_construct' as for_cat, for_type as for_type
                    from cat_construct
                    where status = 1
                    and (for_type like '%\"4\"%' or for_type like '%\"5\"%' or for_type like '%\"7\"%')

                ) TableVIP
                order by created_at desc
            "));
        }
        else
        {
            $temp_catNotVip = DB::select(DB::raw("
                select *
                from
                (
                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_home' as for_cat, for_cat as for_type
                    from cat_home
                    where status = 1
                    and (for_cat like '%\"0\"%')

                    union

                    select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                        'cat_construct' as for_cat, for_type as for_type
                    from cat_construct
                    where status = 1
                    and (for_type like '%\"4\"%' or for_type like '%\"5\"%' or for_type like '%\"7\"%')
                    and id not in (".$vip_construct_string.")

                ) TableVIP
                order by created_at desc
            "));
        }

        $page = Input::get('pageHome', 1); // Get the current page or default to 1, this is what you miss!
        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;

//        $catNotVip = new LengthAwarePaginator(array_slice($temp_catNotVip, $offset, $perPage, true),
//            count($temp_catNotVip), $perPage, $page,
//            ['path' => Request::url(), 'pageName' => 'pageHome', 'query' => Request::query()]);

        $catNotVip = new LengthAwarePaginator(array_slice($temp_catNotVip, $offset, $perPage, true),
            count($temp_catNotVip), $perPage, $page,
            ['path' => 'index/ajax/home', 'pageName' => 'pageHome']);

//        dd($catNotVip);

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
                ->get();
        }
        else
        {
            $catArticle = CatArticle::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->get();
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
                ->get();
        }
        else
        {
            $catIdea = CatIdea::where('visible','=','true')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // ###################  Article #######################
        $articleItems = CatArticle::whereRaw('for_cat like \'%"1"%\' and visible = true')  // 1 = หน้าแรก
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return View::make('web.frontend.index_new', [
            'articleItems' => $articleItems,
            'catVip' => $catVip,
            'catNotVip' => $catNotVip,
            'vip_home_string' => $vip_home_string,
            'vip_construct_string' => $vip_construct_string,
            'catArticleVip' => $catArticleVip,
            'catArticle' => $catArticle,
            'catIdeaVip' => $catIdeaVip,
            'catIdea' => $catIdea
        ]);
    }

    public function getIndexType($type)
    {
        $page =  Request::input('page');

        if ($type == 'home')
        {
            $vip_home_string =  Request::input('vip_home_string');
            $vip_construct_string =  Request::input('vip_construct_string');

            if(strlen($vip_construct_string) == 0)
            {
                $temp_catNotVip = DB::select(DB::raw("
                    select *
                    from
                    (
                        select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                            'cat_home' as for_cat, for_cat as for_type
                        from cat_home
                        where status = 1
                        and (for_cat like '%\"0\"%')

                        union

                        select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                            'cat_construct' as for_cat, for_type as for_type
                        from cat_construct
                        where status = 1
                        and (for_type like '%\"4\"%' or for_type like '%\"5\"%' or for_type like '%\"7\"%')

                    ) TableVIP
                    order by created_at desc
                "));
            }
            else
            {
                $temp_catNotVip = DB::select(DB::raw("
                    select *
                    from
                    (
                        select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                            'cat_home' as for_cat, for_cat as for_type
                        from cat_home
                        where status = 1
                        and (for_cat like '%\"0\"%')

                        union

                        select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                            'cat_construct' as for_cat, for_type as for_type
                        from cat_construct
                        where status = 1
                        and (for_type like '%\"4\"%' or for_type like '%\"5\"%' or for_type like '%\"7\"%')
                        and id not in (".$vip_construct_string.")

                    ) TableVIP
                    order by created_at desc
                "));
            }

            $perPage = 10;
            $offset = ($page * $perPage) - $perPage;

            $catNotVip = new LengthAwarePaginator(array_slice($temp_catNotVip, $offset, $perPage, true),
                count($temp_catNotVip), $perPage, $page,
                ['path' => 'index/ajax/home', 'pageName' => 'pageHome']);

            return View::make('web.frontend.homeListIndex')
                ->with('catNotVip',$catNotVip);
        }

        /*
        $page = Input::get('page');
        if($page == null)
            $page = 1;

        if ($type == 'home') {
            $temp = DB::select(DB::raw("
                select Tb.id, Tb.title, Tb.subtitle, Tb.created_at, case when TbVip.vip is not null then true else false end as vip, Tb.sell_price, Tb.avg_rating, Tb.brand_id, Tb.for_cat, Tb.for_type
                from
                (
                        select id, title, subtitle, created_at, false as vip, sell_price, avg_rating, brand_id,
                                'cat_home' as for_cat, for_cat as for_type
                        from cat_home
                        where status = 1

                        union

                        select id, title, subtitle, created_at, false as vip, sell_price, avg_rating, brand_id,
                                'cat_construct' as for_cat, for_type as for_type
                        from cat_construct
                        where status = 1
                ) as Tb
                left join
                (
                        select *
                        from
                        (
                                select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                                        'cat_home' as for_cat, for_cat as for_type
                                from cat_home
                                where status = 1
                                and vip = true

                                union

                                select id, title, subtitle, created_at, true as vip, sell_price, avg_rating, brand_id,
                                        'cat_construct' as for_cat, for_type as for_type
                                from cat_construct
                                where status = 1
                                and vip = true
                        ) TableVIP
                        order by random() limit 5
                ) as TbVip
                on (
                        TbVip.id = Tb.id and TbVip.for_cat = Tb.for_cat
                )
                order by TbVip.vip, Tb.created_at desc
            "));

            $catHome = new Paginator($temp, 7, $page, ['path' => 'index/ajax/home']);

            return View::make('web.frontend.homeListIndex')
                ->with('catHome',$catHome)->render();

        } elseif ($type == 'article') {
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
            catch(\Exception $e) {}

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
                    ->paginate(1);
            }
            else
            {
                $catArticle = CatArticle::where('visible','=','true')
                    ->orderBy('created_at', 'desc')
                    ->paginate(1);
            }

            return View::make('web.frontend.articleListIndex')
                ->with('catArticleVip',$catArticleVip)
                ->with('catArticle',$catArticle);

        } else {
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
            catch(\Exception $e) {}

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
                    ->paginate(1);
            }
            else
            {
                $catIdea = CatIdea::where('visible','=','true')
                    ->orderBy('created_at', 'desc')
                    ->paginate(1);
            }

            return View::make('web.frontend.ideaListIndex')
                ->with('catIdeaVip',$catIdeaVip)
                ->with('catIdea',$catIdea);
        }
        */

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

    public function search_list()
    {
        $req = Request::all();

        // #### Cat Construct #### //
        $searchCatConstruct = CatConstruct::search($req['_word'])
            ->where('status','=','1')
            ->whereRaw('(for_type like \'%"4"%\' or for_type like \'%"5"%\' or for_type like \'%"7"%\')')
            ->orderBy('id', 'desc')->get();

        $searchPictureCatConstruct = Picture::search($req['_word'])
            ->where('pictureable_type','=','App\\Models\\CatConstruct')
            ->whereRaw('pictureable_id in (select id from cat_construct where status = 1
                and (for_type like \'%"4"%\' or for_type like \'%"5"%\' or for_type like \'%"7"%\'))')
            ->orderBy('pictureable_id', 'desc')->get(['pictureable_id']);


        // #### Cat Article #### //
        $searchCatArticle = CatArticle::search($req['_word'])
            ->where('visible','=','true')
            ->orderBy('id', 'desc')->get();

        $searchPictureCatArticle = Picture::search($req['_word'])
            ->where('pictureable_type','=','App\\Models\\CatArticle')
            ->whereRaw('pictureable_id in (select id from cat_article where visible = true)')
            ->orderBy('pictureable_id', 'desc')->get(['pictureable_id']);


        // #### Cat Idea #### //
        $searchCatIdea = CatIdea::search($req['_word'])
            ->where('visible','=','true')
            ->orderBy('id', 'desc')->get();

        $searchPictureCatIdea = Picture::search($req['_word'])
            ->where('pictureable_type','=','App\\Models\\CatIdea')
            ->whereRaw('pictureable_id in (select id from cat_idea where visible = true)')
            ->orderBy('pictureable_id', 'desc')->get(['pictureable_id']);

        // #### Return #### //
        return View::make('web.frontend.search_list', [
            'searchWord' => $req['_word'],
            'searchCatConstruct' => $searchCatConstruct,
            'searchPictureCatConstruct' => $searchPictureCatConstruct,
            'searchCatArticle' => $searchCatArticle,
            'searchPictureCatArticle' => $searchPictureCatArticle,
            'searchCatIdea' => $searchCatIdea,
            'searchPictureCatIdea' => $searchPictureCatIdea
        ]);

    }

    public function cat_construct_rating()
    {
        $req = Request::all();

        $cat_construct_id = $req['id'];
        $cat_construct_score = $req['score'];

        $catConstructRating = new CatConstructRating();
        $catConstructRating->cat_construct_id = $cat_construct_id;
        $catConstructRating->rating = $cat_construct_score;
        $catConstructRating->save();

        $sum = CatConstructRating::where('cat_construct_id','=', $cat_construct_id)
            ->select(DB::raw('round((sum(rating) * 1.00 / count(cat_construct_id)), 2) as avg_rating'))->get();

        $num_score_1 = CatConstructRating::where('cat_construct_id','=', $cat_construct_id)
            ->where('rating','=','1')
            ->select(DB::raw('count(cat_construct_id) as num_row'))->get();

        $num_score_2 = CatConstructRating::where('cat_construct_id','=', $cat_construct_id)
            ->where('rating','=','2')
            ->select(DB::raw('count(cat_construct_id) as num_row'))->get();

        $num_score_3 = CatConstructRating::where('cat_construct_id','=', $cat_construct_id)
            ->where('rating','=','3')
            ->select(DB::raw('count(cat_construct_id) as num_row'))->get();

        $num_score_4 = CatConstructRating::where('cat_construct_id','=', $cat_construct_id)
            ->where('rating','=','4')
            ->select(DB::raw('count(cat_construct_id) as num_row'))->get();

        $num_score_5 = CatConstructRating::where('cat_construct_id','=', $cat_construct_id)
            ->where('rating','=','5')
            ->select(DB::raw('count(cat_construct_id) as num_row'))->get();

        $catConstruct = CatConstruct::find($cat_construct_id);
        $catConstruct->avg_rating = $sum[0]->avg_rating;
        $catConstruct->num_score_1 = $num_score_1[0]->num_row;
        $catConstruct->num_score_2 = $num_score_2[0]->num_row;
        $catConstruct->num_score_3 = $num_score_3[0]->num_row;
        $catConstruct->num_score_4 = $num_score_4[0]->num_row;
        $catConstruct->num_score_5 = $num_score_5[0]->num_row;
        $catConstruct->update();

        return (
            [
                'avg_score' => $sum[0]->avg_rating,
                'num_score_5' => $num_score_5[0]->num_row,
                'num_score_4' => $num_score_4[0]->num_row,
                'num_score_3' => $num_score_3[0]->num_row,
                'num_score_2' => $num_score_2[0]->num_row,
                'num_score_1' => $num_score_1[0]->num_row,
            ]
        );
    }

    public function map_direction($lat, $long)
    {
        return View::make('web.frontend.map_direction', [
            'lat' => $lat,
            'long' => $long
        ]);
    }

    public function send_mail()
    {
        $req = Request::all();

        $to_name = $req['to_name'];
        $to_mail = $req['to_mail'];
        $title = $req['title'];
        $content = $req['content'];
        $from_name = $req['from_name'];
        $from_telephone = $req['from_telephone'];

        $receiver = [
            'name' => $to_name,
            'mail' => $to_mail
        ];

//        try{
            $result = \Mail::send('web.frontend.mail',[
                'to_name'=> $to_name,
                'title' => $title,
                'content' => $content,
                'from_name' => $from_name,
                'from_telephone' => $from_telephone
            ],
            function($message) use ($receiver)
            {
                $message->to($receiver['mail'] ,$receiver['name']);
                $message->cc("allofhome@allofhome.com", "AllOfHome Admin");
                $message->subject('AllOfHome.com แจ้งให้ทราบเรื่องผู้ติดต่อร้านค้า');
            });

            return $result;
//        }
//        catch(\Exception $e) {
//            return -1;
//        }
    }



}

