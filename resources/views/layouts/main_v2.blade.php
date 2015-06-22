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
        <h1><a href="#">All Home.com</a></h1>
        <div class="banner-top"><img src="images/test/banner-1.jpg" alt="" /></div>
        <div class="navigator">
            <ul>
                <li><a href="#" class="home"></a></li>
                <li><a href="#">โครงการบ้านใหม่</a></li>
                <li><a href="#">โครงการทาวน์โฮมใหม่</a></li>
                <li><a href="#">โครงการคอนโดใหม่</a></li>
                <li><a href="#">รีวิว</a></li>
                <li><a href="#">ไอเดีย</a></li>
                <li><a href="#">บทความและข่าวสาร</a></li>
                <li><a href="#" class="login">เข้าสู่ระบบ</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="containner">
    @yield('content')
</div>
<div class="footer">
    <div class="slide-up"></div>
    <div class="wrap">
        <div class="contact">
            <h2>ติดต่อเรา</h2>
            <p class="tel">019223 8092344</p>
            <p class="mail">info@appstraptheme.com</p>
            <p class="address">Sunshine House, Sunville. SUN12 8LU.</p>
        </div>
        <div class="about">
            <h2>เกี่ยวกับเรา</h2>
            <p>Making the web a prettier place one template at a time! We make beautiful, quality, responsive Drupal & web templates!</p>
        </div>
        <div class="link">
            <h2>ลิงค์ที่น่าสนใจ</h2>
            <a href="#">ร้านค้า/สาขา ทั้งหมด</a>
            <a href="#">โครงการทั้งหมด</a>
            <a href="#">บทความที่น่าสนใจ</a>
        </div>
    </div>
</div>

@yield('jsbody')

</body>
</html>
