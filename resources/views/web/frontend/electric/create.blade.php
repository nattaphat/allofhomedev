@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')

    @include('layouts._partials.articleSlide')

    <div class="container">

        <div class="row pricing-stack">
            <div class="well" style="text-align: center;
            padding-top:100px; padding-bottom: 100px;">
                <h3>งวดถัดไป</h3>
            </div>
        </div>

    </div>
@stop