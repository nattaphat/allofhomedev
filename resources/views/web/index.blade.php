@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jsbody')
    @if (Session::has('notifyUser'))
        <?php list($title, $message, $type) = explode('|', Session::get('notifyUser')); ?>

        <script>
            $.notify({
                // options
                icon: 'glyphicon glyphicon-bullhorn',
                title: '{{ $title }}',
                message: '{{$message}}'
            },{
                // settings
                element: 'body',
                position: null,
                type: "{{ $type }}",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: "bottom",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title"><b>{1} </b> </br> </span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        </script>
    @endif

@stop

@section('content')
	<div class="container">

        {{--บทความและข่าวสาร--}}
        <div class="row">
            <div class="col-md-9" style="padding-left: 80px;">
                <img src="http://smart-retailer.com/wp-content/uploads/rod_2.jpg"
                     alt="Feature 1" class="img-responsive" />
                <h3 class="title">
                    <a href="#">หัวข้อบทความและข่าวสาร</a>
                </h3>
                <p>รายละเอียดบทความและข่าวสาร</p>
            </div>
            <div class="col-md-3">
                <div>
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Feature 1" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Feature 1" class="img-responsive" />
                    </a>
                </div>
            </div>
        </div>

        <br><br>

        {{--อ่านรีวิวทั้งหมด--}}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div style="padding-top: 90px">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="block features">
                            <h2 class="title-divider">
                                <span>อ่านรีวิวทั้งหมด</span>
                                <small>ความคิดเห็นเกี่ยวกับ ร้านค้า/โครงการ โดยสมาชิก</small>
                            </h2>
                            <div class="row">
                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th//images/img_v/BuyHome/57/2012_12_26_11_27_59.jpg"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อรีวิว</a>
                                    </h3>
                                    <p>รายละเอียดรีวิว</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th//images/img_v/BuyHome/57/2013_1_9_15_10_3.jpg"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อรีวิว</a>
                                    </h3>
                                    <p>รายละเอียดรีวิว</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th//images/img_v/BuyHome/57/2013_1_16_16_19_50.jpg"
                                             alt="Feature 4" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อรีวิว</a>
                                    </h3>
                                    <p>รายละเอียดรีวิว</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        {{--อ่านไอเดียทั้งหมด--}}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div style="padding-top: 90px">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="block features">
                            <h2 class="title-divider">
                                <span>อ่านไอเดียทั้งหมด</span>
                                <small>ไอเดียตกแต่งบ้าน DIY เก๋ๆ</small>
                            </h2>
                            <div class="row">
                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="data:image/jpeg;base64,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"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อไอเดีย</a>
                                    </h3>
                                    <p>รายละเอียดไอเดีย</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQdKdTuG9i4OtllL-Z5tq2Z9j5EDsdzyVWpEycE2x9O3r8w_sOB"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อไอเดีย</a>
                                    </h3>
                                    <p>รายละเอียดไอเดีย</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS9gYHJOuwzRnDHwmsFyeJx8EwukuMBLuw-lt3xEPPjwuBNqRLM"
                                             alt="Feature 4" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อไอเดีย</a>
                                    </h3>
                                    <p>รายละเอียดไอเดีย</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        {{--อ่านกระทู้ทั้งหมด--}}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row" style="padding-top: 90px">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                        <div class="row" style="padding-top: 20px">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="block features">
                            <h2 class="title-divider">
                                <span>อ่านกระทู้ทั้งหมด</span>
                                <small>ประกาศซื้อ ขาย เช่า ให้เช่า บ้าน คอนโด ทาวโฮม</small>
                            </h2>
                            <div class="row">
                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th/BaanBaan/uploads/pictures/1622716839.jpeg"
                                             alt="Feature 1" class="img-responsive" />
                                    </a>

                                    <h3 class="title">
                                        <a href="#">หัวข้อประกาศ</a>
                                    </h3>
                                    <p>รายละเอียดประกาศ</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th/BaanBaan/uploads/pictures/407854700.jpg"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อประกาศ</a>
                                    </h3>
                                    <p>รายละเอียดประกาศ</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th/BaanBaan/uploads/pictures/4433995.jpeg"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อประกาศ</a>
                                    </h3>
                                    <p>รายละเอียดประกาศ</p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th/BaanBaan/uploads/pictures/9a7f2d7ef6844feeb7387536d923307a.jpg"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อประกาศ</a>
                                    </h3>
                                    <p>รายละเอียดประกาศ</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th/BaanBaan/uploads/pictures/15498815.jpeg"
                                             alt="Feature 3" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อประกาศ</a>
                                    </h3>
                                    <p>รายละเอียดประกาศ</p>
                                </div>

                                <div class="feature col-md-4">
                                    <a href="#">
                                        <img src="http://www.home.co.th/BaanBaan/uploads/pictures/1TH00001200805021631321138347280033mai.jpg"
                                             alt="Feature 4" class="img-responsive" />
                                    </a>
                                    <h3 class="title">
                                        <a href="#">หัวข้อประกาศ</a>
                                    </h3>
                                    <p>รายละเอียดประกาศ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        {{--Banner--}}
        <div class="row">
            <div class="feature col-sm-6 col-md-3">
                <a href="#">
                    <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                         alt="Feature 1" class="img-responsive" />
                </a>
            </div>
            <div class="feature col-sm-6 col-md-3">
                <a href="#">
                    <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                         alt="Feature 1" class="img-responsive" />
                </a>
            </div>
            <div class="feature col-sm-6 col-md-3">
                <a href="#">
                    <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                         alt="Feature 1" class="img-responsive" />
                </a>
            </div>
            <div class="feature col-sm-6 col-md-3">
                <a href="#">
                    <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                         alt="Feature 1" class="img-responsive" />
                </a>
            </div>
        </div>

        <br><br>

        {{--สมัครงานกับบริษัทชั้นนำต่างๆ--}}
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div class="block features">
                                <h2 class="title-divider">
                                    <span>สมัครงานกับบริษัทชั้นนำต่างๆ</span>
                                    <small>ประกาศรับสมัครงาน</small>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="feature col-sm-6 col-md-3">
                        <a href="#">
                            <img src="http://www.home.co.th//images/img_v/BuyHome/title-05042558-751-P4220106.JPG"
                                 alt="Feature 1" class="img-responsive" />
                        </a>
                    </div>
                    <div class="feature col-sm-18 col-md-9">
                        <a href="#">
                            ข้อความประกาศรับสมัครงาน
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="feature col-sm-6 col-md-3">
                        <a href="#">
                            <img src="http://www.home.co.th//images/img_v/BuyHome/title-03232558-1444-P-1.jpg"
                                 alt="Feature 1" class="img-responsive" />
                        </a>
                    </div>
                    <div class="feature col-sm-18 col-md-9">
                        <a href="#">
                            ข้อความประกาศรับสมัครงาน
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="feature col-sm-6 col-md-3">
                        <a href="#">
                            <img src="http://www.home.co.th//images/img_v/BuyHome/title-02272558-1511-_MG_3196-2.jpg"
                                 alt="Feature 1" class="img-responsive" />
                        </a>
                    </div>
                    <div class="feature col-sm-18 col-md-9">
                        <a href="#">
                            ข้อความประกาศรับสมัครงาน
                        </a>
                    </div>
                </div>
            </div>
        </div>


	    {{--<!-- Services -->--}}
	    {{--<div class="block features">--}}
	      {{--<h2 class="title-divider">--}}
	        {{--<span>Core <span class="de-em">Features</span></span>--}}
	        {{--<small>Core features included in all plans.</small>--}}
	      {{--</h2>--}}
	      {{--<div class="row">--}}
	        {{--<div class="feature col-sm-6 col-md-3">--}}
	          {{--<a href="features.htm">--}}
	            {{--<img src="{{ asset('img/features/feature-1.png' ) }}" alt="Feature 1" class="img-responsive" />--}}
	          {{--</a>--}}
	          {{--<h3 class="title">--}}
	            {{--<a href="features.htm">Mobile <span class="de-em">Friendly</span></a>--}}
	          {{--</h3>--}}
	          {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
	        {{--</div>--}}
	        {{--<div class="feature col-sm-6 col-md-3">--}}
	          {{--<a href="features.htm">--}}
	            {{--<img src="{{ asset('img/features/feature-2.png' ) }}" alt="Feature 2" class="img-responsive" />--}}
	          {{--</a>--}}
	          {{--<h3 class="title">--}}
	            {{--<a href="features.htm">24/7 <span class="de-em">Support</span></a>--}}
	          {{--</h3>--}}
	          {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
	        {{--</div>--}}
	        {{--<div class="feature col-sm-6 col-md-3">--}}
	          {{--<a href="features.htm">--}}
	            {{--<img src="{{ asset('img/features/feature-3.png' ) }}" alt="Feature 3" class="img-responsive" />--}}
	          {{--</a>--}}
	          {{--<h3 class="title">--}}
	            {{--<a href="features.htm">Free Upgrade <span class="de-em">Assistance</span></a>--}}
	          {{--</h3>--}}
	          {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
	        {{--</div>--}}
	        {{--<div class="feature col-sm-6 col-md-3">--}}
	          {{--<a href="features.htm">--}}
	            {{--<img src="{{ asset('img/features/feature-4.png' ) }}" alt="Feature 4" class="img-responsive" />--}}
	          {{--</a>--}}
	          {{--<h3 class="title">--}}
	            {{--<a href="features.htm">99.9% <span class="de-em">Uptime</span></a>--}}
	          {{--</h3>--}}
	          {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
	        {{--</div>--}}
	      {{--</div>--}}
	    {{--</div>--}}
	    {{--<!--Pricing Table-->--}}
	    {{--<div class="block">--}}
	      {{--<h2 class="title-divider">--}}
	        {{--<span>Pricing <span class="de-em">Plans</span></span>--}}
	        {{--<small>Competitive pricing plans to suit your needs</small>--}}
	      {{--</h2>--}}
	      {{--<div class="row pricing-stack">--}}
	        {{--<div class="col-md-3">--}}
	          {{--<div class="well">--}}
	            {{--<h3 class="title">--}}
	              {{--Starter--}}
	            {{--</h3>--}}
	            {{--<p class="price"><span class="fancy">Free!</span></p>--}}
	            {{--<ul class="unstyled points">--}}
	              {{--<li>3 User Accounts</li>--}}
	              {{--<li>3 Private Projects</li>--}}
	              {{--<li>Umlimited Public Projects</li>--}}
	              {{--<li>5GB of space</li>--}}
	            {{--</ul>--}}
	            {{--<a class="btn btn-primary">Sign Up</a>--}}
	          {{--</div>--}}
	        {{--</div>--}}
	        {{--<div class="col-md-3">--}}
	          {{--<div class="well active">--}}
	            {{--<h3 class="title">--}}
	              {{--<span class="em">Pro</span> <span class="fancy">Plus</span>--}}
	            {{--</h3>--}}
	            {{--<p class="price">--}}
	              {{--<span class="currency">$</span>--}}
	              {{--<span class="digits">49<span>.95</span></span>--}}
	              {{--<span class="term">/MO</span>--}}
	            {{--</p>--}}
	            {{--<ul class="unstyled points">--}}
	              {{--<li>50 User Accounts</li>--}}
	              {{--<li>50 Private Projects</li>--}}
	              {{--<li>Umlimited Public Projects</li>--}}
	              {{--<li>Unlimited space</li>--}}
	            {{--</ul>--}}
	            {{--<a class="btn btn-primary">Sign Up</a>--}}
	          {{--</div>--}}
	        {{--</div>--}}
	        {{--<div class="col-md-3">--}}
	          {{--<div class="well active">--}}
	            {{--<h3 class="title">--}}
	              {{--<span class="em">Biz</span> <span class="fancy">Plus</span>--}}
	            {{--</h3>--}}
	            {{--<p class="price">--}}
	              {{--<span class="currency">$</span>--}}
	              {{--<span class="digits">199<span>.95</span></span>--}}
	              {{--<span class="term">/MO</span>--}}
	            {{--</p>--}}
	            {{--<ul class="unstyled points">--}}
	              {{--<li>Umlimited User Accounts</li>--}}
	              {{--<li>Umlimited Private Projects</li>--}}
	              {{--<li>Umlimited Public Projects</li>--}}
	              {{--<li>Unlimited space</li>--}}
	            {{--</ul>--}}
	            {{--<a class="btn btn-primary">Sign Up</a>--}}
	          {{--</div>--}}
	        {{--</div>--}}
	        {{--<div class="col-md-3">--}}
	          {{--<div class="well">--}}
	            {{--<h3 class="title">--}}
	              {{--Starter <span class="fancy">Plus</span>--}}
	            {{--</h3>--}}
	            {{--<p class="price">--}}
	              {{--<span class="currency">$</span>--}}
	              {{--<span class="digits">19<span>.95</span></span>--}}
	              {{--<span class="term">/MO</span>--}}
	            {{--</p>--}}
	            {{--<ul class="unstyled points">--}}
	              {{--<li>10 User Accounts</li>--}}
	              {{--<li>10 Private Projects</li>--}}
	              {{--<li>Umlimited Public Projects</li>--}}
	              {{--<li>15GB of space</li>--}}
	            {{--</ul>--}}
	            {{--<a class="btn btn-primary">Sign Up</a>--}}
	          {{--</div>--}}
	        {{--</div>--}}
	      {{--</div>--}}
	      {{--<div class="row">--}}
	        {{--<!-- Plan features -->--}}
	        {{--<div class="well well-sm text-center">--}}
	          {{--<h4 class="inline-el pad-right">--}}
	            {{--<span>All Plans <span class="de-em">Include</span>:</span>--}}
	          {{--</h4>--}}
	          {{--<p class="inline-el pad-left muted">90 day money back guarantee <span class="spacer">//</span> 24/7 telephone support <span class="spacer">//</span> FREE Setup <span class="spacer">//</span> Migration Help <span class="spacer">//</span> Developer API</p>--}}
	        {{--</div>--}}
	      {{--</div>--}}
	    {{--</div>--}}
	    {{--<!--Customer testimonial-->--}}
	    {{--<div class="block testimonials margin-top-large">--}}
	      {{--<h2 class="title-divider">--}}
	        {{--<span>Highly <span class="de-em">Recommended</span></span>--}}
	        {{--<small>99% of our customers recommend us!</small>--}}
	      {{--</h2>--}}
	      {{--<div class="row">--}}
	        {{--<div class="col-md-4">--}}
	          {{--<blockquote>--}}
	            {{--<p>"It's totally awesome, we're could imagine life without it!"</p>--}}
	            {{--<small>--}}
	              {{--<img src="{{ asset('img/team/jimi.jpg' ) }}" alt="Jimi Bloggs" class="img-circle" />--}}
	              {{--Jimi Bloggs <span class="spacer">/</span> <a href="#">@mrjimi</a>--}}
	            {{--</small>--}}
	          {{--</blockquote>--}}
	        {{--</div>--}}
	        {{--<div class="col-md-4">--}}
	          {{--<blockquote>--}}
	            {{--<p>"10 out of 10, highly recommended!"</p>--}}
	            {{--<small>--}}
	              {{--<img src="{{ asset('img/team/steve.jpg' ) }}" alt="Jimi Bloggs" class="img-circle" />--}}
	              {{--Steve Bloggs <span class="spacer">/</span> <a href="#">Founder of Apple</a>--}}
	            {{--</small>--}}
	          {{--</blockquote>--}}
	        {{--</div>--}}
	        {{--<div class="col-md-4">--}}
	          {{--<blockquote>--}}
	            {{--<p>"Our productivity & sales are up! Couldn't be happier with this product!"</p>--}}
	            {{--<small>--}}
	              {{--<img src="{{ asset('img/team/adele.jpg' ) }}" alt="Adele Bloggs" class="img-circle" />--}}
	              {{--Adele Bloggs <span class="spacer">/</span> <a href="#">@iamadele</a>--}}
	            {{--</small>--}}
	          {{--</blockquote>--}}
	        {{--</div>--}}
	      {{--</div>--}}
	    {{--</div>--}}

	</div>
@stop