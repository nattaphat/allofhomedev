<ul class="nav navbar-nav">
    <li class="home-link">
        <a href="{{ URL::to('/') }}"><i class="fa fa-home"></i><span class="hidden">Home</span></a>
    </li>
  
    {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" id="pages-drop" data-toggle="dropdown" data-hover="dropdown">เมนูหลัก</a> --}}
        {{--<!-- Menu -->--}}
        {{--<ul class="dropdown-menu" role="menu" aria-labelledby="pages-drop">--}}
            {{--<li class="dropdown dropdown-submenu">--}}
                {{--<a --}}
                    {{--href="{{ URL::route('aboutus_basic') }}" --}}
                    {{--class="dropdown-toggle" --}}
                    {{--id="about-drop" --}}
                    {{--data-toggle="dropdown" --}}
                    {{--data-hover="dropdown" --}}
                    {{--data-close-others="false">โครงการบ้านใหม่</a> --}}
                {{--<!-- Dropdown Menu -->--}}
                {{--<ul class="dropdown-menu" role="menu" aria-labelledby="about-drop">--}}
                    {{--<li role="presentation">--}}
                        {{--<a role="menuitem" href="{{ URL::route('aboutus_basic') }}" tabindex="-1" class="menu-item">About Us Basic <i class="new-tag">Updated!</i></a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation">--}}
                        {{--<a role="menuitem" href="{{ URL::route('aboutus_extend') }}" tabindex="-1" class="menu-item">About Us Extended <i class="new-tag">New!</i></a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation">--}}
                        {{--<a role="menuitem" href="{{ URL::route('aboutus_me') }}" tabindex="-1" class="menu-item">About Me <i class="new-tag">New!</i></a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation">--}}
                        {{--<a role="menuitem" href="{{ URL::route('teamlist') }}" tabindex="-1" class="menu-item">Team List <i class="new-tag">Updated!</i></a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation">--}}
                        {{--<a role="menuitem" href="{{ URL::route('teamgrid') }}" tabindex="-1" class="menu-item">Team Grid <i class="new-tag">New!</i></a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation">--}}
                        {{--<a role="menuitem" href="{{ URL::route('teammemb') }}" tabindex="-1" class="menu-item">Team Member <i class="new-tag">New!</i></a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation">--}}
                        {{--<a role="menuitem" href="{{ URL::route('contact') }}" tabindex="-1" class="menu-item">Contact</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown dropdown-submenu">--}}
                {{--<a href="{{ URL::route('pricing') }}" class="dropdown-toggle" id="pricing-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">โครงการทาวน์โฮมใหม่</a> --}}
                {{--<!-- pricing pages -->--}}
                {{--<ul class="dropdown-menu" role="menu" aria-labelledby="pricing-drop">--}}
                    {{--<li role="presentation"><a role="menuitem" href="{{ URL::route('pricing') }}" tabindex="-1" class="menu-item">Pricing Plans</a></li>--}}
                    {{--<li role="presentation"><a role="menuitem" href="{{ URL::route('pricing_table') }}" tabindex="-1" class="menu-item">Comparison Tables</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown dropdown-submenu">--}}
                {{--<a href="{{ URL::route('timeline') }}" class="dropdown-toggle" id="timeline-drop" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">โครงการคอนโดใหม่</a> --}}
                {{--<!-- timelines -->--}}
                {{--<ul class="dropdown-menu" role="menu" aria-labelledby="timeline-drop">--}}
                    {{--<li role="presentation"><a role="menuitem" href="{{ URL::route('timeline') }}" tabindex="-1" class="menu-item">Timeline Default</a></li>--}}
                    {{--<li role="presentation"><a role="menuitem" href="{{ URL::route('timelineleft') }}" tabindex="-1" class="menu-item">Timeline Left</a></li>--}}
                    {{--<li role="presentation"><a role="menuitem" href="{{ URL::route('timelineright') }}" tabindex="-1" class="menu-item">Timeline Right</a></li>--}}
                    {{--<li role="presentation"><a role="menuitem" href="{{ URL::route('timelinestacked') }}" tabindex="-1" class="menu-item">Timeline Stacked</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="{{ URL::route('home_index') }}" class="menu-item">โครงการบ้านใหม่</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{ URL::route('custumers') }}" class="menu-item">โครงการทาวน์โฮมใหม่</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{ URL::route('custumers') }}" class="menu-item">โครงการคอนโดใหม่</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{ URL::route('custumers') }}" class="menu-item">ออกแบบภายใน ภายนอก</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="{{ URL::route('features') }}" class="menu-item">ที่ดินเปล่า</a></li>--}}
            {{--<li role="presentation">--}}
                {{--<a role="menuitem" href="{{ URL::route('signin') }}" tabindex="-1" class="menu-item">เฟอร์นิเจอร์ ของตกแต่ง</a>--}}
            {{--</li>--}}
            {{--<li role="presentation">--}}
                {{--<a role="menuitem" href="{{ URL::route('signup') }}" tabindex="-1" class="menu-item">เครื่องใช้ไฟฟ้า</a>--}}
            {{--</li>--}}
            {{--<li role="presentation">--}}
                {{--<a role="menuitem" href="{{ URL::route('starter') }}" tabindex="-1" class="menu-item">เครื่องครัว สุขภัณฑ์</a>--}}
            {{--</li>--}}
            {{--<li role="presentation">--}}
                {{--<a role="menuitem" href="{{ URL::route('custumers') }}" tabindex="-1" class="menu-item">วัสดุก่อสร้าง รับเหมา</a>--}}
            {{--</li>--}}
            {{--<li role="presentation">--}}
                {{--<a role="menuitem" href="{{ URL::route('index_boxed') }}" tabindex="-1" class="menu-item">ดูแลสวน</a>--}}
            {{--</li>--}}
            {{--<li role="presentation">--}}
                {{--<a role="menuitem" href="{{ URL::route('custumers') }}" tabindex="-1" class="menu-item">เฟอร์โบราณเก่าเก็บ</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
  
    <li class="dropdown">
        <a 
            href="{{ URL::route('blog') }}" 
            class="dropdown-toggle" 
            id="blog-drop" 
            data-toggle="dropdown" 
            data-hover="dropdown">รีวิวทั้งหมด</a> 
        <!-- Dropdown Menu -->
        <ul class="dropdown-menu" role="menu" aria-labelledby="blog-drop">
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('blog') }}" tabindex="-1" class="menu-item">Blog List Right Sidebar <i class="new-tag">Updated!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('blogleft') }}" tabindex="-1" class="menu-item">Blog List Left Sidebar <i class="new-tag">Updated!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('blogtimeline') }}" tabindex="-1" class="menu-item">Blog List Timeline <i class="new-tag">New!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('bloggrid') }}" tabindex="-1" class="menu-item">Blog List Grid <i class="new-tag">New!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('blogpost') }}" tabindex="-1" class="menu-item">Blog Post <i class="new-tag">Updated!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('blogvdo') }}" tabindex="-1" class="menu-item">Blog Post With Video <i class="new-tag">New!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('blogpostslide') }}" tabindex="-1" class="menu-item">Blog Post With Slideshow <i class="new-tag">New!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('blogpostaudio') }}" tabindex="-1" class="menu-item">Blog Post With Audio Clip <i class="new-tag">New!</i></a>
            </li>
        </ul>
    </li>
  
    <li class="dropdown dropdown-full">
        <a 
            href="#" 
            class="dropdown-toggle menu-item" 
            id="megamenu-drop" 
            data-toggle="dropdown" 
            data-hover="dropdown">ไอเดีย</a> 
        <!-- Dropdown Menu - Mega Menu -->
        <ul class="dropdown-menu mega-menu" role="menu" aria-labelledby="megamenu-drop">
            <li role="presentation" class="dropdown-header">Mega Menu with links & text items</li>
            <li role="presentation">
                <ul class="row list-unstyled" role="menu">
                    <li class="col-md-3" role="presentation">
                        <a role="menuitem" href="{{ URL::route('features') }}" class="img-link">
                            <img src="{{ asset('img/features/feature-1.png' )}} " alt="Feature 1" />
                        </a>
                        <a role="menuitem" href="features.htm" tabindex="-1" class="menu-item">
                            <strong>Mobile Friendly</strong>
                        </a>
                        <span>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                    </li>
                    <li class="col-md-3" role="presentation">
                        <a role="menuitem" href="{{ URL::route('features') }}" class="img-link">
                            <img src="{{ asset('img/features/feature-2.png' )}}" alt="Feature 2" />
                        </a>
                        <a role="menuitem" href="features.htm" tabindex="-1" class="menu-item">
                            <strong>24/7 Support</strong>
                        </a>
                        <span>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                    </li>
                    <li class="col-md-3" role="presentation">
                        <a role="menuitem" href="{{ URL::route('features') }}" class="img-link">
                            <img src="{{ asset('img/features/feature-3.png' )}}" alt="Feature 3" />
                        </a>
                        <a role="menuitem" href="features.htm" tabindex="-1" class="menu-item"><strong>99% Uptime</strong></a>
                        <span>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                    </li>
                    <li class="col-md-3" role="presentation">
                        <a role="menuitem" href="{{ URL::route('features') }}" class="img-link">
                            <img src="{{ asset('img/features/feature-4.png' )}}" alt="Feature 4" />
                        </a>
                        <a role="menuitem" href="features.htm" tabindex="-1" class="menu-item"><strong>Upgrade Assistance</strong></a>
                        <span>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio!</span> 
                    </li>
                </ul>
            </li>
        </ul>
    </li>
  
    <li class="dropdown">
        <a href="#" 
            class="dropdown-toggle" 
            id="more-drop" 
            data-toggle="dropdown" 
            data-hover="dropdown">กระทู้ทั้งหมด</a> 
        <!-- Mega Menu -->
        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="more-drop">
            <!--<li class="dropdown dropdown-submenu dropdown-menu-left">
                <a 
                    href="headers.htm" 
                    class="dropdown-toggle" 
                    id="headers-drop" 
                    data-toggle="dropdown" 
                    data-hover="dropdown" 
                    data-close-others="false">Header Variations</a> -->
                <!-- Header variations -->
                <!--<ul class="dropdown-menu" role="menu" aria-labelledby="headers-drop">
                    <li role="presentation"><a role="menuitem" href="header-old.htm" tabindex="-1" class="menu-item">Header Old</a></li>
                    <li role="presentation"><a role="menuitem" href="header-old-full.htm" tabindex="-1" class="menu-item">Header Old Full Width</a></li>
                </ul> 
            </li> -->
            <li class="dropdown dropdown-submenu dropdown-menu-left">
                <a 
                    href="sliders.htm" 
                    class="dropdown-toggle" 
                    id="slider-drop" 
                    data-toggle="dropdown" 
                    data-hover="dropdown" 
                    data-close-others="false">Sliders</a> 
                <!-- Sliders -->
                <ul class="dropdown-menu" role="menu" aria-labelledby="slider-drop">
                    <!--Slider Revolution -->
                    <li role="presentation" class="dropdown-header">Slider Revolution</li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('sliderdefault') }}" tabindex="-1" class="menu-item">Default</a>
                        </li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('sliderfull') }}" tabindex="-1" class="menu-item">Full Width</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('sliderbehide') }}" tabindex="-1" class="menu-item">Behind Navbar</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('sliderboxed') }}" tabindex="-1" class="menu-item">Boxed</a>
                    </li>
                    <!--Backstretch Slider-->
                    <li role="presentation" class="dropdown-header">Backstretch</li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('backstretch') }}" tabindex="-1" class="menu-item">Background Slideshow</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('backstretchboxed') }}" tabindex="-1" class="menu-item">Boxed Background Slideshow</a>
                    </li>
                    <!--Flexslider-->
                    <li role="presentation" class="dropdown-header">Flexslider</li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('flexslider_default') }}" tabindex="-1" class="menu-item">Default</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('flexslider_full') }}" tabindex="-1" class="menu-item">Full Width</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('flexslider_behide') }}" tabindex="-1" class="menu-item">Behind Navbar</a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="{{ URL::route('flexslider_boxed') }}" tabindex="-1" class="menu-item">Boxed</a>
                    </li>
                </ul>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('elements') }}" tabindex="-1" class="menu-item">Theme Elements <i class="new-tag">Updated!</i></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('colours') }}" tabindex="-1" class="menu-item">Theme Colours</a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="{{ URL::route('bs_mobilemenu') }}" tabindex="-1" class="menu-item">Bootstrap Mobile Menu</a>
            </li>
        </ul>
    </li>
</ul>