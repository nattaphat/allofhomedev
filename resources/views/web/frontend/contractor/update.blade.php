@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading">
                ประกาศหมวดหมู่ XXXXXX
            </div>
            <div class="panel-body">

                <div class="col-md-1"></div>
                <div class="col-md-11">
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
                        {!! link_to(URL::route('contractor_index'), 'ยกเลิก', ['class' => 'btn btn-default']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@stop