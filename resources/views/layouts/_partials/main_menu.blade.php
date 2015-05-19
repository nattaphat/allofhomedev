<ul class="nav navbar-nav">
    <li class="home-link">
        <a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a>
    </li>

    <li class="dropdown">
        <a href="{{ URL::to('review/index') }}">รีวิวทั้งหมด</a>
    </li>

    <li class="dropdown">
        <a href="{{ URL::to('idea/index') }}">ไอเดียทั้งหมด</a>
    </li>

    <li class="dropdown">
        <a href="{{ URL::to('article/index') }}">บทความและข่าวสาร</a>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" id="pages-drop" data-toggle="dropdown" data-hover="dropdown">เมนูอื่นๆ</a>
        <!-- Menu -->
        <ul class="dropdown-menu" role="menu" aria-labelledby="pages-drop">
            <li class="dropdown">
                <a href="{{ URL::to('buysellrent/index') }}">กระทู้ทั้งหมด (ซื้อ ขาย เช่า)</a>
            </li>
            <li class="dropdown">
                <a href="{{ URL::to('2hand/index') }}">ของใช้ภายในบ้าน (มือสอง)</a>
            </li>
            <li class="dropdown">
                <a href="{{ URL::to('job/index') }}">ประกาศรับสมัครงาน</a>
            </li>
        </ul>
    </li>
</ul>