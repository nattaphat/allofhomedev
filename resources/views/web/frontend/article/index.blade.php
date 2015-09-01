@extends('layouts.main')

@section('jshome')

@stop

@section('jsbody')

@stop

@section('content')

    <div class="container-fluid">

        <div class="row" style="margin-top: 30px;">
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

            <div class="col-md-9" style="padding-left: 0px; padding-right: 0px;">

                <div class="col-md-12" style="padding-left: 0px;">
                    <div class="block features">
                        <h2 class="title-divider" >
                            <span style="color: #55a79a;">บทความและข่าวสารทั้งหมด</span>
                        </h2>
                    </div>
                </div>

                <div class="col-md-12"style="padding-left: 0px;">
                    <div class="input-group col-md-6 pull-right">
                        <input type="text" class="form-control"
                               placeholder="ค้นหาบทความและข่าวสาร">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">ค้นหา</button>
                        </span>
                    </div>
                </div>

                <div class="col-md-12" style="padding-left: 0px; margin-top: 30px;">
                    <div class="pricing-stack">
                        @foreach($cat as $item)
                            <div class="col-md-12 well @if($item->suggest) active @endif">
                                <div class="col-md-3">
                                    <div class="blog-media" style="padding-top:20px;">
                                        <a href="{{ URL::route('article_view', ['id' => $item->id]) }}" class="thumbnail">
                                            <?php
                                            $pic = $item->picture()->orderBy('id','asc')->get();
                                            if($pic != null && count($pic) > 0)
                                            {
                                                echo '
                                    <img src="'.$pic[0]->file_path.'"
                                        alt="'.$pic[0]->file_name.'" class="img-responsive"
                                        style="display: block; margin-left: auto; margin-right: auto;" />';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h4>
                                        <a href="{{ URL::route('article_view', ['id' => $item->id]) }}">เรื่อง {{$item->title}}</a>
                                    </h4>
                                    <ul class="list-inline">
                                        <li>
                                            {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}
                                        </li>
                                        <li>
                                            &nbsp; <i class="fa fa-heart"></i> {{ $item->num_shared }} &nbsp; Likes
                                        </li>
                                        <li>
                                            &nbsp; <i class="fa fa-comments"></i> {{ $item->num_comment }} &nbsp; Comments
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p style="text-indent: 20px; word-wrap: break-word;"> {{ $item->subtitle }}</p>
                                            <ul class="list-inline links" style="text-align: right">
                                                <li>
                                                    <a href="{{ URL::route('article_view', ['id' => $item->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-arrow-circle-right"></i> Read more</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {!! str_replace('/?', '?', $cat->render()) !!}

            </div>

        </div>
    </div>
@stop