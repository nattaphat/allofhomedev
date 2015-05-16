@extends('layouts.main')

@section('content')
    <div class="container">

        @include('layouts._partials.articleSlide')

        <div class="panel panel-default">
            <div class="panel-heading">
                เพิ่มประกาศหมวดหมู่โครงการคอนโดใหม่
            </div>
            <div class="panel-body">
                {!! Form::open() !!}



                {!! Form::close() !!}
            </div>
        </div>

    </div>
@stop