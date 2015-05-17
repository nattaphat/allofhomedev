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

    @include('layouts._partials.articleSlide')

    <div class="container">

        {{--อ่านรีวิวทั้งหมด--}}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    {{--Banner--}}
                    <div class="col-md-3">
                        <div style="padding-top: 90px">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                    </div>

                    {{--List Blog Detail Review--}}
                    <div class="col-md-9">
                        <div class="block features">
                            <h2 class="title-divider" >
                                <span style="color: #55a79a;">รีวิว โครงการ บ้าน/ทาวน์โฮม/คอนโด</span>
                                <small>ความคิดเห็นเกี่ยวกับ ร้านค้า/โครงการ โดยสมาชิก</small>
                            </h2>

                            <div class="row">
                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="data:image/jpeg;base64,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"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">รีวิวโครงการของพฤกษา</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQOmVoEo9kK_pSqFL_gMzeHhvCEVmQjnL663SoOWNbl92aR0Uggxw"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">รีวิวโครงการของพฤกษา</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDW1ybqsuQA2aQ4GAeS5nz9PO6_AESyq2RD4sYaFVwHGxpJkKIJw"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">รีวิวโครงการของพฤกษา</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="data:image/jpeg;base64,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"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">รีวิวโครงการของพฤกษา</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQOmVoEo9kK_pSqFL_gMzeHhvCEVmQjnL663SoOWNbl92aR0Uggxw"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">รีวิวโครงการของพฤกษา</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDW1ybqsuQA2aQ4GAeS5nz9PO6_AESyq2RD4sYaFVwHGxpJkKIJw"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">รีวิวโครงการของพฤกษา</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            {{--Read More--}}
                            <ul class="list-inline links" style="text-align: right">
                                <li>
                                    <a href="{{ URL::to('review/index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    {{--###End List Blog Detail Review--}}

                </div>
            </div>
        </div>

        {{--อ่านไอเดียทั้งหมด--}}
        <div class="panel panel-default" >
            <div class="panel-body">
                <div class="row">

                    {{--Banner--}}
                    <div class="col-md-3">
                        <div style="padding-top: 90px">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                    </div>

                    {{--Idea Detail--}}
                    <div class="col-md-9" >
                        <div class="block features">
                            <h2 class="title-divider" >
                                <span style="color: #55a79a;">ไอเดียตกแต่งบ้าน DIY</span>
                                <small>ไอเดียตกแต่งบ้าน DIY เก๋ๆ</small>
                            </h2>

                            <div class="row">
                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="data:image/jpeg;base64,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"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ตกแต่งบ้านง่ายๆ ด้วยตัวคุณ</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQdKdTuG9i4OtllL-Z5tq2Z9j5EDsdzyVWpEycE2x9O3r8w_sOB"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ตกแต่งบ้านง่ายๆ ด้วยตัวคุณ</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS9gYHJOuwzRnDHwmsFyeJx8EwukuMBLuw-lt3xEPPjwuBNqRLM"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ตกแต่งบ้านง่ายๆ ด้วยตัวคุณ</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="data:image/jpeg;base64,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"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ตกแต่งบ้านง่ายๆ ด้วยตัวคุณ</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQdKdTuG9i4OtllL-Z5tq2Z9j5EDsdzyVWpEycE2x9O3r8w_sOB"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ตกแต่งบ้านง่ายๆ ด้วยตัวคุณ</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS9gYHJOuwzRnDHwmsFyeJx8EwukuMBLuw-lt3xEPPjwuBNqRLM"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ตกแต่งบ้านง่ายๆ ด้วยตัวคุณ</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    {{--Read More--}}
                    <ul class="list-inline links" style="text-align: right">
                        <li>
                            <a href="{{ URL::to('idea/index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        {{--อ่านกระทู้ทั้งหมด--}}
        <div class="panel panel-default" >
            <div class="panel-body">
                <div class="row">

                    {{--Banner--}}
                    <div class="col-md-3">
                        <div class="row" style="padding-top: 90px; padding-left:10px; padding-right:10px;">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                        <div class="row" style="padding-top: 20px;  padding-left:10px; padding-right:10px;">
                            <a href="#">
                                <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                    </div>

                    {{--Post Detail--}}
                    <div class="col-md-9" >
                        <div class="block features">
                            <h2 class="title-divider" >
                                <span style="color: #55a79a;">ประกาศซื้อ ขาย เช่า ให้เช่า</span>
                                <small>ต้องการซื้อ ขาย เช่า ให้เช่า บ้าน คอนโด อพาร์ทเม้น ฯลฯ</small>
                            </h2>
                            <div class="row">

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="http://www.thaihometown.com/exclusive/40442/home_40442_6t4bq2_1.jpg"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ประกาศขายบ้านมือสอง</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="http://bookup.asia/cache/images/shop/4723/main-250x150.jpg"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ประกาศขายบ้านมือสอง</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="http://www.hydefly.com/images/school/profile/sprachcaffe--geos-london-471.jpg"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ประกาศขายบ้านมือสอง</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="http://www.thaihometown.com/exclusive/40442/home_40442_6t4bq2_1.jpg"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ประกาศขายบ้านมือสอง</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="http://bookup.asia/cache/images/shop/4723/main-250x150.jpg"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ประกาศขายบ้านมือสอง</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 block features">
                                    <div class="row" style="padding-left: 10px; padding-right: 10px;">
                                        <div class="feature">
                                            <a href="#">
                                                <img src="http://www.hydefly.com/images/school/profile/sprachcaffe--geos-london-471.jpg"
                                                     alt="Feature 3" class="img-responsive" />
                                            </a>
                                            <h3 class="title">
                                                <a href="#">ประกาศขายบ้านมือสอง</a>
                                            </h3>
                                            <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                        </div>
                    </div>

                    {{--Read More--}}
                    <ul class="list-inline links" style="text-align: right">
                        <li>
                            <a href="{{ URL::to('2hand/index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

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
            <div class="panel panel-default" >
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div class="block features">
                                <h2 class="title-divider" >
                                    <span style="color: #55a79a;">สมัครงานกับบริษัทชั้นนำต่างๆ</span>
                                    <small></small>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="feature col-md-3">
                            <a href="#">
                                <img src="http://www.home.co.th//images/img_v/BuyHome/title-05042558-751-P4220106.JPG"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                        <div class="feature col-md-9">
                            <h3 class="title">
                                <a href="#">ข้อความประกาศรับสมัครงาน</a>
                            </h3>
                            <p>
                                Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="feature col-md-3">
                            <a href="#">
                                <img src="http://www.home.co.th//images/img_v/BuyHome/title-05042558-751-P4220106.JPG"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                        <div class="feature col-md-9">
                            <h3 class="title">
                                <a href="#">ข้อความประกาศรับสมัครงาน</a>
                            </h3>
                            <p>
                                Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="feature col-md-3">
                            <a href="#">
                                <img src="http://www.home.co.th//images/img_v/BuyHome/title-05042558-751-P4220106.JPG"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                        <div class="feature col-md-9">
                            <h3 class="title">
                                <a href="#">ข้อความประกาศรับสมัครงาน</a>
                            </h3>
                            <p>
                                Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="feature col-md-3">
                            <a href="#">
                                <img src="http://www.home.co.th//images/img_v/BuyHome/title-05042558-751-P4220106.JPG"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                        <div class="feature col-md-9">
                            <h3 class="title">
                                <a href="#">ข้อความประกาศรับสมัครงาน</a>
                            </h3>
                            <p>
                                Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="feature col-md-3">
                            <a href="#">
                                <img src="http://www.home.co.th//images/img_v/BuyHome/title-05042558-751-P4220106.JPG"
                                     alt="Feature 1" class="img-responsive" />
                            </a>
                        </div>
                        <div class="feature col-md-9">
                            <h3 class="title">
                                <a href="#">ข้อความประกาศรับสมัครงาน</a>
                            </h3>
                            <p>
                                Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.
                            </p>
                        </div>
                    </div>
                    <hr>

                    {{--Read More--}}
                    <ul class="list-inline links" style="text-align: right">
                        <li>
                            <a href="{{ URL::to('job/index') }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>


@stop