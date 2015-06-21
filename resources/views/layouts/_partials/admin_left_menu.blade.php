<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{ URL::to('backend/index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            @if(\Auth::getUser()->role == "1")
            <li>
                <a href="{{ URL::to('backend/newPost') }}" onclick="alert('under construction'); return false;"><i class="fa fa-legal fa-fw"></i> พิจารณาอนุมัติกระทู้ใหม่</a>
            </li>
            @endif
            <li>
                <a href="{{ URL::to('backend/brand') }}"> แบรนด์</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/project') }}"> โครงการทั้งหมด</a>
            </li>
            <li style="display:none;">
                <a href="{{ URL::to('#') }}"> ร้านค้าทั้งหมด</a>
            </li>
            <li>
                <a href="{{ URL::to('#') }}"> บทความและข่าวสาร</a>
            </li>
            <li>
                <a href="{{ URL::to('#') }}"> รีวิวทั้งหมด</a>
            </li>
            <li>
                <a href="{{ URL::to('#') }}"> ไอเดียทั้งหมด</a>
            </li>
            <li style="display:none;">
                <a href="{{ URL::to('backend/news') }}" onclick="alert('under construction'); return false;"> ข้อมูลข่าวสารสมาชิก</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/user') }}"> ผู้ใช้งานระบบ</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/banner') }}"> ข้อมูล Banner</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/category') }}"> ประกาศหมวดหมู่</a>
            </li>
            <li style="display:none;">
                <a href="{{ URL::to('backend/businessShop') }}" onclick="alert('under construction'); return false;"> ประเภทธุรกิจร้านค้า</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/facility') }}"> สิ่งอำนวยความสะดวก</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/discount') }}"> ส่วนลด/โปรโมชั่น</a>
            </li>
            <li>
                <a href="#"> ข้อมูลสถานที่<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('backend/bts') }}">BTS</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('backend/mrt') }}">MRT</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('backend/airportLink') }}">Airport Link</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"> ทำเล/ย่าน<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('backend/location') }}">หมวดหมู่ ทำเล/ย่าน</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('backend/subArea') }}">ข้อมูล ทำเล/ย่าน</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"> ข้อมูล Tag<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ URL::to('backend/tag') }}">หมวดหมู่ Tag</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('backend/subTag') }}">ข้อมูล Tag</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>