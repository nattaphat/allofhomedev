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

        if('{{ Input::old('lat') }}' == '')
        {
            google.maps.event.addDomListener(window, "load", initialize_map);
        }

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

            $("#construct_date").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy'
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

            $('#sell_price').mask('000,000,000,000,000', {reverse: true});
            $('#sell_price_from').mask('000,000,000,000,000', {reverse: true});
            $('#sell_price_to').mask('000,000,000,000,000', {reverse: true});
            $('#spare_price').mask('000,000,000,000,000', {reverse: true});
            $('#central_price').mask('000,000,000,000,000', {reverse: true});

            $('#project_area').mask('000,000,000,000,000', {reverse: true});
            $('#num_unit').mask('000,000,000,000,000', {reverse: true});

            $("#finish_date").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy'
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

            Dropzone.autoDiscover = false;

            var myDropzone1 = initDropzone1();
            var myDropzone2 = initDropzone2();
            var myDropzone3 = initDropzone3();
            var myDropzone4 = initDropzone4();

            var lat,long, project_full_name;

            checkPostBack();

            function initDropzone1()
            {
                return $("#dZUpload1").dropzone({
                    url: "{{ URL::route('post_upload') }}",
                    method: "POST",
                    thumbnailWidth:"100",
                    thumbnailHeight:"100",
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                    autoProcessQueue: true,
                    success: function (file, response) {
                        var filename = file.name;
                        var filetype = file.type;
                        var filesize = file.size;
                        var filepath = response;
                        $oldVal = $("#pic_layout").val();
                        $("#pic_layout").val($oldVal + filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath + "###");
                        file.previewElement.classList.add("dz-success");
                    },
                    sending: function(file, xhr, formData) {
                        formData.append("_token", $('[name=_token]').val());
                    },
                    error: function (file, response) {
                        file.previewElement.classList.add("dz-error");
                    }
                });
            }

            function initDropzone2()
            {
                return $("#dZUpload2").dropzone({
                    url: "{{ URL::route('post_upload') }}",
                    method: "POST",
                    thumbnailWidth:"100",
                    thumbnailHeight:"100",
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                    autoProcessQueue: true,
                    success: function (file, response) {
                        var filename = file.name;
                        var filetype = file.type;
                        var filesize = file.size;
                        var filepath = response;
                        $oldVal = $("#pic_env").val();
                        $("#pic_env").val($oldVal + filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath + "###");
                        file.previewElement.classList.add("dz-success");
                    },
                    sending: function(file, xhr, formData) {
                        formData.append("_token", $('[name=_token]').val());
                    },
                    error: function (file, response) {
                        file.previewElement.classList.add("dz-error");
                    }
                });
            }

            function initDropzone3()
            {
                return $("#dZUpload3").dropzone({
                    url: "{{ URL::route('post_upload') }}",
                    method: "POST",
                    thumbnailWidth:"100",
                    thumbnailHeight:"100",
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                    autoProcessQueue: true,
                    success: function (file, response) {
                        var filename = file.name;
                        var filetype = file.type;
                        var filesize = file.size;
                        var filepath = response;
                        $oldVal = $("#pic_scene").val();
                        $("#pic_scene").val($oldVal + filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath + "###");
                        file.previewElement.classList.add("dz-success");
                    },
                    sending: function(file, xhr, formData) {
                        formData.append("_token", $('[name=_token]').val());
                    },
                    error: function (file, response) {
                        file.previewElement.classList.add("dz-error");
                    }
                });
            }

            function initDropzone4()
            {
                return $("#dZUpload4").dropzone({
                    url: "{{ URL::route('post_upload') }}",
                    method: "POST",
                    thumbnailWidth:"100",
                    thumbnailHeight:"100",
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                    autoProcessQueue: true,
                    success: function (file, response) {
                        var filename = file.name;
                        var filetype = file.type;
                        var filesize = file.size;
                        var filepath = response;
                        $oldVal = $("#pic_deliver").val();
                        $("#pic_deliver").val($oldVal + filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath + "###");
                        file.previewElement.classList.add("dz-success");
                    },
                    sending: function(file, xhr, formData) {
                        formData.append("_token", $('[name=_token]').val());
                    },
                    error: function (file, response) {
                        file.previewElement.classList.add("dz-error");
                    }
                });
            }

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
                var old_project_id = '{{ Input::old('project_id') }}';
                var old_prj_name = '{{ Input::old('prj_name') }}';
                var old_lat = '{{ Input::old('lat') }}';
                var old_long = '{{ Input::old('long') }}';

                if(repo.id == "" && old_project_id != null && old_project_id != '')
                {
                    $('#project_id').val(old_project_id);
                    $('#prj_name').val(old_prj_name);
                    $('#lat').val(old_lat);
                    $('#long').val(old_long);

                    $.ajax({
                        url: '{{ url('project/view_project') }}' + '/' + old_project_id,
                        dataType: 'html',
                        success: function(data) {
                            $('#project_detail').html($(data));
                        }
                    });
                    changeLocationMap(old_lat, old_long);
                    return old_prj_name;
                }
                else
                {
                    if(repo.id != "")
                    {
                        $('#project_id').val(repo.id);
                        $('#prj_name').val(repo.text);
                        $('#lat').val(repo.lat);
                        $('#long').val(repo.long);

                        $.ajax({
                            url: '{{ url('project/view_project') }}' + '/' + repo.id,
                            dataType: 'html',
                            success: function(data) {
                                $('#project_detail').html($(data));
                            }
                        });
                        changeLocationMap(repo.lat, repo.long);
                    }
                    return repo.text;
                }
            }

            function checkPostBack()
            {
                var pic_layout = '{{ Input::old('pic_layout') }}';
                var pic_env = '{{ Input::old('pic_env') }}';
                var pic_scene = '{{ Input::old('pic_scene') }}';
                var pic_deliver = '{{ Input::old('pic_deliver') }}';

                if(pic_layout != null && pic_layout != '')
                {
                    var file_all = pic_layout.split("###");
                    $.each(file_all, function( index, value ) {
                        if(value != "")
                        {
                            var f = value.split("@@@");
                            var filename = f[0];
                            var filetype = f[1];
                            var filesize = parseInt(f[2]);
                            var filepath = f[3];

                            var mockFile = {
                                name: filename,
                                size: filesize,
                                type: filetype,
                                status: Dropzone.ADDED,
                                url: filepath
                            };

                            Dropzone.forElement("div#dZUpload1").emit("addedfile", mockFile);
                            Dropzone.forElement("div#dZUpload1").emit("thumbnail", mockFile, filepath);
                            Dropzone.forElement("div#dZUpload1").emit("complete", mockFile);
                            Dropzone.forElement("div#dZUpload1").files.push(mockFile);
                        }
                    });
                }

                if(pic_env != null && pic_env != '')
                {
                    var file_all = pic_env.split("###");
                    $.each(file_all, function( index, value ) {
                        if(value != "")
                        {
                            var f = value.split("@@@");
                            var filename = f[0];
                            var filetype = f[1];
                            var filesize = parseInt(f[2]);
                            var filepath = f[3];

                            var mockFile = {
                                name: filename,
                                size: filesize,
                                type: filetype,
                                status: Dropzone.ADDED,
                                url: filepath
                            };

                            Dropzone.forElement("div#dZUpload2").emit("addedfile", mockFile);
                            Dropzone.forElement("div#dZUpload2").emit("thumbnail", mockFile, filepath);
                            Dropzone.forElement("div#dZUpload2").emit("complete", mockFile);
                            Dropzone.forElement("div#dZUpload2").files.push(mockFile);
                        }
                    });
                }

                if(pic_scene != null && pic_scene != '')
                {
                    var file_all = pic_scene.split("###");
                    $.each(file_all, function( index, value ) {
                        if(value != "")
                        {
                            var f = value.split("@@@");
                            var filename = f[0];
                            var filetype = f[1];
                            var filesize = parseInt(f[2]);
                            var filepath = f[3];

                            var mockFile = {
                                name: filename,
                                size: filesize,
                                type: filetype,
                                status: Dropzone.ADDED,
                                url: filepath
                            };

                            Dropzone.forElement("div#dZUpload3").emit("addedfile", mockFile);
                            Dropzone.forElement("div#dZUpload3").emit("thumbnail", mockFile, filepath);
                            Dropzone.forElement("div#dZUpload3").emit("complete", mockFile);
                            Dropzone.forElement("div#dZUpload3").files.push(mockFile);
                        }
                    });
                }

                if(pic_deliver != null && pic_deliver != '')
                {
                    var file_all = pic_deliver.split("###");
                    $.each(file_all, function( index, value ) {
                        if(value != "")
                        {
                            var f = value.split("@@@");
                            var filename = f[0];
                            var filetype = f[1];
                            var filesize = parseInt(f[2]);
                            var filepath = f[3];

                            var mockFile = {
                                name: filename,
                                size: filesize,
                                type: filetype,
                                status: Dropzone.ADDED,
                                url: filepath
                            };

                            Dropzone.forElement("div#dZUpload4").emit("addedfile", mockFile);
                            Dropzone.forElement("div#dZUpload4").emit("thumbnail", mockFile, filepath);
                            Dropzone.forElement("div#dZUpload4").emit("complete", mockFile);
                            Dropzone.forElement("div#dZUpload4").files.push(mockFile);
                        }
                    });
                }

                @if(Input::old('tag') != null)

                @endif
            }

            var tag_main_name = "";
            $("#tag").select2(
                    {
                        ajax: {
                            url: "{{ url('get_tag') }}",
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
                        templateSelection: function(repo)
                        {
                            if(repo.text != null && repo.text != "")
                                return repo.text;
                            else
                                return repo.tag_sub_name;
                        },
                        templateResult: function(repo)
                        {
                            if (repo.loading) return repo.text;

                            if(tag_main_name == "")
                            {
                                tag_main_name = repo.tag_main_name;
                                return "<strong>" + repo.tag_main_name + "</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + repo.tag_sub_name;
                            }
                            else if(tag_main_name != repo.tag_main_name)
                            {
                                tag_main_name = repo.tag_main_name;
                                return "<strong>" + repo.tag_main_name + "</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + repo.tag_sub_name;
                            }
                            else
                            {
                                return "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + repo.tag_sub_name;
                            }
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
                                {!! Form::open(array('url'=>'home/create', 'method' => 'POST', 'files' => 'true',
                                'data-ajax' => 'true', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

                                <div class="bs-callout bs-callout-success">
                                    ข้อมูลทั่วไป
                                </div>
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group @if ($errors->has('title')) {{ "has-error" }} @endif">
                                    <label for="title" class="col-md-3 control-label">หัวข้อประกาศ *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"
                                               id="title" name="title" placeholder=""
                                               value="{{Input::old('title')}}">
                                        <p class="help-block">
                                            {{ $errors->first('title') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('subtitle')) {{ "has-error" }} @endif">
                                    <label for="subtitle" class="col-md-3 control-label">เนื้อหาย่อ *</label>
                                    <div class="col-md-8">
                                            <textarea
                                                    id="subtitle"
                                                    name="subtitle"
                                                    class="form-control"
                                                    placeholder=""
                                                    rows="3"
                                                    >{{Input::old('subtitle')}}</textarea>
                                        <p class="help-block">
                                            {{ $errors->first('subtitle') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                    ข้อมูลผู้ติดต่อ
                                </div>
                                <div class="form-group @if ($errors->has('contact_company_name')) {{ "has-error" }} @endif">
                                    <label for="contact_company_name" class="col-md-3 control-label">ชื่อบริษัท *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('contact_company_name')}}"
                                               id="contact_company_name" name="contact_company_name" placeholder="">
                                        <p class="help-block">
                                            {{ $errors->first('contact_company_name') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group  @if ($errors->has('contact_telephone')) {{ "has-error" }} @endif">
                                    <label for="contact_telephone" class="col-md-3 control-label">เบอร์ติดต่อโครงการ *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('contact_telephone')}}"
                                               id="contact_telephone" name="contact_telephone" placeholder="">
                                        <p class="help-block">
                                            {{ $errors->first('contact_telephone') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_email" class="col-md-3 control-label">อีเมล</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('contact_email')}}"
                                               id="contact_email" name="contact_email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_website" class="col-md-3 control-label">เว็บไซต์บริษัท</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('contact_website')}}"
                                               id="contact_website" name="contact_website" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_lineid" class="col-md-3 control-label">Line ID</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('contact_lineid')}}"
                                               id="contact_lineid" name="contact_lineid" placeholder="">
                                    </div>
                                </div>
                                <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                    ข้อมูลเบื้องต้นโครงการ
                                </div>
                                <div class="form-group  @if ($errors->has('project_id')) {{ "has-error" }} @endif">
                                    <label for="project_name" class="col-md-3 control-label">ชื่อโครงการ *</label>
                                    <div class="col-md-6">
                                        <select id="project_name" style="width:100%;">
                                            <option value=""></option>
                                        </select>
                                        <input type="hidden" id="project_id" name="project_id"  value="{{Input::old('project_id')}}">
                                        <input type="hidden" id="prj_name" name="prj_name"  value="{{Input::old('prj_name')}}">
                                        <input type="hidden" id="lat" name="lat"  value="{{Input::old('lat')}}">
                                        <input type="hidden" id="long" name="long"  value="{{Input::old('long')}}">
                                        <p class="help-block">
                                            {{ $errors->first('project_id') }}
                                        </p>
                                    </div>
                                    <div call="col-md-3 text-right">
                                        <a href="{{ url('project/create') }}">
                                            <i class="fa fa-plus-square"></i> เพิ่มโครงการใหม่</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! $map['html'] !!}
                                        <div id="project_detail"></div>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('project_type')) {{ "has-error" }} @endif" style="padding-top:30px;">
                                    <label for="project_type" class="col-md-3 control-label">รูปแบบบ้าน *</label>
                                    <div class="col-md-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="project_type[]" value="1"
                                            <?php
                                                    if (Input::old('project_type') != null) {
                                                        foreach(Input::old('project_type') as $key => $value)
                                                        {
                                                            if($value == "1")
                                                                echo "checked";
                                                        }
                                                    }
                                                    ?>>บ้านเดี่ยว
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="project_type[]" value="2"
                                            <?php
                                                    if (Input::old('project_type') != null) {
                                                        foreach(Input::old('project_type') as $key => $value)
                                                        {
                                                            if($value == "2")
                                                                echo "checked";
                                                        }
                                                    }
                                                    ?>>บ้านแฝด
                                        </label>
                                        <p class="help-block">
                                            {{ $errors->first('project_type') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group  @if ($errors->has('project_area')) {{ "has-error" }} @endif">
                                    <label for="project_area" class="col-md-3 control-label">พื้นที่โครงการ (ไร่)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('project_area')}}"
                                               id="project_area" name="project_area" placeholder="">
                                        <p class="help-block">
                                            {{ $errors->first('project_area') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="num_unit" class="col-md-3 control-label">จำนวนยูนิต</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('num_unit')}}"
                                               id="num_unit" name="num_unit" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="home_type_per_area" class="col-md-3 control-label">รูปแบบบ้าน : พื้นที่เริ่มต้น</label>
                                    <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_type_per_area" name="home_type_per_area"
                                                      placeholder="เช่น บ้านเดี่ยว : 18 ตร.ว." rows="3">{{Input::old('home_type_per_area')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="home_area" class="col-md-3 control-label">พื้นที่บ้านเริ่มต้น</label>
                                    <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_area" name="home_area"
                                                      placeholder="เช่น บ้านเดี่ยว 130 ตร.ม." rows="3">{{Input::old('home_area')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="home_material" class="col-md-3 control-label">การก่อสร้างตัวบ้าน</label>
                                    <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_material" name="home_material"
                                                      placeholder="เช่น อิฐแดง อิฐมวลเบา ระบบ tunnel" rows="3">{{Input::old('home_material')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="home_style" class="col-md-3 control-label">สไตล์การออกแบบ</label>
                                    <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="home_style" name="home_style"
                                                      placeholder="เช่น Modern, Art Deco" rows="3">{{Input::old('home_style')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:20px;">
                                    <label for="project_layout" class="col-md-3 control-label">แผนผังโครงการ</label>
                                    <div class="col-md-8">
                                        <div id="dZUpload1" name="dZUpload1" class="dropzone uploadify"></div>
                                        <input type="hidden" id="pic_layout" name="pic_layout"
                                               value="{{ Input::old('pic_layout') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="home_style" class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="project_layout" name="project_layout"
                                                      placeholder="คำบรรยายแผนผังโครงการ" rows="5"
                                                    >{{Input::old('project_layout')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:20px;">
                                    <label for="project_env" class="col-md-3 control-label">สภาพแวดล้อมโครงการ</label>
                                    <div class="col-md-8">
                                        <div id="dZUpload2" class="dropzone uploadify"></div><br>
                                        <input type="hidden" id="pic_env" name="pic_env"
                                               value="{{ Input::old('pic_env') }}">
                                            <textarea class="form-control"
                                                      id="project_env" name="project_env"
                                                      placeholder="คำบรรยายสภาพแวดล้อมโครงการ" rows="5">{{Input::old('project_env')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:20px;">
                                    <label for="project_scene" class="col-md-3 control-label">บรรยากาศบ้านตกแต่ง</label>
                                    <div class="col-md-8">
                                        <div id="dZUpload3" class="dropzone uploadify"></div><br>
                                        <input type="hidden" id="pic_scene" name="pic_scene"
                                               value="{{ Input::old('pic_scene') }}">
                                            <textarea class="form-control"
                                                      id="project_scene" name="project_scene"
                                                      placeholder="คำบรรยายบรรยากาศบ้านตกแต่ง" rows="5">{{Input::old('project_scene')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:20px;">
                                    <label for="project_deliver" class="col-md-3 control-label">บรรยากาศบ้านจริงเมื่อรับมอบ</label>
                                    <div class="col-md-8">
                                        <div id="dZUpload4" class="dropzone uploadify"></div><br>
                                        <input type="hidden" id="pic_deliver" name="pic_deliver"
                                               value="{{ Input::old('pic_layout') }}">
                                            <textarea class="form-control"
                                                      id="project_deliver" name="project_deliver"
                                                      placeholder="คำบรรยายบรรยากาศบ้านตกแต่ง" rows="5">{{Input::old('project_deliver')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="eia" class="col-md-3 control-label">โครงการผ่าน EIA</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="eia[]"
                                                   id="eia1" value="true"
                                            <?php
                                                    if (Input::old('eia') != null) {
                                                        foreach(Input::old('eia') as $key => $value)
                                                        {
                                                            if($value == "true")
                                                                echo "checked";
                                                        }
                                                    }
                                                    ?>
                                                    > ผ่าน
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="eia[]"
                                                   id="eia2" value="false"
                                            <?php
                                                    if (Input::old('eia') != null) {
                                                        foreach(Input::old('eia') as $key => $value)
                                                        {
                                                            if($value == "false")
                                                                echo "checked";
                                                        }
                                                    }
                                                    ?>
                                                    > ไม่ผ่าน
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('sell_price')) {{ "has-error" }} @endif">
                                    <label for="sell_price" class="col-md-3 control-label">ราคาขายเปิดโครงการ *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"
                                               id="sell_price" name="sell_price"
                                               value="{{Input::old('sell_price')}}" placeholder="">
                                        <p class="help-block">
                                            {{ $errors->first('sell_price') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('sell_price_from') || $errors->has('sell_price_to')) {{ "has-error" }} @endif">
                                    <div class="col-md-3 text-right">
                                        <label class="control-label">ช่วงราคาขาย *</label>
                                    </div>
                                    <div class="col-md-9" style="padding-top: 0px; padding-bottom: 10px;">
                                        <div class="col-md-3" style="padding: 0px 0px 0px 0px;">
                                            <input type="text" class="form-control"
                                                   id="sell_price_from" name="sell_price_from"
                                                   value="{{Input::old('sell_price_from')}}"
                                                   placeholder="">
                                            <p class="help-block">
                                                {{ $errors->first('sell_price_from') }}
                                            </p>
                                        </div>
                                        <div class="col-md-1 text-center"  style="padding: 0px 0px 0px 0px;">ถึง</div>
                                        <div class="col-md-3"  style="padding: 0px 0px 0px 0px;">
                                            <input type="text" class="form-control"
                                                   id="sell_price_to" name="sell_price_to"
                                                   value="{{Input::old('sell_price_to')}}"
                                                   placeholder="">
                                            <p class="help-block">
                                                {{ $errors->first('sell_price_to') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('construct_date')) {{ "has-error" }} @endif">
                                    <label for="construct_date" class="col-md-3 control-label">เริ่มก่อสร้าง *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" readonly="true"
                                               id="construct_date" name="construct_date"
                                               value="{{Input::old('construct_date')}}"
                                               placeholder="" style="width:100px;">
                                        <p class="help-block">
                                            {{ $errors->first('construct_date') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('finish_date')) {{ "has-error" }} @endif">
                                    <label for="finish_date" class="col-md-3 control-label">คาดว่าแล้วเสร็จ *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" readonly="true"
                                               id="finish_date" name="finish_date"
                                               value="{{Input::old('finish_date')}}"
                                               placeholder="" style="width:100px;">
                                        <p class="help-block">
                                            {{ $errors->first('finish_date') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- รายละเอียดส่วนกลาง -->
                                <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                    รายละเอียดส่วนกลาง
                                </div>
                                <div class="form-group">
                                    <label for="spare_price" class="col-md-3 control-label">กองทุนสำรอง (บ/ตร.ว.)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"  value="{{Input::old('spare_price')}}"
                                               id="spare_price" name="spare_price"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="central_price" class="col-md-3 control-label">ค่าส่วนกลาง (บ/ตร.ว.)</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="{{Input::old('central_price')}}"
                                               id="central_price" name="central_price"
                                               placeholder="">
                                    </div>
                                </div>
                                <!-- การคำนวณเงินกู้ -->
                                <div class="bs-callout bs-callout-success" style="display:none; margin-top: 40px;">
                                    การคำนวณเงินกู้
                                </div>
                                <div class="form-group" style="display:none;">
                                    <label for="loan_detail" class="col-md-3 control-label">การคำนวณเงินกู้</label>
                                    <div class="col-md-8">
                                            <textarea class="form-control"
                                                      id="loan_detail" name="loan_detail"
                                                      placeholder="" rows="10">{{Input::old('loan_detail')}}</textarea>
                                    </div>
                                </div>
                                <!-- ส่วนลดโปรโมชั่น -->
                                <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                    ส่วนลดโปรโมชั่น
                                </div>
                                <div class="form-group">
                                    <label for="promotion" class="col-md-3 control-label">ส่วนลดโปรโมชั่น</label>
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
                                                      placeholder="" rows="3">{{Input::old('promotion_str')}}</textarea>
                                    </div>
                                </div>
                                <!-- รายละเอียดอื่นๆ -->
                                <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                    รายละเอียดอื่นๆ
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
                                                value="{{Input::old('video_url')}}">
                                        <p class="help-block">
                                            {{ $errors->first('video_url') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tag" class="col-md-3 control-label">Tags</label>
                                    <div class="col-md-8">
                                        <select class="form-control" multiple="multiple" id="tag" name="tag[]">
                                            @if(Input::old('tag') != null)
                                                @foreach(Input::old('tag') as $key=>$value)
                                                    <option value="{{ $value }}" selected>{{ App\Models\TagSub::getTagSubName($value) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('vip')) {{ "has-error" }} @endif" style="padding-top:30px;">
                                    <label for="vip" class="col-md-3 control-label">VIP</label>
                                    <div class="col-md-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="vip" value="true"
                                            <?php
                                                    if (Input::old('vip') != null && Input::old('vip') == true) {
                                                        echo "checked";
                                                    }
                                                    ?>>ตั้งค่ากระทู้ VIP
                                        </label>
                                        <p class="help-block">
                                            {{ $errors->first('vip') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('status')) {{ "has-error" }} @endif">
                                    <label  class="col-md-3 control-label text-right">แสดงผลหน้าเว็บไซต์ *</label>
                                    <div class="col-md-8">
                                        <label class="radio-inline">
                                            <input type="radio" name="status[]" id="status1"
                                                   value="1"
                                            <?php
                                                    if (Input::old('status') != null) {
                                                        foreach(Input::old('status') as $key => $value)
                                                        {
                                                            if($value == "1")
                                                                echo "checked";
                                                        }
                                                    }
                                                    ?>
                                                    > แสดงผล
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status[]" id="status2"
                                                   value="0"
                                            <?php
                                                    if (Input::old('status') != null) {
                                                        foreach(Input::old('status') as $key => $value)
                                                        {
                                                            if($value == "0")
                                                                echo "checked";
                                                        }
                                                    }
                                                    ?>
                                                    > ไม่แสดงผล
                                        </label>
                                        <p class="help-block">
                                            {{ $errors->first('status') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group" style="padding: 20px 0px 20px 0;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <button type="submit" id="btnSave" class="btn btn-primary">บันทึก</button>
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
        </div>
    </div>


@stop