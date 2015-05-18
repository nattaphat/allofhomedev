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
                        <span style="color: #55a79a;">เพิ่มประกาศหมวดหมู่ทาวน์โฮมใหม่</span>
                    </h2>

                    <div class="row" style="padding-left: 50px;">
                        {!! Form::open() !!}

                        <div class="form-group">
                            {!! Form::label('attribute', 'attribute:') !!}
                            {!! Form::text('attribute', null,['class' => 'form-control short']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('attribute', 'attribute:') !!}
                            {!! Form::text('attribute', null,['class' => 'form-control short']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('attribute', 'attribute:') !!}
                            {!! Form::textarea('attribute', null,['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']) !!}
                            {!! link_to(URL::route('condo_index'), 'ยกเลิก', ['class' => 'btn btn-default']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop