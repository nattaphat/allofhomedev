<ul class="nav navbar-nav">
    <li class="home-link">
        <a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a>
    </li>

    <li class="dropdown">
        <a href="{{ URL::to('review/index') }}" style="font-size: 18px; font-weight: bold;">รีวิวทั้งหมด</a>
    </li>

    <li class="dropdown">
        <a href="{{ URL::to('idea/index') }}" style="font-size: 18px; font-weight: bold;">ไอเดียทั้งหมด</a>
    </li>

    <li class="dropdown">
        <a href="{{ URL::to('article/index') }}" style="font-size: 18px; font-weight: bold;">บทความและข่าวสาร</a>
    </li>

    @if((Auth::check() || Auth::viaRemember()) && (Auth::user()->role == 1 || Auth::user()->role == 2) )
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" id="pages-drop" data-toggle="dropdown" data-hover="dropdown" style="font-size: 18px; font-weight: bold;">ตั้งค่า</a>
        <!-- Menu -->
        <ul class="dropdown-menu" role="menu" aria-labelledby="pages-drop">
            <li class="dropdown">
                <a href="{{ URL::to('project/index') }}">โครงการทั้งหมด</a>
            </li>
            <li class="dropdown">
                <a href="{{ URL::to('article/admin_index') }}">บทความและข่าวสาร</a>
            </li>
            {{--<li class="dropdown">--}}
                {{--<a href="{{ URL::to('review/admin_index') }}">รีวิว</a>--}}
            {{--</li>--}}
            {{--<li class="dropdown">--}}
                {{--<a href="{{ URL::to('idea/admin_index') }}">ไอเดีย</a>--}}
            {{--</li>--}}
        </ul>
    </li>
    @endif

</ul>