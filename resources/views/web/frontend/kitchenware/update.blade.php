@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')
    <div class="container">

        @include('layouts._partials.articleSlide')

    </div>
@stop