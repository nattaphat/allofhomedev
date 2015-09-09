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
            width: 624px;
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

            //hides the default paginator
            $('ul.pagination:visible:first').hide();

            //init jscroll and tell it a few key configuration details
            //nextSelector - this will look for the automatically created {{$cat->render()}}
            //contentSelector - this is the element wrapper which is cloned and appended with new paginated data
            $('div.list-review').jscroll({
                debug: true,
                autoTrigger: true,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.list-review',
                callback: function() {

                    //again hide the paginator from view
                    $('ul.pagination:visible:first').hide();

                }
            });

        });
    </script>
@stop

@section('content')

    <div class="boxreview">
        <h2>แสดงรายการตามร้านค้า</h2>
        <h2 class="lineColor"></h2>
        <div class="clear"></div>
        <span class="lineDescription">{{ $brand_name }}</span>

        @include('layouts._partials.shopListIndex')

    </div>

@stop