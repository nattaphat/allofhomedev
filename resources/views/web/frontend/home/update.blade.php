@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('content')

    {{-- #### Left Menu--}}
    <div class="col-md-3">
        @include('layouts._partials.left_menu')
    </div>{{-- #### End Left Menu --}}

    <div class="container">

        {{-- #### Content--}}
        <div class="col-md-9">

            <div class="block features">
                <div class="title-divider">
                    <h2>
                        <span style="color: #55a79a;">
                            เพิ่มโครงการบ้านใหม่
                        </span>
                    </h2>
                </div>
            </div>

            <div class="row">
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
                        {!! link_to(URL::route('condo_index'), 'ยกเลิก', ['class' => 'btn btn-default']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>{{-- #### End Content--}}

    </div>

@stop