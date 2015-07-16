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
        <div class="hilight">
            <a href="#" class="prev"></a>
            <a href="#" class="next"></a>
            <div class="pic-slide">
                <ul>
                    <li><a href="#"><img src="{{ asset('images/test/banner-2.jpg') }}" alt="" /></a></li>
                </ul>
            </div>
            <div class="pagin">
                <a href="#" class="active"></a>
                <a href="#"></a>
                <a href="#"></a>
            </div>
        </div>

        <!-- ค้นหาทั้งหมดในเว็บ -->
        <div class="search">
            <input type="text" value="คำที่ต้องการค้นหา" class="enter-text" />
            <input type="submit" value="" class="btn-search" />
        </div>

        <!-- Box Left -->
        <div class="boxleft">
            <div class="newregister">
                <h2>ลงทะเบียนโครงการใหม่</h2>
                <p><img src="{{ asset('images/test/pic-1.jpg')}}" alt="" /></p>
                <div class="text">
                    <h3>Life Asoke (ไลฟ์ อโศก)</h3>
                    <p>ลงทะเบียนส่วนลดสูงสุด <span>100,000</span> บาท</p>
                </div>
                <a href="#" class="btn-register">ลงทะเบียนที่นี่</a>
            </div>
            <a href="#" class="btn-likefb"></a>
            <!-- Banner E, F, G -->
            <div class="side-banner"><img src="{{ asset('images/test/pic-10.jpg') }}" alt="" /></div>
            <div class="side-banner"><img src="{{ asset('images/test/pic-14.jpg') }}" alt="" /></div>
            <div class="side-banner"><img src="{{ asset('images/test/pic-3.jpg') }}" alt="" /></div>
            <div class="clipvdo">
                <h2>คลิปวีดีโอ </h2>
                <div class="vdo"><img src="{{ asset('images/test/pic-15.jpg') }}" alt="" /></div>
                <div class="vdo"><img src="{{ asset('images/test/pic-15.jpg') }}" alt="" /></div>
                <div class="vdo"><img src="{{ asset('images/test/pic-15.jpg') }}" alt="" /></div>
                <div class="vdo"><img src="{{ asset('images/test/pic-15.jpg') }}" alt="" /></div>
                <div class="follow">
                    <span>ติดตามรายการบน </span>
                    <a href="#"><img src="{{ asset('images/button/youtube.jpg') }}" alt="" /></a>
                </div>
            </div>
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