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
                                    <span style="color: #55a79a;">เพิ่มประกาศหมวดหมู่บ้านใหม่</span>
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
                                        <label for="inputEmail3" class="col-sm-2 control-label">หัวข้อประกาศ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="หัวข้อประกาศ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">เนื้อหาย่อ</label>
                                        <div class="col-sm-8">
                                            <textarea
                                                    id="subtitle"
                                                    name="subtitle"
                                                    class="form-control"
                                                    placeholder="เนื้อหาย่อ"
                                                    rows="3"
                                                    value="{{Input::old('subtitle')}}"
                                                    ></textarea>
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        ข้อมูลผู้ติดต่อ
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">เบอร์ติดต่อโครงการ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="เบอร์ติดต่อโครงการ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">อีเมล</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="อีเมล">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">เว็บไซต์บริษัท</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="เว็บไซต์บริษัท">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Line ID</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="Line ID">
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        ข้อมูลเบื้องต้นโครงการ
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">ชื่อโครงการ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="ค้นหาโครงการ">
                                        </div>
                                        <div call="col-sm-3 text-right">
                                            <a href="#">
                                                <i class="fa fa-plus-square"></i> เพิ่มโครงการใหม่</a>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 10px 0px 20px 0px;">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <div class="focus-box pull-right text-right"
                                                 style="max-height:180px; max-width: 180px;">
                                                <img src="../img/cat_home/sansiri.png" alt="company owner"
                                                     style="max-height:150px; max-width: 150px;">
                                            </div>
                                            <strong>รายละเอียดโครงการ:</strong>
                                            <ul class="list-inline">
                                                <li>ชื่อโครงการ:</li>
                                                <li>ชื่อโครงการ</li>
                                            </ul>
                                            <ul class="list-inline">
                                                <li>บริษัทเจ้าของโครงการ:</li>
                                                <li>บริษัทเจ้าของโครงการ</li>
                                            </ul>
                                            <ul class="list-inline">
                                                <li>ที่ตั้งโครงการ:</li>
                                                <li>ถนน ตำบล อำเภอ จังหวัด</li>
                                            </ul>
                                            <ul class="list-inline">
                                                <li>ทำเล/ย่าน:</li>
                                                <li>สุขุมวิท</li>
                                            </ul>
                                            <ul class="list-inline">
                                                <li>เว็บไซต์โครงการ:</li>
                                                <li>เว็บไซต์โครงการ</li>
                                            </ul>
                                            <ul class="list-inline">
                                                <li>Facebook:</li>
                                                <li>Facebook</li>
                                            </ul>
                                            <ul class="list-inline">
                                                <li>สถานที่ใกล้เคียง:</li>
                                            </ul>
                                            <div class="row" style="padding-left: 30px;">
                                                <em>สถานี BTS</em>
                                            </div>
                                            <div class="row" style="padding-left: 30px; padding-bottom: 10px;">
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ช่องนนทรีย์</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ศาลาแดง</div>
                                            </div>
                                            <div class="row" style="padding-left: 30px;">
                                                <em>สถานี MRT</em>
                                            </div>
                                            <div class="row" style="padding-left: 30px; padding-bottom: 10px;">
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; สามย่าน</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; สีลม</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ลุมพินี</div>
                                            </div>
                                            <div class="row" style="padding-left: 30px;">
                                                <em>Airport Rail Link</em>
                                            </div>
                                            <div class="row" style="padding-left: 30px; padding-bottom: 10px;">
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; มักกะสัน</div>
                                            </div>
                                            <ul class="list-inline">
                                                <li>สิ่งอำนวยความสะดวก:</li>
                                            </ul>
                                            <div class="row" style="padding-left: 30px;  padding-bottom: 10px;">
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ลิฟท์โดยสาร</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ลิฟท์ขนส่ง</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ที่จอดรถ</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ทางเข้าไม้กระดก</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; คีย์การ์ด</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; กล้องวงจรปิด</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; รปภ.</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; สระว่ายน้ำ</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; สวนสาธารณะ</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; สนามเด็กเล่น</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ฟิตเนส</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; สตรีม</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ซาวน่า</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; สปอร์ตคลับ</div>
                                                <div class="col-md-4"><i class="fa fa-caret-right"></i> &nbsp;&nbsp; ร้านสะดวกซื้อ</div>
                                            </div>
                                            <ul class="list-inline">
                                                <li>Latitude:</li>
                                                <li>13.02</li>
                                                <li>Longitude:</li>
                                                <li>100.29</li>
                                            </ul>
                                            <ul class="list-inline">
                                                <li>ลิงค์แผนที่:</li>
                                                <li>http://map.google.com?lat=13.02&long=100.29&z=3</li>
                                            </ul>
                                            <div class="row" style="padding-right:50px;">
                                                {!! $map['html'] !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">รูปแบบบ้าน</label>
                                        <div class="col-sm-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox">บ้านเดี่ยว
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">บ้านแฝด
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">ทาวน์โฮม
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">คอนโด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">พื้นที่โครงการ (ไร่)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="พื้นที่โครงการ (ไร่)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">จำนวนยูนิต</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="จำนวนยูนิต">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">รูปแบบบ้าน : ที่ดินเริ่มต้น</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="เช่น ทาวน์โฮม : 18 ตร.ว." rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">พื้นที่บ้านเริ่มต้น</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="เช่น ทาวน์โฮม 130 ตร.ม." rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">การก่อสร้างตัวบ้าน</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="เช่น อิฐแดง อิฐมวลเบา ระบบ tunel" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">สไตล์การออกแบบ</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="เช่น Modern, Art Deco" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">แผนผังโครงการ</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="แผนผังโครงการ" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">สภาพแวดล้อมโครงการ</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="สภาพแวดล้อมโครงการ" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">บรรยากาศบ้านตกแต่ง</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="บรรยากาศบ้านตกแต่ง" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">บรรยากาศบ้านจริงเมื่อรับมอบ</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="บรรยากาศบ้านจริงเมื่อรับมอบ" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">โครงการผ่าน EIA</label>
                                        <div class="col-sm-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline"
                                                       id="optionsRadiosInline1" value="option1" checked> ผ่าน
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline"
                                                       id="optionsRadiosInline2" value="option2"> ไม่ผ่าน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">ราคาขายเปิดโครงการ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="ราคาขายเปิดโครงการ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">เริ่มก่อสร้าง</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="เริ่มก่อสร้าง">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">คาดว่าแล้วเสร็จ</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="คาดว่าแล้วเสร็จ">
                                        </div>
                                    </div>
                                    <!-- รายละเอียดส่วนกลาง -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        รายละเอียดส่วนกลาง
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">กองทุนสำรอง (บ/ตร.ว.)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="กองทุนสำรอง (บ/ตร.ว.)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">ค่าส่วนกลาง (บ/ตร.ว.)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword3" placeholder="ค่าส่วนกลาง (บ/ตร.ว.)">
                                        </div>
                                    </div>
                                    <!-- การคำนวณเงินกู้ -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        การคำนวณเงินกู้
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">การคำนวณเงินกู้</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="การคำนวณเงินกู้" rows="15"></textarea>
                                        </div>
                                    </div>
                                    <!-- ส่วนลดโปรโมชั่น -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        ส่วนลดโปรโมชั่น
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">ส่วนลดโปรโมชั่น</label>
                                        <div class="col-sm-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">ส่วนลดเงินสด
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">แถมเฟอร์นิเจอร์
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">ฟรีค่าใช้จ่ายวันโอน
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">ฟรีแอร์ทั้งหลัง
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">ฟรีค่าส่วนกลาง
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">ดอกเบี้ยถูกกว่าปกติ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">อื่นๆ โปรดระบุ</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="อื่นๆ โปรดระบุ" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!-- รายละเอียดอื่นๆ -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        รายละเอียดอื่นๆ
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">รายละเอียดอื่นๆ</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="inputPassword3"
                                                      placeholder="รายละเอียดอื่นๆ" rows="15"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label text-right">รูปภาพ</label>
                                        <div class="col-sm-8">
                                            <div id="dZUpload" class="dropzone">
                                                {{--<div class="dz-default dz-message"></div>--}}
                                                {{--<div class="dz-preview dz-file-preview"></div>--}}

                                                {{--<div class="dz-default dz-preview">--}}
                                                    {{--<div class="dz-details">--}}
                                                        {{--<div class="dz-filename"><span data-dz-name></span></div>--}}
                                                        {{--<div class="dz-size" data-dz-size></div>--}}
                                                        {{--<img data-dz-thumbnail />--}}
                                                    {{--</div>--}}
                                                    {{--<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>--}}
                                                    {{--<div class="dz-success-mark"><span>✔</span></div>--}}
                                                    {{--<div class="dz-error-mark"><span>✘</span></div>--}}
                                                    {{--<div class="dz-error-message"><span data-dz-errormessage></span></div>--}}
                                                {{--</div>--}}

                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label text-right">Tags</label>
                                            <div class="col-sm-8">
                                                <div class="form-group input-group" style="padding: 6px 25px 6px 25px;">
                                                    <input type="text" placeholder="Tags"
                                                           class="form-control">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button"><i class="fa fa-plus"></i> เพิ่ม
                                                        </button>
                                                    </span>
                                                </div>
                                                <div class="tag-cloud post-tag-cloud" style="margin-top: 0px; padding: 6px 25px 6px 25px;">
                                                    <a href="#" class="tag">พฤกษา</a>
                                                    <a href="#" class="tag">โครงการบ้านใหม่</a>
                                                    <a href="#" class="tag">รามอินทรา</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label text-right">แสดงผลหน้าเว็บไซต์</label>
                                        <div class="col-sm-8">
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