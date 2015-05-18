@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts._partials.left_menu')
            </div>
            <div class="col-md-9">
                <div class="block features">
                    <h2 class="title-divider" >
                        <span style="color: #55a79a;">เพิ่มไอเดีย</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>


@stop