@extends('layouts.main_v2')

@section('jshome')

    <style type="text/css">
        .boxreview h2{
            background:none;
            height:46px;
            text-indent:0;
            margin-bottom:0px;
            color: #5cc5c1;
            display: block;
            padding-right: 20px;
            float: left;
        }
        .boxreview h2.lineColor {
            display: inline;
            width: 612px;
            padding-right: 0px;
            margin-top: 40px;
            background-color: #5cc5c1;
            height: 6px;
        }
        .lineDescription
        {
            position: relative;
            top: -15px;
        }
    </style>
@stop

@section('jsbody')

@stop

@section('content')

    <?php $urlTo =  url("home/view/")."/"; ?>

    <div class="boxreview">
        <h2>แสดงโครงการตามแบรนด์</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">{{ $brand_name }}</span>

        <div class="list-review">
            <ul>
                @if($cat != null)
                    @foreach($cat as $item)
                        <li>
                            <div class="left">
                                <div class="showpic">
                                    <?php
                                    $pics = \App\Models\Picture::where('pictureable_id', '=', $item->id)
                                            ->where('pictureable_type', '=', 'App\\Models\\CatHome')
                                            ->get();
                                    ?>
                                    @if(isset($pics) && count($pics) > 0)
                                        @if(count($pics) >= 5)
                                            <p class="pic-hilight">
                                                <a href="{{ $urlTo.$item->id }}">
                                                    <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                         style="width: 256px; height: 156px;" />
                                                </a>
                                            </p>
                                            <div class="other">
                                                <img src="{{ $pics[1]->file_path }}" alt="{{ $pics[1]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img src="{{ $pics[2]->file_path }}" alt="{{ $pics[2]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img src="{{ $pics[3]->file_path }}" alt="{{ $pics[3]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                                <img src="{{ $pics[4]->file_path }}" alt="{{ $pics[4]->file_name }}"
                                                     style="width: 80px; height: 70px;" />
                                            </div>
                                        @else
                                            <p class="pic-hilight">
                                                <a href="{{ $urlTo.$item->id }}">
                                                    <img src="{{ $pics[0]->file_path }}" alt="{{ $pics[0]->file_name }}"
                                                         style="width: 256px; height: 156px;" />
                                                </a>
                                            <div class="other">
                                                <?php $count = count($pics); ?>
                                                @for($i=1; $i<$count; $i++)
                                                    <img src="{{ $pics[$i]->file_path }}" alt="{{ $pics[$i]->file_name }}"
                                                         style="width: 80px; height: 70px;" />
                                                @endfor
                                            </div>
                                            </p>
                                        @endif
                                    @endif
                                    <div class="clear"></div>
                                </div>
                                <a href="{{ $urlTo.$item->id }}"><h3>{{ $item->title }}</h3></a>
                                <p class="update">วันที่ลงประกาศ  {{ \App\Models\AllFunction::getDateTimeThai($item->created_at) }}</p>
                                <p class="p-subtitle">{{ $item->subtitle }}</p>
                            </div>
                            <div class="right">
                                <p class="text-price">ราคาเริ่มต้น</p>
                                @if($item->sell_price == null || $item->sell_price == "")
                                    <p class="price" style="padding-top: 22px;
                                    padding-left: 0;
                                    font-size: 28px;
                                    text-align: center;
                                    ">
                                        &nbsp;&nbsp;ไม่ระบุราคา</p>
                                @else
                                    <p class="price">&nbsp;&nbsp;{{ $item->sell_price }}<span style="font-size: 28px;"> บาท</span></p>
                                @endif

                                <div class="rating">
                                    @if(isset($item->avg_rating) && $item->avg_rating != null && $item->avg_rating != 0)
                                        &nbsp;&nbsp;<span class="label-success"> {{ $item->avg_rating }} คะแนน</span>
                                        <!--<img src="images/test/rating.jpg" alt="" />-->
                                    @else
                                        &nbsp;&nbsp;<span class="label-success">ยังไม่มีการให้คะแนน</span>
                                    @endif
                                </div>
                                <div class="call" style="margin: 20px 0 0;">
                                    <?php $brand = \App\Models\Brand::find($item->brand_id) ?>
                                    <p style="
                                line-height: 23px;
                                height: 46px;
                                overflow: hidden;
                                color: #646464;
                            ">ติดต่อ : {{ $brand->brand_name }}</p>
                                    <p class="number">{{ $brand->telephone }}</p>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
            </ul>
            {!! str_replace('/?', '?', $cat->render()) !!}
        </div>

    </div>

@stop