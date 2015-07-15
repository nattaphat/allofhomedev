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

    </style>
@stop

@section('jsbody')

@stop

@section('content')

    @include('layouts._partials.picture_preview')

    @include('layouts._partials.home_townhome_condo_view')

@stop