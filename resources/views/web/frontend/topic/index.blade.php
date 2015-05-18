@extends('layouts.main')

@section('slider')
@include('layouts._partials.topslide')
@stop

@section('content')

<div class="row">
    <p></p>
    <div class="col-xs-3">

    </div>
    <div class="col-xs-6">
        <div class="col-xs-3">
            <a href="#" class="img-thumbnail">
                Home
            </a>
        </div>
        <div class="col-xs-3">
            <a href="#" class="img-thumbnail">
                Town Home
            </a>
        </div>
        <div class="col-xs-3">
            <a href="#" class="img-thumbnail">
                Condo
            </a>
        </div>
        <div class="col-xs-3">
            <a href="#" class="img-thumbnail">
                Land
            </a>
        </div>
    </div>
</div>

@stop