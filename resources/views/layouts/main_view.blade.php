<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        @section('title')
            {{ Config::get('allofhome.title') }}
        @show
    </title>

    <!-- Flexslider -->
    <link type="text/css" href="{{ asset('plugins/flexslider/flexslider.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link type="text/css" href="{{ asset('js/lib/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    @yield('jshome')

</head>

<body>
<div class="header">
    <div class="wrap">
        @include('layouts._partials.header')
    </div>
</div>

<div class="containner nodropdown">
    <div class="wrap">
        <!-- Banner B -->
        {{--<div class="hilight">--}}
            {{--<a href="#" class="prev"></a>--}}
            {{--<a href="#" class="next"></a>--}}
            {{--<div class="pic-slide">--}}
                {{--<ul>--}}
                    {{--<li><a href="#"><img src="{{ asset('images/test/banner-2.jpg') }}" alt="" /></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="pagin">--}}
                {{--<a href="#" class="active"></a>--}}
                {{--<a href="#"></a>--}}
                {{--<a href="#"></a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <?php
        $bannerB = \App\Models\Banner::where('type','=','B')
                ->where('visible', '=', 'true')
                ->whereNotNull('file_path')
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        $bannerC = \App\Models\Banner::where('type','=','C')
                ->where('visible', '=', 'true')
                ->whereNotNull('file_path')
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();
        ?>
        @if($bannerB != null && count($bannerB) > 0)
            <div class="hilight">
                <div class="pic-slide">
                    <div id="bannerB_Slider" class="flexslider">
                        <ul class="slides">
                            @foreach($bannerB as $item)
                                <li>
                                    <a href="{{ $item->url }}" target="_blank">
                                        <img src="{{ $item->file_path }}" alt="{{ $item->file_name }}" width="1200" height="400" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- ค้นหาทั้งหมดในเว็บ -->
        <div class="search">
            <input type="text" value="คำที่ต้องการค้นหา" class="enter-text" />
            <input type="submit" value="" class="btn-search" />
        </div>

        <!-- Box Left -->
        <div class="boxleft">
            {{--<div class="newregister">--}}
                {{--<h2>ลงทะเบียนโครงการใหม่</h2>--}}
                {{--<p><img src="{{ asset('images/test/pic-1.jpg')}}" alt="" /></p>--}}
                {{--<div class="text">--}}
                    {{--<h3>Life Asoke (ไลฟ์ อโศก)</h3>--}}
                    {{--<p>ลงทะเบียนส่วนลดสูงสุด <span>100,000</span> บาท</p>--}}
                {{--</div>--}}
                {{--<a href="#" class="btn-register">ลงทะเบียนที่นี่</a>--}}
            {{--</div>--}}
            @if($bannerC != null && count($bannerC) > 0)
                <div class="newregister">
                    <h2>ลงทะเบียนโครงการใหม่</h2>
                    <div id="bannerC_Slider" class="flexslider">
                        <ul class="slides">
                            @foreach($bannerC as $item)
                                <li>
                                    <p>
                                        <img src="{{ $item->file_path }}" alt="{{ $item->file_name }}" />
                                    </p>
                                    <div class="text">
                                        <h3 style="
                                            line-height: 25px;
                                            height: 50px;
                                            overflow: hidden;
                                            margin-bottom: 10px;
                                            ">
                                            {{ $item->banner_name }}
                                        </h3>
                                        <?php $pieces = explode("<p>", $item->remark); ?>

                                        @foreach($pieces as $pdesc)
                                            @if($pdesc != "")
                                                <p style="
                                                line-height: 25px;
                                                height: 50px;
                                                overflow: hidden;
                                                ">
                                                    {!! str_replace("</p>", "", $pdesc) !!}
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                    <a href="{{ $item->url }}" target="_blank" class="btn-register">ลงทะเบียนที่นี่</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <a href="#" class="btn-likefb"></a>
            <!-- Banner E, F, G -->
            <div class="side-banner"><img src="{{ asset('images/test/pic-10.jpg') }}" alt="" /></div>
            <div class="side-banner"><img src="{{ asset('images/test/pic-14.jpg') }}" alt="" /></div>
            <div class="side-banner"><img src="{{ asset('images/test/pic-3.jpg') }}" alt="" /></div>

            <?php
            $youtubes = null;
            $youtubes2 = null;
            if(strrpos(URL::current(), "/home") > 0)
            {
                $youtubes = \App\Models\CatHome::whereRaw('for_cat like \'%"1"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/townhome") > 0)
            {
                $youtubes = \App\Models\CatHome::whereRaw('for_cat like \'%"2"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/condo") > 0)
            {
                $youtubes = \App\Models\CatHome::whereRaw('for_cat like \'%"3"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/enlarge") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"2"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/constructor") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"3"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/construct") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"1"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/shop") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"4"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/garden") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"5"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/clean") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"6"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/interior") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"7"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/land") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"8"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/secondhand") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"9"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/rent") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"10"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/apartment") > 0)
            {
                $youtubes = \App\Models\CatConstruct::whereRaw('for_type like \'%"11"%\' and video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1')->orderByRaw('random()')->take(5)->get();
            }
            else if(strrpos(URL::current(), "/article_idea") > 0)
            {
                $youtubes = \App\Models\CatIdea::whereRaw('video_url is not null and video_url <> \'\'')
                        ->where('visible', '=', 'true')->orderByRaw('random()')
                        ->select('video_url')->take(2)->get();

                $youtubes2 = \App\Models\CatArticle::whereRaw('video_url is not null and video_url <> \'\'')
                        ->where('visible', '=', 'true')->orderByRaw('random()')
                        ->select('video_url')->take(3)->get();
            }
            else
            {
                $youtube_cat_home = \DB::table('cat_home')
                        ->select('video_url','created_at')
                        ->whereRaw('video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1');

                $youtube_cat_construct = \DB::table('cat_construct')
                        ->select('video_url','created_at')
                        ->whereRaw('video_url is not null and video_url <> \'\'')
                        ->where('status', '=', '1');

                $youtube_cat_idea = \DB::table('cat_idea')
                        ->select('video_url','created_at')
                        ->whereRaw('video_url is not null and video_url <> \'\'')
                        ->where('visible', '=', 'true');

                $youtube_cat_article = \DB::table('cat_article')
                        ->select('video_url','created_at')
                        ->whereRaw('video_url is not null and video_url <> \'\'')
                        ->where('visible', '=', 'true');

                $union = $youtube_cat_home
                        ->union($youtube_cat_construct)
                        ->union($youtube_cat_idea)
                        ->union($youtube_cat_article);

                $youtubes = $union->orderBy('created_at', 'desc')->take(5)->get();
            }

            ?>

            @if(strrpos(URL::current(), "/article_idea") > 0)
                @if(($youtubes != null && count($youtubes) > 0) || ($youtubes2 != null && count($youtubes2) > 0))
                    <div class="clipvdo">
                        <h2>คลิปวีดีโอ </h2>
                        @foreach($youtubes as $item)
                            <?php
                            $iframe = \App\Models\AllFunction::convertYoutube($item->video_url);
                            ?>
                            <div class="vdo">
                                {!! $iframe !!}
                            </div>
                        @endforeach
                        @foreach($youtubes2 as $item)
                            <?php
                            $iframe = \App\Models\AllFunction::convertYoutube($item->video_url);
                            ?>
                            <div class="vdo">
                                {!! $iframe !!}
                            </div>
                        @endforeach
                        <div class="follow">
                            <span>ติดตามรายการบน </span>
                            <a href="#"><img src="{{ asset('images/button/youtube.jpg') }}" alt="" /></a>
                        </div>
                    </div>
                @endif
            @else
                @if($youtubes != null && count($youtubes) > 0)
                    <div class="clipvdo">
                        <h2>คลิปวีดีโอ </h2>
                        @foreach($youtubes as $item)
                            <?php
                            $iframe = \App\Models\AllFunction::convertYoutube($item->video_url);
                            ?>
                            <div class="vdo">
                                {!! $iframe !!}
                            </div>
                        @endforeach
                        <div class="follow">
                            <span>ติดตามรายการบน </span>
                            <a href="#"><img src="{{ asset('images/button/youtube.jpg') }}" alt="" /></a>
                        </div>
                    </div>
                @endif
            @endif

        </div>

        <div class="boxright">

            @yield('content')

        </div>

        <div class="clear"></div>

    </div>

</div>

<div class="footer">
    <div class="slide-up"></div>
    <div class="wrap">
        <div class="contact">
            <h2>ติดต่อเรา</h2>
            <p class="tel">019223 8092344</p>
            <p class="mail">info@allofhome.com</p>
            <!-- <p class="address">Sunshine House, Sunville. SUN12 8LU.</p> -->
        </div>
        <div class="about">
            <h2>เกี่ยวกับเรา</h2>
            <!-- <p>Making the web a prettier place one template at a time! We make beautiful, quality, responsive Drupal & web templates!</p> -->
        </div>
        <div class="link">
            <h2>ลิงค์ที่น่าสนใจ</h2>
            <a href="{{ url("backend/login") }}" target="_blank">Admin Control</a>
        </div>
    </div>
</div>

<!--JQuery -->
<script src={{ asset('js/lib/jquery/dist/jquery.min.js') }}></script>

<!--Flex slider -->
<script src={{ asset('plugins/flexslider/jquery.flexslider-min.js') }}></script>

<!--Custom scripts for allofhome -->
<script src={{ asset('js/script.js') }}></script>

<!--Dotdotdot -->
<script src={{ asset('js/jquery.dotdotdot.min.js') }}></script>

@yield('jsbody')

</body>
</html>
