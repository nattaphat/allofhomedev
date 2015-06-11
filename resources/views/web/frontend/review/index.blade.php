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
        .divTable {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 250px;;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .divTableCell {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .titleTableCell {
            font-size: 18px;

        }
    </style>
@stop

@section('jsbody')
    <!-- Starrr -->
    <script type="text/javascript" src={{ asset('js/lib/bootstrap-star-rating/js/star-rating.min.js') }}></script>
@stop

@section('content')

    <div class="container">
        <div class="row">
            {{--Left Menu--}}
            <div class="row">
                @include('layouts._partials.articleSlide')
            </div>

            <div class="row" style="margin-top: 30px;">
                {{--Content--}}
                <div class="col-md-12">
                    {{--Search--}}
                    <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                        <div class="col-md-6">
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


                            @foreach($catReview as $item)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="blog-media" style="padding-top:60px;">
                                            <a href="{{ URL::route('review_view', ['id' => $item->id]) }}">
                                                <?php
                                                $pic = $item->picture()->get();
                                                if($pic != null && count($pic) > 0)
                                                {
                                                    echo '
                                                    <img src="'.$pic[0]->file_path.'"
                                                 alt="'.$pic[0]->file_name.'" class="img-responsive" />';
                                                }
                                                ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h4>
                                            <a href="{{ URL::route('review_view', ['id' => $item->id]) }}">เรื่อง {{$item->title}}</a>
                                        </h4>
                                        <ul class="list-inline">
                                            <li>
                                                <i class="fa fa-user"></i> {{ App\User::getFullName($item->user_id) }}
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar"></i> {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}
                                            </li>
                                            <li>
                                                <input value="{{ $item->project_rating_avg }}" type="number" class="rating"
                                                       min=0 max=5 step=0.01 data-size="xs" data-stars="5"
                                                       data-show-clear="false" data-show-caption="false" readonly=true>
                                            </li>
                                            <li>
                                                <span class="label label-success inline-block">{{ $item->project_rating_avg }} คะแนน</span>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p style="text-indent: 20px;"> {{ $item->subtitle }}</p>
                                                <ul class="list-inline links" style="text-align: right">
                                                    <li>
                                                        <a href="{{ URL::route('review_view', ['id' => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><hr>
                            @endforeach
                            @if(($catReview == null || count($catReview) == 0))
                                <div class="well">
                                    <div class="divTable">
                                        <div class="divTableCell">
                                            <div class="titleTableCell">ไม่มีข้อมูล</div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {!! str_replace('/?', '?', $catReview->render()) !!}



                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop