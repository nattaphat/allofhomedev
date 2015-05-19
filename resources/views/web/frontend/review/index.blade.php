@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')

    <div class="container">
        <div class="row">
            {{--Left Menu--}}
            <div class="col-md-3">
                @include('layouts._partials.left_menu')
            </div>
            {{--Content--}}
            <div class="col-md-6">
                {{--Search--}}
                <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-6">
                        <a href="{{ URL::to("review/create") }}"><i class="fa fa-plus-square"></i>
                            เพิ่มรีวิว</a>
                    </div>
                    <div class="input-group col-md-6">
                        <input type="text" class="form-control"
                               placeholder="ค้นหารีวิวโครงการ บ้าน คอนโด ทาวน์โฮม">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">ค้นหา</button>
                        </span>
                    </div>
                </div>
                {{-- Content Items --}}
                <div class="pricing-stack">
                    <div class="block features well">
                        <div class="title-divider">
                            <h2>
                        <span style="color: #55a79a;">&nbsp;&nbsp;&nbsp;
                            รีวิว โครงการ บ้าน/ทาวน์โฮม/คอนโด</span>
                                <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    ความคิดเห็นเกี่ยวกับ ร้านค้า/โครงการ โดยสมาชิก</small>
                            </h2>
                        </div>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        {{--รายการโพส--}}
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
                                    <a href="{{ URL::route('review_view', ['id' => 1]) }}">เรื่อง <span class="fancy">หัวข้อประกาศ</span></a>
                                </h4>
                                <ul class="list-inline">
                                    <li>
                                        <i class="fa fa-user"></i> Thitima Admin
                                    </li>
                                    <li>
                                        <i class="fa fa-calendar"></i> 02/08/2558
                                    </li>
                                    <li>
                                        &nbsp;&nbsp;คะแนนรีวิว&nbsp;
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Commodo consequat feugiat lenis nunc tum verto. Abico cogo enim erat incassum pertineo sudo utrum vulputate. Et ideo luptatum nobis persto si sit suscipere. Dolus obruo persto. Aliquip antehabeo euismod nisl oppeto uxor vel verto.</p>
                                        <ul class="list-inline links" style="text-align: right">
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                            </li>
                                            <li>
                                                <a href="{{ URL::route('review_view', ['id' => 1]) }}" class="btn btn-default btn-xs"><i class="fa fa-comment"></i> 76 Comments</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                    </div>
                </div>
            </div>
            {{--Banner--}}
            <div class="col-md-3" style="padding-top:20px;">
                <div>
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 1" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
                <div style="padding-top: 20px;">
                    <a href="#">
                        <img src="http://www.itgadgeteer.com/wp-content/uploads/2014/06/ad_300x250.png"
                             alt="Banner 2" class="img-responsive" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop