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
                                <div class="col-md-10">
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
                                <div class="col-md-10">
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
                                <div class="col-md-6">
                                    <input
                                            type="text"
                                            id="pictures"
                                            name="pictures"
                                            class="form-control"
                                            placeholder="รูปภาพ"
                                            value="{{Input::old('pictures')}}">
                                    <p class="help-block">
                                        {{ $errors->first('pictures') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group @if ($errors->has('video_url')) {{ "has-error" }} @endif">
                                <label class="col-md-2 control-label text-right">ลิงค์วิดีโอ Youtube</label>
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <input
                                            type="text"
                                            id="tags"
                                            name="tags"
                                            class="form-control"
                                            placeholder="Tags"
                                            value="{{Input::old('tags')}}">
                                    <p class="help-block">
                                        {{ $errors->first('tags') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    {!! Form::submit('บันทึก', ['class'=>'btn btn-primary']) !!}
                                    {!! link_to(URL::route('condo_index'), 'ยกเลิก', ['class' => 'btn btn-default']) !!}
                                </div>
                            </div>
                        </div>


                        {{--{!! Form::close() !!}--}}
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop