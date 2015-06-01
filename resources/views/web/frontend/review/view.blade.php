@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    <!-- Starrr -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('js/lib/bootstrap-star-rating/css/star-rating.min.css') }}>

    <style type="text/css">
        .rating-xs {
            font-size: 14px;
        }
    </style>
@stop

@section('jsbody')
    <!-- Starrr -->
    <script type="text/javascript" src={{ asset('js/lib/bootstrap-star-rating/js/star-rating.min.js') }}></script>
    <script type="text/javascript">

        jQuery(document).ready(function () {

            $('#project_rating1').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating1').rating('update', '{{ $catReview->project_rating1 }}');

            $('#project_rating2').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating2').rating('update', '{{ $catReview->project_rating2 }}');

            $('#project_rating3').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating3').rating('update', '{{ $catReview->project_rating3 }}');

            $('#project_rating4').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating4').rating('update', '{{ $catReview->project_rating4 }}');

            $('#project_rating5').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating5').rating('update', '{{ $catReview->project_rating5 }}');

            $('#project_rating6').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating6').rating('update', '{{ $catReview->project_rating6 }}');

            $('#project_rating7').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating7').rating('update', '{{ $catReview->project_rating7 }}');

            $('#project_rating8').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating8').rating('update', '{{ $catReview->project_rating8 }}');

            $('#project_rating9').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating9').rating('update', '{{ $catReview->project_rating9 }}');

            $('#project_rating_avg').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#project_rating_avg').rating('update', '{{ $catReview->project_rating_avg }}');

            $('#shop_rating_avg').rating({
                stars: 5,
                size: 'xs',
                showClear: false,
                showCaption: false,
                readonly: true
            });

            $('#shop_rating_avg').rating('update', '{{ $catReview->shop_rating_avg }}');
        });

    </script>
@stop

