@extends('layouts.main_v2')

@section('jshome')
    {!! $map['js'] !!}

    <style type="text/css">

        .boxMap
        {
            padding-top: 0;
        }

        .boxMap h2{
            margin: 0 0 10px 0;
        }

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
            width: 733px;
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

    <div class="boxMap">
        <h2>พิกัดที่ตั้งร้านค้า :</h2>
        <div class="map-google">
            {!! $map['html'] !!}
        </div>
        <a href="#" class="btn-searchggm">ค้าหาเส้นทางจาก Google Map</a>
    </div>

    <div class="boxreview">
        <h2>รับสร้างบ้าน</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">รับสร้างบ้านโดยบริษัทชั้นนำมืออาชีพ</span>

        <div class="list-review">
            <ul>
                @if($catVip != null)
                    @foreach($catVip as $item)
                        <li>
                            <p class="tag-vip"><img src="{{ asset('images/blulet/vip.png') }}" alt="" /></p>
                            <div class="left">
                                <a href="{{ url("construct/")."/".$item->id }}"><h3>{{ $item->title }}</h3></a>
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
                                <div class="call">
                                    <?php $brand = \App\Models\Brand::find($item->brand_id) ?>
                                    <p>ติดต่อ : {{ $brand->brand_name }}</p>
                                    <p class="number">{{ $brand->telephone }}</p>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif

                @if($cat != null)
                    @foreach($cat as $item)
                        <li>
                            <p class="tag-vip"><img src="{{ asset('images/blulet/vip.png') }}" alt="" /></p>
                            <div class="left">
                                <a href="{{ url("construct/")."/".$item->id }}"><h3>{{ $item->title }}</h3></a>
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
                                <div class="call">
                                    <?php $brand = \App\Models\Brand::find($item->brand_id) ?>
                                    <p>ติดต่อ : {{ $brand->brand_name }}</p>
                                    <p class="number">{{ $brand->telephone }}</p>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </li>
                    @endforeach
                @endif
            </ul>

        </div>
    </div>

@stop