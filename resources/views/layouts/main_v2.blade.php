<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        @section('title')
            {{ Config::get('allofhome.title') }}
        @show
    </title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    @yield('jshome')

</head>

<body>
<div class="header">
    <div class="wrap">
        <h1><a href="{{ url('/') }}">www.allofhome.com</a></h1>
        <!-- Banner A -->
        <div class="banner-top"><img src="images/test/banner-1.jpg" alt="" /></div>
        <div class="navigator">
            <ul>
                <li><a href="{{ url('/') }}" class="home active"></a></li>
                <li><a href="{{ url('/home/index') }}">โครงการบ้านใหม่</a></li>
                <li><a href="{{ url('/townhome/index') }}">โครงการทาวน์โฮมใหม่</a></li>
                <li><a href="{{ url('/condo/index') }}">โครงการคอนโดใหม่</a></li>
                <li><a href="{{ url('/review/index') }}">รีวิว</a></li>
                <li><a href="{{ url('/idea/index') }}">ไอเดีย</a></li>
                <li><a href="{{ url('/article/index') }}">บทความและข่าวสาร</a></li>
                <li><a href="#" class="login">เข้าสู่ระบบ</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="containner">

    <div class="wrap">
        <!-- Banner B -->
        <div class="hilight">
            <a href="#" class="prev"></a>
            <a href="#" class="next"></a>
            <div class="pic-slide">
                <ul>
                    <li><a href="#"><img src="images/test/banner-2.jpg" alt="" /></a></li>
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
                <p><img src="images/test/pic-1.jpg" alt="" /></p>
                <div class="text">
                    <h3>Life Asoke (ไลฟ์ อโศก)</h3>
                    <p>ลงทะเบียนส่วนลดสูงสุด <span>100,000</span> บาท</p>
                </div>
                <a href="#" class="btn-register">ลงทะเบียนที่นี่</a>
            </div>
            <a href="#" class="btn-likefb"></a>
            <!-- Banner E, F, G -->
            <div class="side-banner"><img src="images/test/pic-10.jpg" alt="" /></div>
            <div class="side-banner"><img src="images/test/pic-14.jpg" alt="" /></div>
            <div class="side-banner"><img src="images/test/pic-3.jpg" alt="" /></div>
            <div class="clipvdo">
                <h2>คลิปวีดีโอ </h2>
                <div class="vdo"><img src="images/test/pic-15.jpg" alt="" /></div>
                <div class="vdo"><img src="images/test/pic-15.jpg" alt="" /></div>
                <div class="vdo"><img src="images/test/pic-15.jpg" alt="" /></div>
                <div class="vdo"><img src="images/test/pic-15.jpg" alt="" /></div>
                <div class="follow">
                    <span>ติดตามรายการบน </span>
                    <a href="#"><img src="images/button/youtube.jpg" alt="" /></a>
                </div>
            </div>
        </div>

        <div class="boxright">
            <!-- บทความและข่าวสาร -->
            <div class="hilight-content">
                <div class="left">
                    <ul>
                        <li>
                            <div class="pic"><img src="images/test/pic-2.jpg" alt="" /></div>
                            <div class="tag-day">
                                <p>02</p>
                                <p>มีค 2558</p>
                            </div>
                            <div class="text-hilight">
                                <h2>เรื่อง: Furniture Show 2015 วันที่ 13-21 มิ.ย. 58</h2>
                                <p>Furniture Show 2015 ระหว่างวันที่ 13-21 มิถุนายน 2558 ศูนย์แสดงสินค้าและการประชุม อิมแพ็ค เมืองทองธานี</p>
                            </div>
                        </li>
                        <li>
                            <div class="pic"><img src="images/test/pic-2.jpg" alt="" /></div>
                            <div class="tag-day">
                                <p>02</p>
                                <p>มีค 2558</p>
                            </div>
                            <div class="text-hilight">
                                <h2>เรื่อง: Furniture Show 2015 วันที่ 13-21 มิ.ย. 58</h2>
                                <p>Furniture Show 2015 ระหว่างวันที่ 13-21 มิถุนายน 2558 ศูนย์แสดงสินค้าและการประชุม อิมแพ็ค เมืองทองธานี</p>
                            </div>
                        </li>
                    </ul>
                    <div class="pagin">
                        <a href="#" class="active"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
                <div class="right">
                    <!-- Banner C, D -->
                    <div class="side-banner"><img src="images/test/pic-3.jpg" alt="" /></div>
                    <div class="side-banner"><img src="images/test/pic-4.jpg" alt="" /></div>
                </div>
                <div class="clear"></div>
            </div>

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

@yield('jsbody')

</body>
</html>
