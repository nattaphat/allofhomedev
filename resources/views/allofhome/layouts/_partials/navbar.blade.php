<nav class="navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('myadmin')}}">HAII</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="hidden-xs hidden-sm" {{ (Request::is('myadmin/dashboard') ? 'class="active"' : '') }}><a href="{{ URL::to('/myadmin/') }}/{{ Config::get('myadmin/site.home_page') }}" title="Dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" title="Web"><i class="fa fa-external-link"></i> Web <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- calendars -->
                        <li><a href="http://www.haii.or.th/intranet" target="_blank"><i class="fa fa-lock"></i> Old Intranet</a></li>
                        <li><a href="http://www.haii.or.th/lo" target="_blank"><i class="fa fa-lock"></i> Learning Organization (LO)</a></li>
                        <li><a href="http://www.haii.or.th" target="_blank">HAII</a></li>
                        <li class="divider"></li>
                        <li><a href="http://hlive1.haii.or.th/water_group3/" target="_blank"><i class="fa fa-lock"></i> ระบบเอกสาร คสช</a></li>
                        <li><a href="http://tiwrm.haii.or.th/Group3_WaterIT/" target="_blank"><i class="fa fa-lock"></i> ระบบเอกสาร คสช (ตัวเก่า)</a></li>
                        <li class="divider"></li>
                        <li><a href="http://www.haii.or.th" target="_blank">HAII</a></li>
                        <li><a href="http://www.thaiwater.net" target="_blank">Thaiwater</a></li>
                        <li><a href="http://www.nhc.in.th" target="_blank">NHC</a></li>
                        <li><a href="http://www.nhc.in.th/web/index.php?model=warroom&theme=warroom" target="_blank">Warroom</a></li>
                        <li><a href="http://provinces.nhc.in.th" target="_blank">ศูนย์บริหารจัดการน้ำจังหวัด</a></li>
                        <li class="divider"></li>
                        <li><a href="http://nhc.in.th/databank/index.php?model=warroom" target="_blank"><i class="fa fa-warning"></i> Databank (Depricated)</a></li>
                        <!-- // calendars -->
                    </ul>
                </li>
                <li {{ (Request::is('address') ? 'class="active"' : '') }}><a href="{{ URL::to('/myadmin/addressbook') }}" title="Address Books"><i class="fa fa-book"></i> Address Books</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" title="Calendar"><i class="fa fa-calendar"></i> Calendar <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- calendars -->
                        <li><a href="https://www.google.com/calendar/embed?src=jobrd005%40gmail.com&ctz=Asia/Bangkok" target="_blank"><i class="fa fa-calendar"></i> ปฏิทิน R&D</a></li>
                        <li><a href="https://www.google.com/calendar/embed?src=hydroagro001%40gmail.com&ctz=Asia/Bangkok" target="_blank"><i class="fa fa-calendar-o"></i> ปฏิทิน อ.รอยล</a></li>
                        <li><a href="https://www.google.com/calendar/embed?src=hydroagro005%40gmail.com&ctz=Asia/Bangkok" target="_blank"><i class="fa fa-calendar-o"></i> ปฏิทิน คุณจารุมน</a></li>
                        <li><a href="https://www.google.com/calendar/embed?src=hydroagro002%40gmail.com&ctz=Asia/Bangkok" target="_blank"><i class="fa fa-calendar-o"></i> ปฏิทิน อ.สุทัศน์</a></li>
                        <!-- // calendars -->
                    </ul>
                </li>
                <li class="hidden-xs hidden-sm" {{ (Request::is('address') ? 'class="active"' : '') }}><a href="{{ URL::to('/myadmin/feedback/user/create') }}" title="Feedback"><i class="fa fa-comment"></i> Feedback</a></li>
            </ul>
          
            <ul class="nav navbar-nav navbar-right">
                @if (Sentry::check())
                    @if (count(Config::get('myadmin/site.locales')) > 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" title="Change Language"><img src="{{ asset('img/flag/th.png') }}"> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!-- locales -->
                            @foreach (Config::get('myadmin/site.locales') AS $flag => $locale)
                               <li><a href="#"><img src="{{ asset('img/flag/') }}/{{ $flag }}.png"> {{ $locale }}</a></li>
                            @endforeach
                            <!-- // locales -->
                        </ul>
                    </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            @if (Sentry::getUser()->img)
                                <img src="{{ Image::resize('/uploads/employee_img/' . Sentry::getUser()->img, 23) }}" alt="display pic">
                            @else
                                <i class="fa fa-fw fa-user"></i> 
                            @endif
                            {{ Sentry::getUser()->email }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ URL::to('myadmin/users/setting') }}"><i class="fa fa-fw fa-cogs"></i> Settings</a></li>
                            <li><a href="{{ URL::to('myadmin/users') }}/edit/{{ Sentry::getUser()->id }}"><i class="fa fa-fw fa-pencil"></i> My Account</a></li>
                            <li><a href="{{ URL::to('myadmin/users') }}/changepassword"><i class="fa fa-fw fa-key"></i> Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::to('myadmin/users/logout') }}"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- side panel -->
                    @if (Config::get('myadmin/site.use_side_panel') === true)
                        <li><a href="#" title="Sidebar" class="sidebar-trigger"><i class="fa fa-arrow-circle-left"></i> Sidebar&nbsp;&nbsp;&nbsp;</a>
                        </li>
                    @endif
                    <!-- // side panel -->
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
