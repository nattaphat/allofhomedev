@extends('layouts.main_backend')

@section('jsbody')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\BtsRequest', '#my-form'); !!}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Airport Rail Link</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    แก้ไขข้อมูล Airport Rail Link
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_airportLink_update'],
                        'id'=> 'my-form', 'data-ajax' => 'true',
                        'class' => 'form-horizontal']) !!}

                        {!! Form::hidden('id', $airportLink->id) !!}

                        <div class="form-group">
                            {!! Form::label('apl_name', 'สถานี', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('apl_name', $airportLink->apl_name,[
                                'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'สถานะ', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                            {!! Form::select('status', array(
                                'true' => 'ใช้งาน',
                                'false' => 'ยังไม่เปิดให้บริการ'
                                ),
                                $airportLink->status == true? 'true' : 'false', ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group" style="padding: 20px 0px 20px 0;">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button id="btn_save" type="submit" class="btn btn-primary">บันทึก</button>
                                <button type="button" class="btn btn-default">
                                    <a href="{{ URL::previous() }}">ยกเลิก</a></button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@stop