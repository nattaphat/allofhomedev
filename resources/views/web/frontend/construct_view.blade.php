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
    </style>
@stop

@section('jsbody')

    <script type="text/javascript">
        function fb_share() {
            // facebook share dialog
            {{--FB.ui( {--}}
                {{--method: 'feed',--}}
                {{--name: "Your Page Title",--}}
                {{--link: "{{ Request::fullUrl() }}",--}}
                {{--picture: "https://stackexchange.com/users/flair/557969.png",--}}
                {{--caption: "Some description here"--}}
            {{--}, function( response ) {--}}
                {{--// do nothing--}}
            {{--} );--}}


            FB.ui({
                method: 'feed',
                link: '{{ Request::fullUrl() }}',
                caption: 'An example caption'
            }, function(response){

            });

        }

        // add click event to link using jQuery
        $(document).ready(function(){
            $('.share-fb-btn').on( 'click', fb_share );
        });
    </script>


@stop

@section('content')

    @include('layouts._partials.picture_preview')

    @include('layouts._partials.shop_view')

@stop