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
                <div class="row" style="padding: 20px 0px 20px 20px;">
                    <div class="panel panel-success">
                        <div class="panel-body" style="margin: 0px 5px 15px 15px;">

                            <div class="block features">
                                <h2 class="title-divider" >
                                    <span style="color: #55a79a;">เพิ่มไอเดีย</span>
                                </h2>
                            </div>

                            <div class="row">
                                {{--{!! Form::open(['url' => 'backend/user_editSave']) !!}--}}

                                <div class="row">
                                    <div class="form-group @if ($errors->has('title')) {{ "has-error" }} @endif">
                                        <label class="col-md-2 control-label text-right">หัวข้อโพส</label>
                                        <div class="col-md-6">
                                            <input
                                                    type="text"
                                                    id="title"
                                                    name="title"
                                                    class="form-control"
                                                    placeholder="หัวข้อโพส"
                                                    value="{{Input::old('title')}}">
                                            <p class="help-block">
                                                {{ $errors->first('title') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group @if ($errors->has('subtitle')) {{ "has-error" }} @endif">
                                        <label class="col-md-2 control-label text-right">เนื้อหาย่อ</label>
                                        <div class="col-md-8">
                                    <textarea
                                            id="subtitle"
                                            name="subtitle"
                                            class="form-control"
                                            placeholder="เนื้อหาย่อ"
                                            value="{{Input::old('subtitle')}}"
                                            rows="3"></textarea>
                                            <p class="help-block">
                                                {{ $errors->first('subtitle') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group @if ($errors->has('other_detail')) {{ "has-error" }} @endif">
                                        <label class="col-md-2 control-label text-right">รายละเอียด</label>
                                        <div class="col-md-8">
                                    <textarea
                                            id="other_detail"
                                            name="other_detail"
                                            class="form-control"
                                            placeholder="รายละเอียด"
                                            value="{{Input::old('other_detail')}}"
                                            rows="6"></textarea>
                                            <p class="help-block">
                                                {{ $errors->first('other_detail') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group @if ($errors->has('pictures')) {{ "has-error" }} @endif">
                                        <label class="col-md-2 control-label text-right">รูปภาพ</label>
                                        <div class="col-md-8">
                                            {!! Form::open(array('url' => 'post/upload', 'method' => 'POST',
                                            'files' => 'true', 'data-ajax' => 'true', 'class' => 'dropzone')) !!}﻿
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 10px;">
                                    <div class="form-group @if ($errors->has('video_url')) {{ "has-error" }} @endif">
                                        <label class="col-md-2 control-label text-right">ลิงค์วิดีโอ Youtube</label>
                                        <div class="col-md-8">
                                            <input
                                                    type="text"
                                                    id="video_url"
                                                    name="video_url"
                                                    class="form-control"
                                                    placeholder="ลิงค์วิดีโอ Youtube"
                                                    value="{{Input::old('title')}}">
                                            <p class="help-block">
                                                {{ $errors->first('video_url') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group @if ($errors->has('tags')) {{ "has-error" }} @endif">
                                        <label class="col-md-2 control-label text-right">Tags</label>
                                        <div class="col-md-8">
                                            <div class="form-group input-group">
                                                <input type="text" placeholder="Tags"
                                                       class="form-control">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i> เพิ่ม
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="tag-cloud post-tag-cloud" style="margin-top: 0px; padding-bottom: 10px;">
                                                <a href="#" class="tag">พฤกษา</a>
                                                <a href="#" class="tag">โครงการบ้านใหม่</a>
                                                <a href="#" class="tag">รามอินทรา</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label  class="col-md-2 control-label text-right">แสดงผลหน้าเว็บไซต์</label>
                                        <div class="col-md-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1"
                                                       value="option1" checked> แสดงผล
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2"
                                                       value="option2"> ไม่แสดงผล
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="padding: 20px 0px 20px 0;">
                                    <div class="form-group">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10">
                                            {{--{!! Form::submit('บันทึก', ['class'=>'btn btn-primary']) !!}--}}
                                            {{--{!! link_to(URL::route('condo_index'), 'ยกเลิก', ['class' => 'btn btn-default']) !!}--}}
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                            <button type="button" class="btn btn-default">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>


                                {{--{!! Form::close() !!}--}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop