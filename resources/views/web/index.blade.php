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

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
            </div>
            <div class="col-md-9">

                <div class="block features">
                    <h2 class="title-divider" >
                        <span style="color: #55a79a;">รีวิว โครงการ บ้าน/ทาวน์โฮม/คอนโด</span>
                        <small>ความคิดเห็นเกี่ยวกับ ร้านค้า/โครงการ โดยสมาชิก</small>
                    </h2>
                </div>

                <div class="row">
                    @for($i=0; $i<6; $i++)
                        <div class="col-md-4">
                            <div class="block block-callout post-block" style="margin-top:0px;">
                                <div class="post-author">
                                    <div class="feature">
                                        <a href="{{ URL::to('review/view') }}">
                                            <img src="data:image/jpeg;base64,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"
                                                 alt="Feature 3" class="img-responsive" />
                                        </a>
                                        <h3 class="title" style="padding-top:10px;">
                                            <a href="{{ URL::to('review/view') }}">รีวิวโครงการของพฤกษา</a>
                                        </h3>
                                        <p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                Read More
                <ul class="list-inline links" style="text-align: right; padding-top:10px;">
                    <li>
                        <a href="{{ URL::to('review/index') }}" class="btn btn-default btn-xs">
                            <i class="fa fa-arrow-circle-right"></i> Read more</a>
                    </li>
                </ul>
            </div>
        </div>

        {{--<div class="row" style="margin-top: 30px;">--}}

            {{--<div class="row" >--}}
                {{--อ่านรีวิวทั้งหมด--}}
                {{--<div class="panel panel-success">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="row">--}}
                            {{--Banner--}}
                            {{--<div class="col-md-3">--}}
                                {{--<div style="padding-top: 90px">--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                             {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--List Blog Detail Review--}}
                            {{--<div class="col-md-9">--}}
                                {{--<div class="block features">--}}
                                    {{--<h2 class="title-divider" >--}}
                                        {{--<span style="color: #55a79a;">รีวิว โครงการ บ้าน/ทาวน์โฮม/คอนโด</span>--}}
                                        {{--<small>ความคิดเห็นเกี่ยวกับ ร้านค้า/โครงการ โดยสมาชิก</small>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--@for($i=0; $i<6; $i++)--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<div class="block block-callout post-block" style="margin-top:0px;">--}}
                                                {{--<div class="post-author">--}}
                                                    {{--<div class="feature">--}}
                                                        {{--<a href="{{ URL::to('review/view') }}">--}}
                                                            {{--<img src="data:image/jpeg;base64,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"--}}
                                                                 {{--alt="Feature 3" class="img-responsive" />--}}
                                                        {{--</a>--}}
                                                        {{--<h3 class="title" style="padding-top:10px;">--}}
                                                            {{--<a href="{{ URL::to('review/view') }}">รีวิวโครงการของพฤกษา</a>--}}
                                                        {{--</h3>--}}
                                                        {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endfor--}}
                                {{--</div>--}}
                                {{--Read More--}}
                                {{--<ul class="list-inline links" style="text-align: right; padding-top:10px;">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ URL::to('review/index') }}" class="btn btn-default btn-xs">--}}
                                            {{--<i class="fa fa-arrow-circle-right"></i> Read more</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--###End List Blog Detail Review--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--อ่านไอเดียทั้งหมด--}}
                {{--<div class="panel panel-success" >--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="row">--}}

                            {{--Banner--}}
                            {{--<div class="col-md-3">--}}
                                {{--<div style="padding-top: 90px">--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                             {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--Idea Detail--}}
                            {{--<div class="col-md-9" >--}}

                                {{--<div class="block features">--}}
                                    {{--<h2 class="title-divider" >--}}
                                        {{--<span style="color: #55a79a;">ไอเดีย</span>--}}
                                        {{--<small>ไอเดียตกแต่งบ้าน DIY ด้วยตัวคุณเอง</small>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}

                                {{--<div class="row">--}}
                                    {{--@for($i=0; $i<6; $i++)--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<div class="block block-callout post-block" style="margin-top:0px;">--}}
                                                {{--<div class="post-author">--}}
                                                    {{--<div class="feature">--}}
                                                        {{--<a href="{{ URL::to('idea/view') }}">--}}
                                                            {{--<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQdKdTuG9i4OtllL-Z5tq2Z9j5EDsdzyVWpEycE2x9O3r8w_sOB"--}}
                                                                 {{--alt="Feature 3" class="img-responsive" />--}}
                                                        {{--</a>--}}
                                                        {{--<h3 class="title" style="padding-top:10px;">--}}
                                                            {{--<a href="idea/view">รีวิวโครงการของพฤกษา</a>--}}
                                                        {{--</h3>--}}
                                                        {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endfor--}}
                                {{--</div>--}}
                                {{--Read More--}}
                                {{--<ul class="list-inline links" style="text-align: right; padding-top:10px;">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ URL::to('idea/index') }}" class="btn btn-default btn-xs">--}}
                                            {{--<i class="fa fa-arrow-circle-right"></i> Read more</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--อ่านกระทู้ทั้งหมด--}}
                {{--<div class="panel panel-success" >--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="row">--}}

                            {{--Banner--}}
                            {{--<div class="col-md-3">--}}
                                {{--<div class="row" style="padding-top: 90px; padding-left:10px; padding-right:10px;">--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                             {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="row" style="padding-top: 20px;  padding-left:10px; padding-right:10px;">--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                             {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--Post Detail--}}
                            {{--<div class="col-md-9" >--}}
                                {{--<div class="block features">--}}
                                    {{--<h2 class="title-divider" >--}}
                                        {{--<span style="color: #55a79a;">ประกาศซื้อ ขาย เช่า ให้เช่า</span>--}}
                                        {{--<small>ต้องการซื้อ ขาย เช่า ให้เช่า บ้าน คอนโด อพาร์ทเม้น ฯลฯ</small>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}

                                {{--<div class="row">--}}
                                    {{--@for($i=0; $i<6; $i++)--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<div class="block block-callout post-block" style="margin-top:0px;">--}}
                                                {{--<div class="post-author">--}}
                                                    {{--<div class="feature">--}}
                                                        {{--<a href="#">--}}
                                                            {{--<img src="http://www.thaihometown.com/exclusive/40442/home_40442_6t4bq2_1.jpg"--}}
                                                                 {{--alt="Feature 3" class="img-responsive" />--}}
                                                        {{--</a>--}}
                                                        {{--<h3 class="title" style="padding-top:10px;">--}}
                                                            {{--<a href="#">ประกาศขายบ้านมือสอง</a>--}}
                                                        {{--</h3>--}}
                                                        {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endfor--}}
                                {{--</div>--}}
                                {{--Read More--}}
                                {{--<ul class="list-inline links" style="text-align: right; padding-top:10px;">--}}
                                    {{--<li>--}}
                                        {{--<a href="#" class="btn btn-default btn-xs">--}}
                                            {{--<i class="fa fa-arrow-circle-right"></i> Read more</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--Banner--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-3">--}}
                        {{--<a href="#">--}}
                            {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                 {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<a href="#">--}}
                            {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                 {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<a href="#">--}}
                            {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                 {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<a href="#">--}}
                            {{--<img src="{{ asset('img/ad_300x250.png') }}"--}}
                                 {{--alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<br><br>--}}

                {{--สมัครงานกับบริษัทชั้นนำต่างๆ--}}
                {{--<div class="panel panel-success" >--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-3"></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<div class="block features">--}}
                                    {{--<h2 class="title-divider" >--}}
                                        {{--<span style="color: #55a79a;">สมัครงานกับบริษัทชั้นนำต่างๆ</span>--}}
                                        {{--<small></small>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--@for($i=0; $i<10; $i++)--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-3">--}}
                                    {{--<a href="#">--}}
                                        {{--<img src="http://www.home.co.th//images/img_v/BuyHome/title-05042558-751-P4220106.JPG"--}}
                                             {{--alt="Feature 1" class="img-responsive" />--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-9">--}}
                                    {{--<div class="block block-callout post-block" style="margin-top: 0px;">--}}
                                        {{--<div class="post-author">--}}
                                            {{--<h4>--}}
                                                {{--<a href="#">ข้อความประกาศรับสมัครงาน</a>--}}
                                            {{--</h4>--}}
                                            {{--<div>--}}
                                                {{--<p>Rhoncus adipiscing, magna integer cursus augue eros lacus porttitor magna. Dictumst, odio! Elementum tortor sociis in eu dis dictumst pulvinar lorem nec aliquam a nascetur.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div><hr>--}}
                        {{--@endfor--}}
                        {{--Read More--}}
                        {{--<ul class="list-inline links" style="text-align: right">--}}
                            {{--<li>--}}
                                {{--<a href="#" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}


    </div>
@stop