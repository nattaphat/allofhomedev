@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')

    <div class="row">
        <div class="col-sm-3" style="padding-left: 50px;">
            @include('layouts._partials.left_menu')
        </div>
        <div class="col-sm-9" style="padding-left: 50px;">
            <div class="container">

                <div class="block features">
                    <h2 class="title-divider" >
                        <span style="color: #55a79a;">บทความและข่าวสาร</span>
                        <small>บทความและข่าวสาร</small>
                    </h2>
                </div>

            </div>
        </div>
    </div>

@stop