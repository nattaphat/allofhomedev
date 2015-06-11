@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
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

                <div class="row">
                    <div class="row col-md-12">
                        {{--Search--}}
                        <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                            <div class="col-md-6">
                            </div>
                            <div class="input-group col-md-6">
                                <input type="text" class="form-control"
                                       placeholder="ค้นหาไอเดีย DIY">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">ค้นหา</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pricing-stack">
                            <div class="block features well">
                                <div class="title-divider">
                                    <h2>
                                        <span style="color: #55a79a;">&nbsp;&nbsp;&nbsp;
                                            ไอเดียทั้งหมด</span>
                                        <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            ไอเดียตกแต่งบ้าน DIY</small>
                                    </h2>
                                </div>

                                @for($i=0; $i<10; $i++)
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="blog-media" style="padding-top:60px;">
                                                <a href="{{ URL::route('home_view', ['id' => 1]) }}">
                                                    <img src="http://www.home.co.th//images/img_v/BuyHome/57/2012_12_26_11_27_59.jpg"
                                                         alt="Picture of frog by Ben Fredericson" class="img-responsive" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <h4>
                                                <a href="#">เรื่อง หัวข้อ ไอเดีย</a>
                                            </h4>
                                            <ul class="list-inline">
                                                <li>
                                                    <i class="fa fa-calendar"></i> {{ \App\Models\AllFunction::getDateTimeThai('2558-02-03 00:00:00') }}
                                                </li>
                                            </ul>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p style="text-indent: 20px;">Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                                    <ul class="list-inline links" style="text-align: right">
                                                        <li>
                                                            <a href="#" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop