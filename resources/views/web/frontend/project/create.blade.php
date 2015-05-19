@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    {!! $map['js'] !!}
@stop

@section('jsbody')
    <script type="text/javascript">
        $(document).ready(function(){
            Dropzone.autoDiscover = false;
            $("#dZUpload").dropzone({
                url: "{{ URL::route('post_upload') }}",
                method: "POST",
                addRemoveLinks: true,
                success: function (file, response) {
                    var imgName = response;
                    file.previewElement.classList.add("dz-success");
                    console.log("Successfully uploaded :" + imgName);
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                    console.log("File response :", response);
                }
            });
        });
    </script>
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
                                    <span style="color: #55a79a;">เพิ่มโครงการใหม่</span>
                                </h2>
                            </div>
                            <div class="row">
                                {{--{!! Form::open(array('url' => 'home/create','class' => 'form-horizontal', 'files' => true,--}}
                                    {{--'enctype'=> 'multipart/form-data')) !!}﻿--}}

                                <form action="" class="form-horizontal">
                                    <div class="bs-callout bs-callout-success">
                                        ข้อมูลทั่วไป
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ชื่อโครงการ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">บริษัทเจ้าของโครงการ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Latitude</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Longitude</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ถนน</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ตำบล</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">อำเภอ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">จังหวัด</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ทำเล/ย่าน หลัก</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ทำเล/ย่าน ย่อย</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        {!! $map['html'] !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ลิงค์แผนที่</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ลิงค์โครงการ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success">
                                        สิ่งอำนวยความสะดวก
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">สิ่งอำนวยความสะดวก</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success">
                                        สถานที่ใกล้เคียง
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">BTS</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">MRT</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Airport Rail Link</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 20px 0px 20px 0;">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                            <button type="button" class="btn btn-default">ยกเลิก</button>
                                        </div>
                                    </div>

                                </form>

                                {{--{!! Form::close() !!}--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop