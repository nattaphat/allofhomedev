@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')
    <div class="container">

        @include('layouts._partials.articleSlide')

        <div class="panel panel-default">
            <div class="panel-heading">
                เพิ่มประกาศหมวดหมู่โครงการบ้านใหม่
            </div>
            <div class="panel-body">
                {!! Form::open() !!}



                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop