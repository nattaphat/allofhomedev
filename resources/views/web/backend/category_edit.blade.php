@extends('layouts.main_backend')

@section('jsbody')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CategoryRequest', '#my-form'); !!}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">ประกาศหมวดหมู่</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    แก้ไขประกาศหมวดหมู่
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_category_update'],
                            'id'=> 'my-form', 'data-ajax' => 'true',
                            'class' => 'form-horizontal']) !!}

                        {!! Form::hidden('id', $cat->id) !!}

                        <div class="form-group">
                            {!! Form::label('category_name', 'ชื่อหมวดหมู่', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('category_name', $cat->category_name,[
                                    'class' => 'form-control'
                                    ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('visible', 'แสดงผลหน้าเว็บไซต์', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <label class="radio-inline">
                                    <input type="radio" name="visible[]" value="true" @if($cat->visible) checked @endif> แสดง
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="visible[]" value="false" @if(!$cat->visible) checked @endif> ซ่อน
                                </label>
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