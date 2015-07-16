<h1 class="nodropdown"><a href="{{ url('/') }}">www.allofhome.com</a></h1>

<!-- Banner A -->
<div class="banner-top nodropdown"><img src="{{ asset('images/test/banner-1.jpg') }}" alt="" /></div>

<nav>
    <ul>
        <li class="home nodropdown">
            <a href="{{ url('/') }}">&nbsp;&nbsp;</a>
        </li>
        <li class="dropdown">
            <a href="#">โครงการบ้านใหม่</a>
            <ul class="sub-menu">
                <li><a href="{{ url('home') }}">บ้านเดี่ยว</a></li>
                <li><a href="{{ url('townhome') }}">ทาวน์โฮม</a></li>
                <li><a href="{{ url('condo') }}">คอนโด</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#">รับสร้างบ้าน / ช่างซ่อม</a>
            <ul class="sub-menu">
                <li><a href="{{ url('construct') }}">รับสร้างบ้าน</a></li>
                <li><a href="{{ url('enlarge') }}">ค้นหาช่างซ่อม / ต่อเติม</a></li>
                <li><a href="{{ url('constructor') }}">ผู้รับเหมาก่อสร้าง</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#">ร้านค้าและบริการ</a>
            <ul class="sub-menu">
                <li><a href="{{ url('shop') }}">ร้านค้าต่างๆ</a></li>
                <li><a href="{{ url('garden') }}">บริการจัดสวน</a></li>
                <li><a href="{{ url('clean') }}">บริการทำความสะอาด</a></li>
                <li><a href="{{ url('interior') }}">ออกแบบภายใน / ภายนอก</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#">ซื้อ / ขาย / เช่า</a>
            <ul class="sub-menu">
                <li><a href="{{ url('land') }}">ที่ดิน</a></li>
                <li><a href="{{ url('secondhand') }}">ที่อยู่อาศัยมือสอง</a></li>
                <li><a href="{{ url('rent') }}">ปล่อยเช่า</a></li>
                <li><a href="{{ url('apartment') }}">อพาร์ทเม้นท์</a></li>
            </ul>
        </li>
        <li class="nodropdown">
            <a href="{{ url('article_idea') }}">บทความ / ไอเดีย</a>
        </li>
        <li class="login nodropdown">
            <a href="#" class="login">เข้าสู่ระบบ</a>
        </li>
    </ul>
</nav>

<!--
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
-->
