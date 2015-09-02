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


        #modal3 {
            width:400px;
            background: #FFF;
            box-shadow: 1px 1px 3px rgba(0,0,0,0.5);
            height: 180px;
        }

        #modal3 .header {
            background: #DDD;
            border-bottom: 1px solid #CCCCCC;
            padding: 18px 18px 14px;
        }

        #modal3 .header h3 {
            margin: 0;
            padding: 0;
            text-shadow: 0 1px 0 rgba(255,255,255,0.5);
        }

        #modal3 form {
            padding: 10px 0;
        }

        #modal3 .txt {
            padding: 10px 20px;
        }

        #modal3 .txt input {
            width: 220px;
            height: 16px;
            padding: 5px;
            border: 1px solid #CCC;
        }

        #modal3 .txt label {
            float: left;
            width: 120px;
            font-size: 20px;
        }

        #modal3 .btn {
            padding: 10px 20px 10px 140px;
        }

        #modal3 .btn a {
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

        #modal3 .btn a.cancel {
            background: #DDDDDD;
            box-shadow: none;
            color: #333;
            text-shadow: 0 1px 0 rgba(255,255,255,0.25);
        }


        .notification-text
        {
            font-size: 20px;
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

            $('#modal3').easyModal({
                overlay : 0.4,
                overlayClose: false
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

                if(rate_score == 0)
                {
                    alert('กรุณาให้คะแนนร้านค้า');
                    return;
                }

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
                            score        : data['avg_score'],
                            hints        : ['เฉลี่ย ' + data['avg_score'] + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data['avg_score'] + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data['avg_score'] + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data['avg_score'] + ' / 5.00 คะแนน',
                                'เฉลี่ย ' + data['avg_score'] + ' / 5.00 คะแนน'],
                            noRatedMsg   : 'ยังไม่มีผู้ให้คะแนน'
                        });

                        $('#num_score_5').html(data['num_score_5'] + " คน");
                        $('#num_score_4').html(data['num_score_4'] + " คน");
                        $('#num_score_3').html(data['num_score_3'] + " คน");
                        $('#num_score_2').html(data['num_score_2'] + " คน");
                        $('#num_score_1').html(data['num_score_1'] + " คน");
                    }
                )
                .done(function() {
                    $("#button_rating").attr("style", "display:none;");

                    var message = '<p><b>สำเร็จ</b></p><p>ให้คะแนนร้านค้าสำเร็จ</p>';
                    var seconds = 3;
                    var icon = 'check';

                    Notify(message,icon, seconds);
                })
                .fail(function(error) {

                    var message = '<p><b>ล้มเหลว</b></p><p>ให้คะแนนร้านค้าล้มเหลว</p>';
                    var seconds = 3;
                    var icon = 'exclamation';

                    Notify(message,icon, seconds);

                });

            });

            $('#btn_send').click(function(e)
            {
                debugger;

                @if( strlen("{{ $brand->brand_name }}") == 0 || strlen("{{ $brand->email }}") == 0 )
                    alert('ไม่มีข้อมูลชื่อหรืออีเมล์ผู้ติดต่อ');
                    return;
                @endif

                var txt_subject = $('#txt_subject').val();
                var txt_body = $('#txt_body').val();
                var txt_name_contact_back = $('#txt_name_contact_back').val();
                var txt_telephone_contact_back = $('#txt_telephone_contact_back').val();

                if(txt_subject.length == 0 || txt_body.length == 0 || txt_name_contact_back.length == 0 ||
                        txt_telephone_contact_back.length == 0)
                {
                    alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                    return;
                }
                else
                {
                    $('#modal3').trigger('openModal');
                }

                e.preventDefault();
            });

            $('#btn_ok_send').click(function(e)
            {
                var txt_subject = $('#txt_subject').val();
                var txt_body = $('#txt_body').val();
                var txt_name_contact_back = $('#txt_name_contact_back').val();
                var txt_telephone_contact_back = $('#txt_telephone_contact_back').val();

                $.post(
                    "{{ url('mail') }}",
                    {
                        _token: "{{ csrf_token() }}",
                        to_name: "{{ $brand->brand_name }}",
                        to_mail: "{{ $brand->email }}",
                        title: txt_subject,
                        content: txt_body,
                        from_name: txt_name_contact_back,
                        from_telephone: txt_telephone_contact_back
                    },
                    function(data)
                    {
                        if(data == -1)
                        {
                            var message = '<p><b>ล้มเหลว</b></p><p>ส่งข้อความข้อความ</p>';
                            var seconds = 3;
                            var icon = 'exclamation';

                            Notify(message,icon, seconds);
                        }
                        else
                        {
                            var message = '<p><b>สำเร็จ</b></p><p>ส่งข้อความสำเร็จ</p>';
                            var seconds = 3;
                            var icon = 'check';

                            Notify(message,icon, seconds);
                        }
                    }
                )
                .fail(function(error) {
                    var message = '<p><b>ล้มเหลว</b></p><p>ส่งข้อความข้อความ</p>';
                    var seconds = 3;
                    var icon = 'exclamation';

                    Notify(message,icon, seconds);
                });

                e.preventDefault();
            });

            $('#btn_clear').click(function(e)
            {
                $('#txt_subject').val("");
                $('#txt_body').val("");
                $('#txt_name_contact_back').val("");
                $('#txt_telephone_contact_back').val("");

                e.preventDefault();
            });

            $('#btn_get_direction').click(function(e)
            {
                if ((navigator.platform.indexOf("iPhone") !== -1) || (navigator.platform.indexOf("iPod") !== -1)) {
                    function iOSversion() {
                        if (/iP(hone|od|ad)/.test(navigator.platform)) {
                            // supports iOS 2.0 and later: <http://bit.ly/TJjs1V>
                            var v = (navigator.appVersion).match(/OS (\d+)_(\d+)_?(\d+)?/);
                            return [parseInt(v[1], 10), parseInt(v[2], 10), parseInt(v[3] || 0, 10)];
                        }
                    }
                    var ver = iOSversion() || [0];

                    if (ver[0] >= 6) {
                        protocol = 'maps://';
                    } else {
                        protocol = 'http://';

                    }
                    window.location = protocol + 'maps.apple.com/maps?daddr=' + {{ $catConstruct->latitude }} + ',' + {{ $catConstruct->longitude }} + '&amp;ll=';
                }
                else {
                    window.open('http://maps.google.com?daddr=' + {{ $catConstruct->latitude }} + ',' + {{ $catConstruct->longitude }} + '&amp;ll=');
                }
                e.preventDefault();
            });

        });

    </script>

@stop

@section('content')

    @include('layouts._partials.picture_preview')

    @include('layouts._partials.shop_view')

@stop