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
            color: #5cc5c1;
            display: block;
            padding-right: 20px;
            float: left;
            margin-top: 0px;
        }
        .boxreview h2.lineColor {
            display: inline;
            width: 621px;
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

@stop

@section('content')

    @include('layouts._partials.picture_preview')

    @include('layouts._partials.shop_view')

@stop