@section('content')

    <div class="container">
        <div class="row">
            @include('layouts._partials.articleSlide')
        </div>


        <div class="row">

            <div class="col-md-3">
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
            </div>

            {{--#### Content ####--}}
            <div class="col-md-9">

                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="sections"><span class="type">รีวิวทั้งหมด</span> / <a href="#" class="tag">{{ $project_name }}</a></div>
                                <h3 class="title media-heading" style="text-indent:-64px; margin-left:64px; padding-top: 10px;">
                                    เรื่อง: &nbsp; {{ $catReview->title }}
                                </h3>
                                <div class="sections">
                                    <ul class="list-inline">
                                        <li>
                                            ลงประกาศโดย:
                                        </li>
                                        <li>
                                            <i class="fa fa-user"></i> {{ App\User::getFullName($catReview->user_id) }}
                                        </li>
                                        <li>
                                            <i class="fa fa-calendar"></i> {{ App\Models\AllFunction::getDateTimeThai($catReview->created_at) }}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-12">
                                @if($catReview->video_url != null && $catReview->video_url != "")
                                    <?php
                                    $iframe = \App\Models\AllFunction::convertYoutube($catReview->video_url);
                                    ?>
                                    @if($iframe != "")
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="blog-media col-md-10" style="padding-top: 30px; text-align: center;">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    {!! $iframe !!}
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    @endif
                                @endif
                                <p style="text-indent: 30px; padding-top: 10px;">{!! str_replace("\n","<br>", $catReview->subtitle) !!}</p>
                            </div>

                            <div class="col-md-12" style="padding-top: 30px;">
                                <strong>ส่วนของคะแนนรีวิว</strong>
                                <div class="row">
                                    @if($type == "project")
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            ความพึงพอใจในเจ้าของโครงการ
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating1" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            ความพึงพอใจในรูปแบบบ้านด้านนอก
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating2" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            ความพึงพอใจในรูปแบบบ้านด้านใน
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating3" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            ความพึงพอใจในส่วนกลาง
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating4" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            ความพึงพอใจในข้อมูลเบื้องต้นโครงการ
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating5" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            สภาพแวดล้อมโครงการ
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating6" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            ความเหมาะสมของทำเลที่ตั้ง
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating7" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            ความเหมาะสมของราคา
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating8" type="number">
                                        </div>
                                        <div class="col-md-1" style="padding-top: 14px;"></div>
                                        <div class="col-md-5" style="padding-top: 14px;">
                                            เงื่อนไขการจอง
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="project_rating9" type="number">
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5 text-right" style="padding-top: 18px; font-size: 18px; font-weight: 700">
                                            คะแนนเฉลี่ย
                                        </div>
                                        <div class="col-md-6" style="padding-top: 18px; font-size: 18px; font-weight: 700">
                                            {{ $catReview->project_rating_avg }} &nbsp;&nbsp; คะแนน
                                        </div>
                                    @else
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            คะแนนความพึงพอใจ
                                        </div>
                                        <div class="col-md-6" style="padding-top: 14px;">
                                            <input id="shop_rating_avg" type="number">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12" style="padding-top: 30px;">
                                {!! str_replace('../files/','../../files/', $catReview->other_detail) !!}
                            </div>

                            <div class="col-md-12" style="padding-top: 30px;">


                            </div>

                            <div class="col-md-12">
                                <!-- Post Tags -->
                                <div class="tag-cloud post-tag-cloud">
                                    <h4>
                                        Tags
                                    </h4>
                                    @if($tag != null && count($tag) > 0)
                                        @foreach($tag as $item)
                                            <a href="#" class="tag">{{ App\Models\TagSub::getTagSubName($item->tag_sub_id) }}</a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                                <!-- #### Share Widget -->
                                <div class="col-md-3">
                                    <h4 class="text-light">
                                        Favourite:
                                    </h4>
                                    <a href="#">
                                        <button type="button" class="btn btn-success btn-sm">
                                            <i class="fa fa-heart-o fa-lg"></i> &nbsp;&nbsp;
                                            เพิ่มเป็นรายการโปรด</button>
                                    </a>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-3">
                                    <h4 class="text-light">
                                        Share it:
                                    </h4>
                                    <a href="#" class="social-link branding-twitter">
                                        <i class="fa fa-twitter-square fa-3x"></i></a>
                                    <a href="#" class="social-link branding-facebook">
                                        <i class="fa fa-facebook-square fa-3x"></i></a>
                                    <a href="#" class="social-link branding-line">
                                        <img src="../../img/icon/icon-line.jpeg" alt="Line"
                                             style="max-width: 35px;" />
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <!--Comments-->
                            <div class="comment" id="comments">
                                <h5>ความคิดเห็นทั้งหมด (10)</h5><br/>
                                <div class="row">
                                    <div class="block block-callout post-block" style="margin: 0em 10px 0em 10px;">
                                        <div class="post-author">
                                            @for($i=0; $i<10; $i++)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="http://i.ytimg.com/vi/RscymgpZEGQ/hqdefault.jpg"
                                                             alt="User" class="img-responsive" />
                                                    </div>
                                                    <div class="col-md-9">
                                                        <ul class="list-inline meta text-muted">
                                                            <li><i class="fa fa-user"></i> Thitima Admin</li>
                                                            <li><i class="fa fa-calendar"></i> 02/07/2558</li>
                                                        </ul>
                                                        <p>a nec in sed hac ultrices cursusa nec in sed hac ultrices cursusa nec in sed hac ultrices cursusa nec in sed hac ultrices cursus</p>
                                                    </div>
                                                </div>
                                                @if($i != 9)
                                                    <hr>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <form id="comment-form" class="comment-form" role="form"
                                      action="#" method="get">
                                    <h5>แสดงความคิดเห็น</h5>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-name">Name</label>
                                        <input type="text" class="form-control" id="comment-name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-name">Email</label>
                                        <input type="email" class="form-control" id="comment-email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="comment-comment">Comment</label>
                                        <textarea rows="8" class="form-control" id="comment-comment" placeholder="Comment"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop