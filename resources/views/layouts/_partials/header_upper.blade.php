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
        <div class="social-media">
            <!--@todo: replace with company social media details-->
            <a href="#"> <i class="fa fa-user fa-1"></i> </a>
            <a href="#"> <i class="fa fa-star fa-1"></i> </a>
            <a href="#"> <i class="fa fa-envelope fa-1"></i> </a>
            <a href=" {{ URL::to('signout') }}"> <i class="fa fa-sign-out fa-1"></i> </a>
        </div>
        @endif

    </div>
    <div class="col-xs-4 col-xs-pull-8">
        <!--user menu-->
        <div class="btn-group user-menu">
            <a href="login.htm" class="btn btn-link login-mobile"><i class="fa fa-user"></i></a>
            {{--<a href="#signup-modal" class="btn btn-link signup" data-toggle="modal">ลงทะเบียน</a>--}}
            <a href="{{ URL::to('signup') }}" class="btn btn-link signup" data-toggle="modal">ลงทะเบียน</a>
            <!--</li>-->
            <a href="{{ URL::to('signin') }}" class="btn btn-link login" data-toggle="modal">เข้าสู่ระบบ</a>
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
    </div>
</div>