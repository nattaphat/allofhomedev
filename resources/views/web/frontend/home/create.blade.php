@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        var centreGot = true;
        var map; // Global declaration of the map
        var lat_longs_map = new Array();
        var markers_map = new Array();
        var iw_map;

        iw_map = new google.maps.InfoWindow();

        function initialize_map() {

            var myOptions = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false}

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            // Try W3C Geolocation (Preferred)
            if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    map.setCenter(new google.maps.LatLng(position.coords.latitude,position.coords.longitude));
                }, function() { alert("Unable to get your current position. Please try again. Geolocation service failed."); });
                // Browser doesn't support Geolocation
            }else{
                alert('Your browser does not support geolocation.');
            }

            google.maps.event.addListener(map, "bounds_changed", function(event) {
                if (!centreGot) {
                    var mapCentre = map.getCenter();
                    marker_0.setOptions({
                        position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                    });
                }
                centreGot = true;
            });
        }

        function createMarker_map(markerOptions) {
            var marker = new google.maps.Marker(markerOptions);
            markers_map.push(marker);
            lat_longs_map.push(marker.getPosition());
            return marker;
        }

        google.maps.event.addDomListener(window, "load", initialize_map);

        // My Function Change Location
        function changeLocationMap(lat, long) {

            var myLatlng = new google.maps.LatLng(lat,long);

            var myOptions = {
                zoom: 15,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false}

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            google.maps.event.addListener(map, "bounds_changed", function(event) {
                if (!centreGot) {
                    var mapCentre = map.getCenter();
                    marker_0.setOptions({
                        position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                    });
                }
                centreGot = true;
            });

            var myLatlng = new google.maps.LatLng(lat, long);

            var markerOptions = {
                map: map,
                position: myLatlng
            };

            marker_0 = createMarker_map(markerOptions);
        }
    </script>
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
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('[name=_token]').val());
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                    console.log("File response :", response);
                }
            });

            $("#project_name").select2({
                ajax: {
                    url: "{{ url('project/get_project') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            term: params.term,
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        var ret = {
                            results: data,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                        return ret;
                    },
                    cache: true
                },
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            function formatRepo (repo) {
                if (repo.loading) return repo.text;
                var markup = repo.text;
                return markup;
            }

            function formatRepoSelection (repo) {
                $project_id = repo.id;
                $('#project_id').val($project_id);

                if($project_id != "")
                {
                    $.ajax({
                        url: '{{ url('project/view_project') }}' + '/' + $project_id,
                        dataType: 'html',
                        success: function(data) {
                            $('#project_detail').html($(data));
                        }
                    });

                    changeLocationMap(repo.lat, repo.long);
                }
                return repo.text;
            }
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
                                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="form-group">
                                        <label for="title" class="col-md-3 control-label">หัวข้อประกาศ</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="title" name="title" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle" class="col-md-3 control-label">เนื้อหาย่อ</label>
                                        <div class="col-md-8">
                                            <textarea
                                                    id="subtitle"
                                                    name="subtitle"
                                                    class="form-control"
                                                    placeholder=""
                                                    rows="3"
                                                    value="{{Input::old('subtitle')}}"
                                                    ></textarea>
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        ข้อมูลผู้ติดต่อ
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_company_name" class="col-md-3 control-label">ชื่อบริษัท</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="contact_company_name" name="contact_company_name" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_telephone" class="col-md-3 control-label">เบอร์ติดต่อโครงการ</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="contact_telephone" name="contact_telephone" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_email" class="col-md-3 control-label">อีเมล</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="contact_email" name="contact_email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_website" class="col-md-3 control-label">เว็บไซต์บริษัท</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="contact_website" name="contact_website" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_lineid" class="col-md-3 control-label">Line ID</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="contact_lineid" name="contact_lineid" placeholder="">
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        ข้อมูลเบื้องต้นโครงการ
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name" class="col-md-3 control-label">ชื่อโครงการ</label>
                                        <div class="col-md-6">
                                            <select id="project_name" style="width:100%;">
                                                <option value=""></option>
                                            </select>
                                            <input type="hidden" id="project_id" name="project_id" value="">
                                        </div>
                                        <div call="col-md-3 text-right">
                                            <a href="{{ url('project/create') }}">
                                                <i class="fa fa-plus-square"></i> เพิ่มโครงการใหม่</a>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 15px 15px 20px 10px; margin-top:0px;">
                                        <div class="col-md-12">
                                            <div id="project_detail"></div>
                                        </div>
                                        <div class="col-md-12">
                                            {!! $map['html'] !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_type" class="col-md-3 control-label">รูปแบบบ้าน</label>
                                        <div class="col-md-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="project_type[]" value="1">บ้านเดี่ยว
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="project_type[]" value="2">บ้านแฝด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_area" class="col-md-3 control-label">พื้นที่โครงการ (ไร่)</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="project_area" name="project_area" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="num_unit" class="col-md-3 control-label">จำนวนยูนิต</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="num_unit" name="num_unit" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_type_per_area" class="col-md-3 control-label">รูปแบบบ้าน : พื้นที่เริ่มต้น</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_type_per_area" name="home_type_per_area"
                                                      placeholder="เช่น บ้านเดี่ยว : 18 ตร.ว." rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_area" class="col-md-3 control-label">พื้นที่บ้านเริ่มต้น</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_area" name="home_area"
                                                      placeholder="เช่น บ้านเดี่ยว 130 ตร.ม." rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_material" class="col-md-3 control-label">การก่อสร้างตัวบ้าน</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_material" name="home_material"
                                                      placeholder="เช่น อิฐแดง อิฐมวลเบา ระบบ tunnel" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_style" class="col-md-3 control-label">สไตล์การออกแบบ</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_style" name="home_style"
                                                      placeholder="เช่น Modern, Art Deco" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_layout" class="col-md-3 control-label">แผนผังโครงการ</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="project_layout" name="project_layout"
                                                      placeholder="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_env" class="col-md-3 control-label">สภาพแวดล้อมโครงการ</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="project_env" name="project_env"
                                                      placeholder="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_scene" class="col-md-3 control-label">บรรยากาศบ้านตกแต่ง</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="project_scene" name="project_scene"
                                                      placeholder="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_deliver" class="col-md-3 control-label">บรรยากาศบ้านจริงเมื่อรับมอบ</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="project_deliver" name="project_deliver"
                                                      placeholder="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="eia" class="col-md-3 control-label">โครงการผ่าน EIA</label>
                                        <div class="col-md-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="eia[]"
                                                       id="eia1" value="true" checked> ผ่าน
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="eia[]"
                                                       id="eia2" value="false"> ไม่ผ่าน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sell_price" class="col-md-3 control-label">ราคาขายเปิดโครงการ</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="sell_price" name="sell_price"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="construct_date" class="col-md-3 control-label">เริ่มก่อสร้าง</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="construct_date" name="construct_date"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="finish_date" class="col-md-3 control-label">คาดว่าแล้วเสร็จ</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="finish_date" name="finish_date"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <!-- รายละเอียดส่วนกลาง -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        รายละเอียดส่วนกลาง
                                    </div>
                                    <div class="form-group">
                                        <label for="spare_price" class="col-md-3 control-label">กองทุนสำรอง (บ/ตร.ว.)</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="spare_price" name="spare_price"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="central_price" class="col-md-3 control-label">ค่าส่วนกลาง (บ/ตร.ว.)</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control"
                                                   id="central_price" name="central_price"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <!-- การคำนวณเงินกู้ -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        การคำนวณเงินกู้
                                    </div>
                                    <div class="form-group">
                                        <label for="loan_detail" class="col-md-3 control-label">การคำนวณเงินกู้</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="loan_detail" name="loan_detail"
                                                      placeholder="" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <!-- ส่วนลดโปรโมชั่น -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        ส่วนลดโปรโมชั่น
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-md-3 control-label">ส่วนลดโปรโมชั่น</label>
                                        <div class="col-md-6">
                                            @foreach($promotion as $item)
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="promotion[]"
                                                               value="{{ $item["id"] }}"
                                                        <?php
                                                                if (Input::old('promotion') != null) {
                                                                    foreach(Input::old('promotion') as $key => $value)
                                                                    {
                                                                        if($value == $item["id"])
                                                                            echo "checked";
                                                                    }
                                                                }
                                                                ?>
                                                                > {{ $item["promotion_name"] }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="promotion_str" class="col-md-3 control-label">โปรโมชั่นอื่นๆ</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="promotion_str" name="promotion_str"
                                                      placeholder="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!-- รายละเอียดอื่นๆ -->
                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        รายละเอียดอื่นๆ
                                    </div>
                                    <div class="form-group">
                                        <label for="other_detail" class="col-md-3 control-label">รายละเอียดอื่นๆ</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="other_detail" name="other_detail"
                                                      placeholder="" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label text-right">รูปภาพ</label>
                                        <div class="col-md-8">
                                            <div id="dZUpload" class="dropzone"></div>
                                        </div>
                                        <input type="hidden" id="file" name="file" value="">
                                    </div>
                                    <div class="form-group @if ($errors->has('video_url')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label text-right">ลิงค์วิดีโอ Youtube</label>
                                        <div class="col-md-8">
                                            <input
                                                    type="text"
                                                    id="video_url"
                                                    name="video_url"
                                                    class="form-control"
                                                    placeholder=""
                                                    value="{{Input::old('title')}}">
                                            <p class="help-block">
                                                {{ $errors->first('video_url') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label text-right">Tags</label>
                                            <div class="col-md-8">
                                                <div class="form-group input-group" style="padding: 6px 25px 6px 25px;">
                                                    <input type="text" class="form-control" id="tag_search">
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
                                        <label  class="col-md-3 control-label text-right">แสดงผลหน้าเว็บไซต์</label>
                                        <div class="col-md-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="status[]" id="status1"
                                                       value="1" checked> แสดงผล
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status[]" id="status2"
                                                       value="0"> ไม่แสดงผล
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 20px 0px 20px 0;">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                            <button type="button" class="btn btn-default">
                                                <a href="{{ URL::previous() }}">ยกเลิก</a></button>
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