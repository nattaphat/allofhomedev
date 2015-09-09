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

    <!-- Lazy Loading -->
    <link type="text/css" href="{{ asset('js/lib/lazyloadxt/dist/jquery.lazyloadxt.fadein.css') }}" rel="stylesheet">

    <!-- Custom -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    @yield('jshome')

</head>

<body>

<?php
/* ######## Banner D ######## */
$bannerD = null;
if(strrpos(URL::current(), "/home") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"2"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/townhome") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"2"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/condo") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"2"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/enlarge") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"3"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/constructor") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"3"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/construct") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"3"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/shop") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"4"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/garden") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"4"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/clean") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"4"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/interior") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"4"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/land") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"5"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/secondhand") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"5"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/rent") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"5"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/apartment") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"5"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else if(strrpos(URL::current(), "/article_idea") > 0)
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"6"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
else
{
    $bannerD = \App\Models\Banner::where('type','=','D')
            ->where('visible', '=', 'true')
            ->whereRaw('for_menu like \'%"1"%\'')
            ->whereNotNull('file_path')
            ->orderByRaw('random()')
            ->take(6)
            ->get();
}
?>

<div class="header">
    <div class="wrap">
        @include('layouts._partials.header')
    </div>
</div>
<div class="containner nodropdown">
    <div class="wrap">
        <!-- Banner B -->
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
            {!! Form::text('txt_search', (isset($searchWord) ? $searchWord : null), ['placeholder' => 'คำที่ต้องการค้นหา',
            'class' => 'enter-text',
            'id' => 'txt_search']) !!}
            <input id="btn_search" type="button" value="" class="btn-search" />

            {!! Form::hidden('search_token', csrf_token(), ['id' => 'search_token']) !!}
            {!! Form::hidden('search_url', url("search_list"), ['id' => 'search_url']) !!}

        </div>

        <!-- Box Left -->
        <div class="boxleft">
            @if($bannerC != null && count($bannerC) > 0)
                <div class="newregister" style="margin-bottom: 20px;">
                    <h2>ลงทะเบียนโครงการใหม่</h2>
                    <div id="bannerC_Slider" class="flexslider" style="margin-bottom: 0;">
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

            <div id="fb-root"></div>
            <script>
                window.fbAsyncInit = function() {
                    FB.init({
                        appId      : '218142118246842',
                        xfbml      : true,
                        version    : 'v2.4'
                    });
                };

                (function(d, s, id){
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/th_TH/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

            <div class="fb-page" data-href="https://www.facebook.com/allofhome" data-width="300"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true" data-show-posts="false">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/allofhome">
                        <a href="https://www.facebook.com/allofhome">Allofhome.com &quot;แหล่งรวมบ้าน&quot;</a>
                    </blockquote>
                </div>
            </div>

            <!-- Banner D -->
            @if($bannerD != null)
                @if(isset($bannerD[0]))
                    <div class="side-banner">
                        <a href="{{ $bannerD[0]->url }}" target="_blank">
                            <img data-src="{{ $bannerD[0]->file_path }}" alt="{{ $bannerD[0]->banner_name }}" width="300" height="250" />
                        </a>
                    </div>
                @endif
                @if(isset($bannerD[1]))
                    <div class="side-banner">
                        <a href="{{ $bannerD[1]->url }}" target="_blank">
                            <img data-src="{{ $bannerD[1]->file_path }}" alt="{{ $bannerD[1]->banner_name }}" width="300" height="250" />
                        </a>
                    </div>
                @endif
                @if(isset($bannerD[2]))
                    <div class="side-banner">
                        <a href="{{ $bannerD[2]->url }}" target="_blank">
                            <img data-src="{{ $bannerD[2]->file_path }}" alt="{{ $bannerD[2]->banner_name }}" width="300" height="250" />
                        </a>
                    </div>
                @endif
            @endif

        </div>
        <div class="boxright">
            <!-- บทความและข่าวสาร -->
            @yield('content')
        </div>
        <div class="clear"></div>
    </div>
</div>

@include('layouts._partials.footer_new')

<!--JQuery -->
<script src={{ asset('js/lib/jquery/dist/jquery.min.js') }}></script>

<!--Flex slider -->
<script src={{ asset('plugins/flexslider/jquery.flexslider-min.js') }}></script>

<!--Dotdotdot -->
<script src={{ asset('js/jquery.dotdotdot.min.js') }}></script>

<!-- Lazy Loading -->
<script src={{ asset('js/lib/lazyloadxt/dist/jquery.lazyloadxt.extra.js') }}></script>

<!-- Jquery Redirect -->
<script src={{ asset('js/lib/jquery.redirect/jquery.redirect.js') }}></script>

<!-- Jscroll -->
<script src={{ asset('js/lib/jquery.jscroll/jquery.jscroll.min.js') }}></script>

<!--Custom scripts for allofhome -->
<script src={{ asset('js/script.js') }}></script>

@yield('jsbody')

</body>
</html>
