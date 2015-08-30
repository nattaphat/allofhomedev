@extends('layouts.main_view')

@section('jshome')
    {!! $map['js'] !!}

    <style type="text/css">
        #share-buttons img {
            width: 35px;
            padding: 5px;
            border: 0;
            box-shadow: 0;
            display: inline;
        }

        .boxreview h2{
            background:none;
            height:46px;
            text-indent:0;
            margin-bottom:0px;
            margin-top: 0px;
            color: #5cc5c1;
            display: block;
            padding-right: 20px;
            float: left;
        }
        .boxreview h2.lineColor {
            display: inline;
            width: 733px;
            padding-right: 0px;
            margin-top: 20px;
            background-color: #5cc5c1;
            height: 6px;
        }
        .lineDescription
        {
            position: relative;
            top: -15px;
        }

        div.right p.text a
        {
            color: #5cc5c1;
        }

        div.right p.text a:hover
        {
            color: #ffa864;
        }


        #modal2 {
            width:400px;
            background: #FFF;
            box-shadow: 1px 1px 3px rgba(0,0,0,0.5);
            height: 180px;
        }

        #modal2 .header {
            background: #DDD;
            border-bottom: 1px solid #CCCCCC;
            padding: 18px 18px 14px;
        }

        #modal2 .header h3 {
            margin: 0;
            padding: 0;
            text-shadow: 0 1px 0 rgba(255,255,255,0.5);
        }

        #modal2 form {
            padding: 10px 0;
        }

        #modal2 .txt {
            padding: 10px 20px;
        }

        #modal2 .txt input {
            width: 220px;
            height: 16px;
            padding: 5px;
            border: 1px solid #CCC;
        }

        #modal2 .txt label {
            float: left;
            width: 120px;
            font-size: 20px;
        }

        #modal2 .btn {
            padding: 10px 20px 10px 140px;
        }

        #modal2 .btn a {
            float: left;
            padding: 0 20px;
            line-height: 28px;
            background: #049CDB;
            text-align: center;
            font-family: sans-serif;
            font-size: 14px;
            text-shadow: 0 1px 0 rgba(0,0,0,0.25);
            color: #FFF;
            margin: 0 10px 0 0;
            border: none;
        }

        #modal2 .btn a.cancel {
            background: #DDDDDD;
            box-shadow: none;
            color: #333;
            text-shadow: 0 1px 0 rgba(255,255,255,0.25);
        }

    </style>
@stop

@section('jsbody')

    <script type="text/javascript">
        $( document ).ready(function() {

            var rate_score = 0;

            $('div#starRating').raty({
                starHalf     : '../images/star-half.png',
                starOff      : '../images/star-off.png',
                starOn       : '../images/star-on.png',
                half         : true,
                starType     : 'img',
                readOnly     : true,
                score        : {{ $catConstruct->avg_rating }},
                hints        : ['เฉลี่ย {{ $catConstruct->avg_rating }} / 5.00 คะแนน',
                                'เฉลี่ย {{ $catConstruct->avg_rating }} / 5.00 คะแนน',
                                'เฉลี่ย {{ $catConstruct->avg_rating }} / 5.00 คะแนน',
                                'เฉลี่ย {{ $catConstruct->avg_rating }} / 5.00 คะแนน',
                                'เฉลี่ย {{ $catConstruct->avg_rating }} / 5.00 คะแนน'],
                noRatedMsg   : 'ยังไม่มีผู้ให้คะแนน'
            });

            $('#modal2').easyModal({
                overlay : 0.4,
                overlayClose: false
            });

            $('#button_rating').click(function(e){
                $('#modal2').trigger('openModal');
                e.preventDefault();
            });

            $('.starrr').on('starrr:change', function(e, value){
                if(value == undefined)
                    rate_score = 0;
                else
                    rate_score = value;
            });

            $('#btn_ok_assign_rate').click(function(e)
            {
                e.preventDefault();

                $.post(
                    "{{ url('cat_construct_rating') }}",
                    { _token: "{{ csrf_token() }}", id: "{{ $catConstruct->id }}", score: rate_score},
                    function(data)
                    {
                        $('div#starRating').raty({
                            starHalf     : '../images/star-half.png',
                            starOff      : '../images/star-off.png',
                            starOn       : '../images/star-on.png',
                            half         : true,
                            starType     : 'img',
                            readOnly     : true,
                            score        : data,
                            hints        : ['เฉลี่ย ' + data + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data + ' / 5.00 คะแนน'],
                            noRatedMsg   : 'ยังไม่มีผู้ให้คะแนน'
                        });
                    }
                )
                .done(function() {
//                    $("#button_rating").attr("style", "display:none;");
                    alert( "สำเร็จ" );
                })
                .fail(function(error) {
                    alert( "ล้มเหลว" );
                });

            });
        });

    </script>

@stop

@section('content')

    @include('layouts._partials.picture_preview')

    @include('layouts._partials.shop_view')

@stop