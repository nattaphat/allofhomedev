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
            width: 682px;
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
    <script type="text/javascript">
        $(function() {
            $('div.raty').raty({
                starHalf     : 'images/star-half.png',
                starOff      : 'images/star-off.png',
                starOn       : 'images/star-on.png',
                half         : true,
                starType     : 'img',
                readOnly     : true,
                space        : false,
                score: function() {
                    return $(this).attr('data-score');
                }
            });

        });
    </script>
@stop

@section('content')

    <div class="boxMap">
        <h2>พิกัดที่ตั้งร้านค้า :</h2>
        <div class="map-google">
            {!! $map['html'] !!}
        </div>
    </div>

    <div class="boxreview">
        <h2>ผู้รับเหมาก่อสร้าง</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">ข้อมูลบริษัทผู้รับเหมาก่อสร้างชั้นนำ</span>

        @include('layouts._partials.shopListIndex')

    </div>

@stop