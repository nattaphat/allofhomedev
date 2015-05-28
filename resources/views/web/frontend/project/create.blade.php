@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')
    <script type="text/javascript"> var centreGot = true; </script>
    {!! $map['js'] !!}
@stop

@section('jsbody')

    <script type="text/javascript">
        $(document).ready(function(){

            Dropzone.autoDiscover = false;

            var myDropzone = initDropzone();
            checkPostBack();

            function initDropzone()
            {
                return new Dropzone("#dZUpload", {
                    url: '{{ URL("post/upload") }}',
                    maxFiles: 1,
                    maxFilesize: 3, //mb
                    acceptedFiles: 'image/*',
                    addRemoveLinks: true,
                    autoProcessQueue: true,
                    sending: function(file, xhr, formData) {
                        formData.append("_token", $('[name=_token]').val());
                    },
                    success: function (file, response) {
                        var filename = file.name;
                        var filetype = file.type;
                        var filesize = file.size;
                        var filepath = response;
                        $("#file").val(filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath);
                        file.previewElement.classList.add("dz-success");
                    },
                    error: function (file, response) {
                        this.removeFile(file);
                        alert(response);
                        //file.previewElement.classList.add("dz-error");
                    }
                });
            }

            $("#area").change(function(){
                var id = this.value;
                areaOnChange(id);
            });

            function areaOnChange(id)
            {
                $.ajax({
                    url: '{{ URL::route('project_getSubArea') }}',
                    data: { id: id },
                    success: function(data, message){
                        var subArea = $('#subarea');
                        subArea.empty();
                        subArea.append("<option value=''>-- กรุณาเลือก --</option>");
                        $.each(data, function(key, element) {
                            if(element.id == '{{ Input::old('subarea_id') }}')
                            {
                                subArea.append("<option value='"+ element.id +"' selected>"
                                + element.subarea_name + "</option>");
                            }
                            else
                            {
                                subArea.append("<option value='"+ element.id +"'>"
                                + element.subarea_name + "</option>");
                            }
                        });

                    }
                });
            }

            $("#province").change(function(){
                var id = this.value;
                provinceOnChange(id);
            });

            function provinceOnChange(id)
            {
                $.ajax({
                    url: '{{ URL::route('project_getAmphoe') }}',
                    data: { provid: id },
                    success: function(data, message){
                        var amphoe = $('#amphoe');
                        amphoe.empty();
                        amphoe.append("<option>-- กรุณาเลือก --</option>");
                        var tambon = $('#tambon');
                        tambon.empty();
                        tambon.append("<option>-- กรุณาเลือก --</option>");
                        $.each(data, function(key, element) {
                            if(element.amphid == '{{ Input::old('amphid') }}') {
                                amphoe.append("<option value='"+ element.amphid +"' selected>"
                                + element.name + "</option>");
                            }
                            else
                            {
                                amphoe.append("<option value='"+ element.amphid +"'>"
                                + element.name + "</option>");
                            }
                        });
                    }
                });
            }

            $("#amphoe").change(function(){
                var amphid = this.value;
                var province = $("#province");
                var provid = province.val();
                amphoeOnChange(provid, amphid);
            });

            function amphoeOnChange(provid, amphid)
            {
                $.ajax({
                    url: '{{ URL::route('project_getTambon') }}',
                    data: { amphid: amphid, provid: provid },
                    success: function(data, message){
                        var tambon = $('#tambon');
                        tambon.empty();
                        tambon.append("<option>-- กรุณาเลือก --</option>");
                        $.each(data, function(key, element) {
                            if(element.tambid == '{{ Input::old('tambid') }}'){
                                tambon.append("<option value='"+ element.tambid +"' selected>"
                                + element.name + "</option>");
                            }
                            else
                            {
                                tambon.append("<option value='"+ element.tambid +"'>"
                                + element.name + "</option>");
                            }
                        });
                    }
                });
            }

            function checkPostBack()
            {
                var provid = '{{ Input::old('provid') }}';
                var amphid = '{{ Input::old('amphid') }}';
                var area_id = '{{ Input::old('area_id') }}';
                var file = '{{ Input::old('file') }}';

                if(provid != null && provid != '')
                {
                    provinceOnChange(provid);
                }

                if(amphid != null && amphid != '')
                {
                    amphoeOnChange(amphid);
                }

                if(area_id != null && area_id != '')
                {
                    areaOnChange(area_id);
                }

                if(file != null && file != '')
                {
                    var f = file.split("@@@");
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

                    Dropzone.forElement("div#dZUpload").emit("addedfile", mockFile);
                    Dropzone.forElement("div#dZUpload").emit("thumbnail", mockFile, filepath);
                    Dropzone.forElement("div#dZUpload").emit("complete", mockFile);
                    Dropzone.forElement("div#dZUpload").files.push(mockFile);

                    //var existingFileCount = 1; // The number of files already uploaded
                    //myDropzone.options.maxFiles = myDropzone.options.maxFiles - existingFileCount;
                    myDropzone.options.maxFiles = 1;
                }
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
                                    <span style="color: #55a79a;">เพิ่มโครงการใหม่</span>
                                </h2>
                                @if ( Session::has('flash_message') )
                                    <div class="alert {{ Session::get('flash_type') }}">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <h4>{{ Session::get('flash_message') }}</h4>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                {!! Form::open(array('url'=>'project/create', 'method' => 'POST', 'files' => 'true',
                                    'data-ajax' => 'true', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}
                                <div class="bs-callout bs-callout-success">
                                    ข้อมูลทั่วไป
                                </div>
                                <div class="form-group @if ($errors->has('project_name')) {{ "has-error" }} @endif">
                                    <label for="project_name" class="col-md-3 control-label">ชื่อโครงการ *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="project_name" name="project_name"
                                               placeholder="" value="{{Input::old('project_name')}}">
                                        <p class="help-block">
                                            {{ $errors->first('project_name') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('project_company_owner')) {{ "has-error" }} @endif">
                                    <label for="project_company_owner" class="col-md-3 control-label">บริษัทเจ้าของโครงการ *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control"
                                               id="project_company_owner" name="project_company_owner"
                                               placeholder="" value="{{Input::old('project_company_owner')}}">
                                        <p class="help-block">
                                            {{ $errors->first('project_company_owner') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('file')) {{ "has-error" }} @endif">
                                    <div class="col-md-3 control-label">Logo *</div>
                                    <div class="col-md-3">
                                        <div id="dZUpload" class="dropzone uploadify">
                                        </div>
                                        <p class="help-block">
                                            {{ $errors->first('file') }}
                                        </p>
                                    </div>
                                    <input type="hidden" id="file" name="file"
                                          value="{{ Input::old('file') }}">
                                </div>
                                <div class="row" style="padding-top:20px;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">ที่ตั้งโครงการ *</div>
                                </div>
                                <div class="form-group @if ($errors->has('provid')) {{ "has-error" }} @endif">
                                    <label for="provid" class="col-md-3 control-label">จังหวัด *</label>
                                    <div class="col-md-6">
                                        {!! Form::select('provid', [null=>'-- กรุณาเลือก --']
                                            + $province->lists('name', 'provid'), Input::old('provid'),
                                        ['id' => 'province', 'class' => 'form-control', 'style' => 'min-width: 300px;']) !!}
                                        <p class="help-block">
                                            {{ $errors->first('provid') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('amphid')) {{ "has-error" }} @endif">
                                    <label for="amphid" class="col-md-3 control-label">อำเภอ/เขต *</label>
                                    <div class="col-md-6">
                                        {!! Form::select('amphid', [null=>'-- กรุณาเลือก --']
                                        + $amphoe->lists('name', 'amphid'), Input::old('amphid'),
                                        ['id' => 'amphoe', 'class' => 'form-control', 'style' => 'min-width: 300px;']) !!}
                                        <p class="help-block">
                                            {{ $errors->first('amphid') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('tambid')) {{ "has-error" }} @endif">
                                    <label for="tambid" class="col-md-3 control-label">ตำบล/แขวง *</label>
                                    <div class="col-md-6">
                                        {!! Form::select('tambid', [null=>'-- กรุณาเลือก --']
                                        + $tambon->lists('name', 'tambid'), Input::old('tambid'),
                                        ['id' => 'tambon', 'class' => 'form-control', 'style' => 'min-width: 300px;']) !!}
                                        <p class="help-block">
                                            {{ $errors->first('tambid') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('add_street')) {{ "has-error" }} @endif">
                                    <label for="add_street" class="col-md-3 control-label">ถนน *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="add_street" name="add_street"
                                               placeholder="" value="{{Input::old('add_street')}}">
                                        <p class="help-block">
                                            {{ $errors->first('add_street') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="area_id" class="col-md-3 control-label">ทำเล/ย่าน หลัก</label>
                                    <div class="col-md-6">
                                        {!! Form::select('area_id', [null=>'-- กรุณาเลือก --']
                                        + $area->lists('area_name', 'id'), Input::old('area_id'),
                                        ['id' => 'area', 'style' => 'min-width: 300px;']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subarea_id" class="col-md-3 control-label">ทำเล/ย่าน ย่อย</label>
                                    <div class="col-md-6">
                                        {!! Form::select('subarea_id', [null=>'-- กรุณาเลือก --']
                                        + $subarea->lists('subarea_name', 'id'), Input::old('subarea_id'),
                                        ['id' => 'subarea', 'style' => 'min-width: 300px;']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website" class="col-md-3 control-label">เว็บไซต์โครงการ</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="website" name="website"
                                               placeholder="" value="{{Input::old('website')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="facebook" class="col-md-3 control-label">Facebook</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                               placeholder="" value="{{Input::old('facebook')}}">
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom: 20px;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-8">
                                        <small>กำหนดตำแหน่งแผนที่:</small>
                                        {!! $map['html'] !!}
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="form-group @if ($errors->has('lat')) {{ "has-error" }} @endif">
                                    <label for="lat" class="col-md-3 control-label">Latitude *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="latitude" name="lat"
                                               readonly="true" placeholder="" value="{{Input::old('lat')}}">
                                        <p class="help-block">
                                            {{ $errors->first('lat') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('long')) {{ "has-error" }} @endif">
                                    <label for="long" class="col-md-3 control-label">Longitude *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="longitude" name="long"
                                               readonly="true" placeholder="" value="{{Input::old('long')}}">
                                        <p class="help-block">
                                            {{ $errors->first('long') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('map_url')) {{ "has-error" }} @endif">
                                    <label for="map_url" class="col-md-3 control-label">ลิงค์แผนที่ *</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="map_url" name="map_url"
                                               readonly="true" placeholder="" value="{{Input::old('map_url')}}">
                                        <p class="help-block">
                                            {{ $errors->first('map_url') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                    สิ่งอำนวยความสะดวก
                                </div>
                                <div class="form-group">
                                    <label for="facility[]" class="col-md-3 control-label">สิ่งอำนวยความสะดวก</label>
                                    <div class="col-md-6">
                                        @foreach($facility as $item)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="facility[]"
                                                           value="{{ $item["id"] }}"
                                                            <?php
                                                            if (Input::old('facility') != null) {
                                                                foreach(Input::old('facility') as $key => $value)
                                                                {
                                                                    if($value == $item["id"])
                                                                        echo "checked";
                                                                }
                                                            }
                                                            ?>
                                                            > {{ $item["fac_name"] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="facility_str" class="col-md-3 control-label">สิ่งอำนวยความสะดวกอื่นๆ</label>
                                    <div class="col-md-8">
                                            <textarea
                                                    id="facility_str"
                                                    name="facility_str"
                                                    class="form-control"
                                                    placeholder=""
                                                    rows="3"
                                                    >{{Input::old('facility_str')}}</textarea>
                                    </div>
                                </div>
                                <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                    สถานที่ใกล้เคียง
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-3 control-label">BTS</label>
                                    <div class="col-md-6">
                                        @foreach($bts as $item)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="bts[]"
                                                           value="{{ $item["id"] }}"
                                                            <?php
                                                            if (Input::old('bts') != null) {
                                                                foreach(Input::old('bts') as $key => $value)
                                                                {
                                                                    if($value == $item["id"])
                                                                        echo "checked";
                                                                }
                                                            }
                                                            ?>
                                                            > {{ $item["bts_name"] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-3 control-label">MRT</label>
                                    <div class="col-md-6">
                                        @foreach($mrt as $item)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="mrt[]"
                                                           value="{{ $item["id"] }}"
                                                            <?php
                                                            if (Input::old('mrt') != null) {
                                                                foreach(Input::old('mrt') as $key => $value)
                                                                {
                                                                    if($value == $item["id"])
                                                                        echo "checked";
                                                                }
                                                            }
                                                            ?>
                                                            > {{ $item["mrt_name"] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-3 control-label">Airport Rail Link</label>
                                    <div class="col-md-6">
                                        @foreach($apl as $item)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="apl[]"
                                                           value="{{ $item["id"] }}"
                                                            <?php
                                                            if (Input::old('apl') != null) {
                                                                foreach(Input::old('apl') as $key => $value)
                                                                {
                                                                    if($value == $item["id"])
                                                                        echo "checked";
                                                                }
                                                            }
                                                            ?>
                                                            > {{ $item["apl_name"] }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nearby_str" class="col-md-3 control-label">สถานที่ใกล้เคียงอื่นๆ</label>
                                    <div class="col-md-8">
                                        <textarea
                                                id="nearby_str"
                                                name="nearby_str"
                                                class="form-control"
                                                placeholder=""
                                                rows="3"
                                                >{{Input::old('nearby_str')}}</textarea>
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
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop