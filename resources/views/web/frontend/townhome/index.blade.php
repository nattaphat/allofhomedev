@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    {!! $map['js'] !!}
@stop

@section('jsbody')
    <style>
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

@section('content')

    <div class="container-fluid" style="margin-top: 30px;">

        <div class="row">
            <div class="col-md-3">
                <div style="margin-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="margin-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="margin-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
                <div style="margin-top: 20px;">
                    <a href="#">
                        <img src="{{ asset('img/ad_300x250.png') }}"
                             alt="Banner 2" class="img-responsive img-center" style="height: 208px; width: 250px;" />
                    </a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row panel panel-default">
                    <div class="col-md-12 panel-body">
                        <div class="block features">
                            <h2 class="title-divider" >
                                <span style="color: #55a79a;">แสดงโครงการตามแบรนด์</span>
                            </h2>
                        </div>
                        <ul class="row list-unstyled block customers">
                            @foreach($brand as $item)
                                <li class="customer" style="
                                width: 130px;
                                height: 100px;
                            ">
                                    <a href="#">
                              <span class="inner-wrapper" style="
                                    padding-top: 0px;
                                    padding-bottom: 0px;
                                    padding-right: 0px;
                                    padding-left: 0px;
                                    width: 102px;
                                    border: none;
                                    background-image: none;
                                ">
                                  <?php
                                  $ch = \App\Models\CatHome::where('project_owner','=',$item->project_owner)->take(1)->get();
                                  $path = "";
                                  foreach($ch as $c)
                                  {
                                      $am = \App\Models\Attachment::find($c->project_owner_logo);
                                      $path = $am->path;
                                  }
                                  ?>
                                  <span class="img-wrapper" style="height: 50px;">
                                  <img src="{{ $path }}" alt="Customer 1" class="img-responsive"
                                       style="max-height: 45px" />
                                </span>
                                <span class="title text-center" style="font-size: 12px; word-wrap: break-word;">
                                    {{ $item->project_owner }}
                                </span>
                              </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="row panel panel-default">
                    {{--####Google Map--}}
                    <div class="col-md-12 panel-body">
                        {!! $map['html'] !!}
                    </div>
                </div>


                <div class="row" style="margin-bottom: 30px;">
                    {{--####ค้นหาโครงการ--}}
                    <div class="col-md-12">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                       placeholder="ค้นหาประกาศหมวดหมู่บ้านใหม่">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">ค้นหา</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach($catHomeVip as $item)
                    <div class="pricing-stack">
                        <div class="well active">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="blog-media" style="padding-top: 30px;">
                                        <a href="{{ URL::route("home_view", ["id" => $item->id]) }}">
                                            <?php
                                            $pic = $item->picture()->get();
                                            if($pic != null && count($pic) > 0)
                                            {
                                                echo '
                                                    <img src="'.$pic[0]->file_path.'"
                                                 alt="'.$pic[0]->file_name.'" class="img-responsive img-center" />';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="block block-callout post-block" style="margin-top: 0px;">
                                            <div clas="row" style="padding: 0px 10px 0px 10px;">
                                                <div class="post-author">
                                                    <h4>
                                                        <a href="{{ URL::route("home_view", ["id" => $item->id]) }}">เรื่อง : {{ $item->title }}</a>
                                                    </h4>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-calendar"></i> &nbsp; {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-comments"></i> &nbsp; {{ $item->num_comment }} Comments
                                                        </li>
                                                        @if($item->num_comment = 0)
                                                            <li>
                                                                <i class="fa fa-star"></i> No rating
                                                            </li>
                                                        @endif
                                                    </ul>
                                                    @if($item->num_comment > 0)
                                                        <ul class="list-inline">
                                                            <li>
                                                                <span class="label label-default">Rating</span>
                                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                            </li>
                                                            <li>
                                                                <span class="label label-default">Score</span>
                                                                {{ $item->avg_rating }} / 5
                                                            </li>
                                                            <li>
                                                                <span class="label label-default">Rating by</span>
                                                                {{ $item->num_rating }} users
                                                            </li>
                                                        </ul>
                                                    @endif
                                                    <div class="row">
                                                        <p style="text-indent: 30px; word-break: break-all;">{{ $item->subtitle }}</p>
                                                        <ul class="list-inline links" style="text-align: right">
                                                            <li>
                                                                <a href="{{ URL::route("home_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                                            </li>
                                                            {{--<li>--}}
                                                            {{--<a href="{{ URL::route("home_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-comments"></i> 76 Comments</a>--}}
                                                            {{--</li>--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well active">
                                        <h3 class="title">
                                            <span class="em">ราคา</span> เริ่มต้น
                                        </h3>
                                        <p class="price">
                                            <span class="digits">{{ $item->sell_price }}</span>
                                            <span class="term"> บาท</span>
                                        </p>
                                        <div style="text-align: center; font-size: 12px;">
                                            <address>
                                                <strong>ติดต่อ:</strong> &nbsp; <span style="word-break: break-all;">{{ $item->project_owner }}</span><br>
                                                <strong>เบอร์โทรศัพท์:</strong> &nbsp; <span style="word-break: break-all;">{{ $item->telephone }}</span>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach

                @foreach($catHome as $item)
                    <div class="pricing-stack">
                        <div class="well">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="blog-media" style="padding-top: 30px;">
                                        <a href="{{ URL::route("home_view", ["id" => $item->id]) }}">
                                            <?php
                                            $pic = $item->picture()->get();
                                            if($pic != null && count($pic) > 0)
                                            {
                                                echo '
                                                    <img src="'.$pic[0]->file_path.'"
                                                 alt="'.$pic[0]->file_name.'" class="img-responsive img-center" />';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="block block-callout post-block" style="margin-top: 0px;">
                                            <div clas="row" style="padding: 0px 10px 0px 10px;">
                                                <div class="post-author">
                                                    <h4>
                                                        <a href="{{ URL::route("home_view", ["id" => $item->id]) }}">เรื่อง : {{ $item->title }}</a>
                                                    </h4>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-calendar"></i> &nbsp; {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-comments"></i> &nbsp; {{ $item->num_comment }} Comments
                                                        </li>
                                                        @if($item->num_comment = 0)
                                                            <li>
                                                                <i class="fa fa-star"></i> No rating
                                                            </li>
                                                        @endif
                                                    </ul>
                                                    @if($item->num_comment > 0)
                                                        <ul class="list-inline">
                                                            <li>
                                                                <span class="label label-default">Rating</span>
                                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                            </li>
                                                            <li>
                                                                <span class="label label-default">Score</span>
                                                                {{ $item->avg_rating }} / 5
                                                            </li>
                                                            <li>
                                                                <span class="label label-default">Rating by</span>
                                                                {{ $item->num_rating }} users
                                                            </li>
                                                        </ul>
                                                    @endif
                                                    <div class="row">
                                                        <p style="text-indent: 30px; word-break: break-all;">{{ $item->subtitle }}</p>
                                                        <ul class="list-inline links" style="text-align: right">
                                                            <li>
                                                                <a href="{{ URL::route("home_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                                            </li>
                                                            {{--<li>--}}
                                                            {{--<a href="{{ URL::route("home_view", ["id" => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-comments"></i> 76 Comments</a>--}}
                                                            {{--</li>--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="well">
                                        <h3 class="title">
                                            <span class="em">ราคา</span> เริ่มต้น
                                        </h3>
                                        <p class="price">
                                            <span class="digits">{{ $item->sell_price }}</span>
                                            <span class="term"> บาท</span>
                                        </p>
                                        <div style="text-align: center; font-size: 12px;">
                                            <address>
                                                <strong>ติดต่อ:</strong> &nbsp; <span style="word-break: break-all;">{{ $item->project_owner }}</span><br>
                                                <strong>เบอร์โทรศัพท์:</strong> &nbsp; <span style="word-break: break-all;">{{ $item->telephone }}</span>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach

                @if(($catHomeVip == null || count($catHomeVip) == 0) &&
                    ($catHome == null || count($catHome) == 0))
                    <div class="row">
                        <div class="col-md-12" style="
                            padding-left: 0px;
                            padding-right: 0px;
                        ">
                            <div class="pricing-stack">
                                <div class="well">
                                    <div class="well">
                                        <div class="divTable">
                                            <div class="divTableCell">
                                                <div class="titleTableCell">ไม่มีข้อมูล</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {!! str_replace('/?', '?', $catHome->render()) !!}

            </div>
        </div>
    </div>

@stop