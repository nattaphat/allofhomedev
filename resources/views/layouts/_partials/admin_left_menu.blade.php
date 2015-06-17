<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{ URL::to('backend/index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/user') }}"><i class="fa fa-user fa-fw"></i> จัดการผู้ใช้งานระบบ</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/newPost') }}"><i class="fa fa-legal fa-fw"></i> พิจารณาอนุมัติกระทู้ใหม่</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/banner') }}"><i class="fa fa-th-large fa-fw"></i> ข้อมูล Banner</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/news') }}"><i class="fa fa-envelope fa-fw"></i> ข้อมูลข่าวสารสมาชิก</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/category') }}"><i class="fa fa-home fa-fw"></i> ประกาศหมวดหมู่</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/businessShop') }}"><i class="fa fa-coffee fa-fw"></i> ประเภทธุรกิจร้านค้า</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-map-marker fa-fw"></i> ข้อมูลสถานที่<span class="fa arrow"></span></a>
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
                    <li>
                        <a href="{{ URL::to('backend/location') }}">ทำเล/ย่าน</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ URL::to('backend/facility') }}"><i class="fa fa-heart fa-fw"></i> สิ่งอำนวยความสะดวก</a>
            </li>
            <li>
                <a href="{{ URL::to('backend/discount') }}"><i class="fa fa-star fa-fw"></i> ส่วนลด/โปรโมชั่น</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-tag fa-fw"></i> ข้อมูล Tag<span class="fa arrow"></span></a>
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