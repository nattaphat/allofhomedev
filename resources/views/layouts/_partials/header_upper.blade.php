<div class="row">
    <div class="col-xs-8 col-xs-push-4">
        <!--Show/hide trigger for #hidden-header -->
        {{--<div id="header-hidden-link">--}}
            {{--<a--}}
                    {{--href="#"--}}
                    {{--title="Click me you'll get a surprise"--}}
                    {{--class="show-hide"--}}
                    {{--data-toggle="show-hide"--}}
                    {{--data-target=".header-hidden"--}}
                    {{--data-callback="searchFormFocus"><i></i>Open</a>--}}
        {{--</div>--}}

        <!--social media icons-->
        @if (Auth::check())
        <div class="navbar-collapse collapse pull-right">
            <!--@todo: replace with company social media details-->
            <ul class="nav navbar-nav">
                {{--<li>--}}
                    {{--<a href="{{ URL::route('post_add') }}"><i class="glyphicon glyphicon-plus"></i> เพิ่มประกาศ</a>--}}
                {{--</li>--}}
                <li>
                    <a href="{{ URL::route('user_msg') }}" class="btn btn-link"> <i class="glyphicon glyphicon-envelope" title="ข้อความ"></i></a>
                </li>
                <li class="dropdown">
                    <a
                            href="#"
                            class="dropdown-toggle"
                            id="blog-drop"
                            data-toggle="dropdown"
                            data-hover="dropdown">บัญชีผู้ใช้</a>
                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu" role="menu" aria-labelledby="blog-drop">
                        <li role="presentation">
                            <a role="menuitem" href="{{ URL::route('user_accinfo') }}" tabindex="-1" class="menu-item">หน้าของฉัน</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" href="{{ URL::route('user_usage') }}" tabindex="-1" class="menu-item">จัดการข้อมูลส่วนตัว</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" href="{{ URL::route('user_passwd') }}" tabindex="-1" class="menu-item">เปลี่ยนรหัสผ่าน</a>
                        </li>
                        <li role="presentation">
                            <a role="menuitem" href="{{ URL::to('signout') }}" tabindex="-1" class="menu-item">ออกจากระบบ</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
        @endif

    </div>
    <div class="col-xs-4 col-xs-pull-8">
        @if (!Auth::check())
        <!--user menu-->
        <div class="btn-group user-menu">
            <a href="login.htm" class="btn btn-link login-mobile"><i class="fa fa-user"></i></a>
            {{--<a href="#signup-modal" class="btn btn-link signup" data-toggle="modal">ลงทะเบียน</a>--}}
            <a href="{{ URL::to('signup') }}" class="btn btn-link signup" data-toggle="modal">ลงทะเบียน</a>
            <!--</li>-->
            <a href="{{ URL::to('login') }}" class="btn btn-link login" data-toggle="modal">เข้าสู่ระบบ</a>
            <!-- <div class="btn-group language-menu"> -->
            <!--language menu-->
            <!--<a href="#en"
                class="btn btn-link dropdown-toggle"
                data-toggle="dropdown">
                <span class="flag-icon flag-icon-gb"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-mini dropdown-menu-primary">
                <li>
                  <a href="#es" class="lang-es"><span class="flag-icon flag-icon-es"></span> Spanish</a>
                </li>
                <li>
                  <a href="#pt" class="lang-pt"><span class="flag-icon flag-icon-pt"></span> Portguese</a>
                </li>
                <li>
                  <a href="#cn" class="lang-cn"><span class="flag-icon flag-icon-cn"></span> Chinese</a>
                </li>
                <li>
                  <a href="#se" class="lang-se"><span class="flag-icon flag-icon-se"></span> Swedish</a>
                </li>
            </ul>
        </div> -->
        </div>
        @endif
    </div>
</div>