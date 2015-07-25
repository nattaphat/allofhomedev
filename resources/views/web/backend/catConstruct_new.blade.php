@extends('layouts.main_backend')

@section('jshome')
    {!! $map['js'] !!}

    <style type="text/css">
        img#img_brand {
            max-width: 100px;
            max-height: 100px;
        }
    </style>

@stop

@section('jsbody')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CatConstructRequest', '#my-form'); !!}

    <script type="text/javascript">
        $(document).ready(function(){

            initial();

            <!-- Province Change -->
            $("#province").change(function(){
                var id = this.value;
                provinceOnChange(id);
            });

            <!-- Amphoe Change -->
            $("#amphoe").change(function(){
                var amphid = this.value;
                var province = $("#province");
                var provid = province.val();
                amphoeOnChange(provid, amphid);
            });

            <!-- Save Button -->
//            $('#btn_save').click(function(){
//                if($('#latitude').val() == "")
//                {
//                    alert("กรุณากำหนดที่ตั้งร้านค้าบนแผนที่");
//                    return false;
//                }
//            });

            $('#btnClearLat').click(function(){
                $('#latitude').val("");
            });

            $('#btnClearLong').click(function(){
                $('#longitude').val("");
            });

            $('#btnClearMapUrl').click(function(){
                $('#map_url').val("");
            });

            <!-- Brand -->
            $("#brand_id").select2(
            {
                ajax: {
                    url: "{{ url('get_shop') }}",
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
                placeholder: "ค้นหาร้านค้า",
                escapeMarkup: function (markup) { return markup; },
                templateSelection: function(repo)
                {
                    if(repo.text != null && repo.text != "")
                        return repo.text;
                    else{
                        debugger;
                        $('#telephone').val(repo.telephone);
                        $('#email').val(repo.email);
                        $('#facebook').val(repo.facebook);
                        $('#line').val(repo.line);

                        if(repo.path != null)
                        {
                            $('#img_brand').attr('src', repo.path);
                            $('#img_brand').attr('style', 'max-width: 75px; max-height: 75px;');
                        }
                        else
                        {
                            $('#img_brand').removeAttr('src');
                            $('#img_brand').attr('style', 'display:none;');
                        }

                        return repo.brand_name;
                    }
                },
                templateResult: function(repo)
                {
                    if (repo.loading) return repo.text;

                    return repo.brand_name;
                }
            });

            <!-- Tags -->
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
                placeholder: "ค้นหา Tags",
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

    <script type="text/javascript">

        function initial()
        {
            <!-- Dropzone -->
            Dropzone.autoDiscover = false;

            $('#sell_price').mask('000,000,000,000,000', {reverse: true});
        }

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

    </script>

    @for($i=2; $i<=2; $i++)
        <script type="text/javascript">

            <!-- Dropzone -->

            // Get the template HTML and remove it from the doument
            var previewNode{{ $i }} = document.querySelector("#template{{ $i }}");
            previewNode{{ $i }}.id = "";
            var previewTemplate{{ $i }} = previewNode{{ $i }}.parentNode.innerHTML;
            previewNode{{ $i }}.parentNode.removeChild(previewNode{{ $i }});
            var id{{ $i }} = 0;

            var myDropzone{{ $i }} = new Dropzone("#dZUpload{{ $i }}", {
                url: '{{ URL("post/upload") }}',
                maxFilesize: 3, //mb
                parallelUploads: 1,
                acceptedFiles: 'image/*',
                autoProcessQueue: true,
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('[name=_token]').val());
                },
                success: function (file, response) {
                    file.id = id{{ $i }}++;

                    var filename = file.name;
                    var filetype = file.type;
                    var filesize = file.size;
                    var filepath = response;

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('id', 'pics_filename_id_' + file.id);
                    input_hidden.setAttribute('name', 'pics_filename{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filename);
                    document.forms[0].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('id', 'pics_filetype_id_' + file.id);
                    input_hidden.setAttribute('name', 'pics_filetype{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filetype);
                    document.forms[0].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('id', 'pics_filesize_id_' + file.id);
                    input_hidden.setAttribute('name', 'pics_filesize{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filesize);
                    document.forms[0].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('id', 'pics_filepath_id_' + file.id);
                    input_hidden.setAttribute('name', 'pics_filepath{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filepath);
                    document.forms[0].appendChild(input_hidden);
                },
                error: function (file, response) {
                    this.removeFile(file);
                    alert(response);
                },
                previewTemplate: previewTemplate{{ $i }},
                previewsContainer: "#previews{{ $i }}"
            });

            myDropzone{{ $i }}.on("removedfile", function(file){
                var id = file.id;
                $('#pics_filename_id_'+id).remove();
                $('#pics_filetype_id_'+id).remove();
                $('#pics_filesize_id_'+id).remove();
                $('#pics_filepath_id_'+id).remove();
            });

        </script>
    @endfor

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">ร้านค้าทั้งหมด</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    เพิ่มร้านค้า
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_catConstruct_store'],
                            'id'=> 'my-form', 'data-ajax' => 'true',
                            'class' => 'form-horizontal']) !!}

                        <div class="tabbable">
                            <ul id="myTab" class="nav nav-tabs">
                                <li id="tabPreview" class="active"><a href="#tab1" data-toggle="tab">ข้อมูลเบื้องต้น</a></li>
                                <li id="tabReview"><a href="#tab2" data-toggle="tab">ผลงาน</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <!-- ข้อมูลเบื้องต้นร้านค้า -->
                                <div class="tab-pane fade in active" id="tab1">
                                    <div class="bs-callout bs-callout-success">
                                        ข้อมูลประกาศ
                                    </div>
                                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                                    <div class="form-group @if ($errors->has('title')) {{ "has-error" }} @endif">
                                        {!! Form::label('title', 'หัวข้อ', [
                                        'class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('title', null,
                                            ['class' => 'form-control']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('title') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group @if ($errors->has('subtitle')) {{ "has-error" }} @endif">
                                        {!! Form::label('subtitle', 'เนื้อหาย่อ', [
                                        'class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            {!! Form::textarea('subtitle', null,[
                                            'class' => 'form-control',
                                            'rows' => 3
                                            ]) !!}
                                            <p class="help-block">
                                                {{ $errors->first('subtitle') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">สำหรับหมวดหมู่</label>
                                        <div class="col-md-9">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="1">{{ \App\Models\AllFunction::getShopForType(1) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="2">{{ \App\Models\AllFunction::getShopForType(2) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="3">{{ \App\Models\AllFunction::getShopForType(3) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="4">{{ \App\Models\AllFunction::getShopForType(4) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="5">{{ \App\Models\AllFunction::getShopForType(5) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="6">{{ \App\Models\AllFunction::getShopForType(6) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="7">{{ \App\Models\AllFunction::getShopForType(7) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="8">{{ \App\Models\AllFunction::getShopForType(8) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="9">{{ \App\Models\AllFunction::getShopForType(9) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="10">{{ \App\Models\AllFunction::getShopForType(10) }}
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="for_cat[]" value="11">{{ \App\Models\AllFunction::getShopForType(11) }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success" style="margin-top: 50px;">
                                        ข้อมูลเบื้องต้นร้านค้า
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('brand_id', 'ชื่อร้านค้า', [
                                        'class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-6">
                                            <select class="form-control" id="brand_id" name="brand_id"></select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <div class="thumbnail" style="width: 85px; height: 85px;">
                                                <img id="img_brand" style="max-width: 75px; max-height: 75px;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group @if ($errors->has('telephone')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">เบอร์โทรติดต่อ</label>
                                        <div class="col-md-6">
                                            {!! Form::text('telephone', null,
                                            ['id'=>'telephone', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('telephone') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('email')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">อีเมล</label>
                                        <div class="col-md-6">
                                            {!! Form::text('email', null,
                                            ['id'=>'email', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('email') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Facebook</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="facebook" name="facebook"
                                                   placeholder="" value="{{Input::old('facebook')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('line')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">LINE</label>
                                        <div class="col-md-6">
                                            {!! Form::text('line', null,
                                            ['id'=>'line', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('line') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('website')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">เว็บไซต์</label>
                                        <div class="col-md-6">
                                            {!! Form::text('website', null,
                                            ['id'=>'website', 'class' => 'form-control']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('website') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top:20px;">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-8">ที่ตั้งร้านค้า:</div>
                                    </div>
                                    <div class="form-group @if ($errors->has('provid')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">จังหวัด</label>
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
                                        <label class="col-md-3 control-label">อำเภอ / เขต</label>
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
                                        <label class="col-md-3 control-label">ตำบล / แขวง</label>
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
                                        <label class="col-md-3 control-label">ถนน</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="add_street" name="add_street"
                                                   placeholder="" value="{{Input::old('add_street')}}">
                                            <p class="help-block">
                                                {{ $errors->first('add_street') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ชั้น</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="add_floor" name="add_floor"
                                                   placeholder="" value="{{Input::old('add_floor')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ตึก/อาคาร</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="add_building" name="add_building"
                                                   placeholder="" value="{{Input::old('add_building')}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">เลขที่</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="add_no" name="add_no"
                                                   placeholder="" value="{{Input::old('add_no')}}">
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 20px;">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-8">
                                            กำหนดตำแหน่งแผนที่:
                                            {!! $map['html'] !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude</label>
                                        <div class="col-md-6">
                                            <div class="row col-md-12">
                                                <div class="input-group">
                                                    {!! Form::text('latitude', null,
                                                    ['class' => 'form-control', 'id' => 'latitude',
                                                    'readonly', 'required']) !!}
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="btnClearLat"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude</label>
                                        <div class="col-md-6">
                                            <div class="row col-md-12">
                                                <div class="input-group">
                                                    {!! Form::text('longitude', null,
                                                    ['class' => 'form-control', 'id' => 'longitude',
                                                    'readonly', 'required']) !!}
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="btnClearLong"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ลิงค์แผนที่</label>
                                        <div class="col-md-6">
                                            <div class="row col-md-12">
                                                <div class="input-group">
                                                    {!! Form::text('map_url', null,
                                                    ['class' => 'form-control', 'id' => 'map_url',
                                                    'readonly', 'required']) !!}
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="btnClearMapUrl"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">วันเวลาเปิดบริการ</label>
                                        <div class="col-md-6">
                                            {!! Form::textarea('service_day_time', null,
                                            ['id'=>'service_day_time', 'class' => 'form-control', 'rows'=> 3]) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">บัตรเครดิต</label>
                                        <div class="col-md-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="credit_card[]" value="true"> มี
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="credit_card[]" value="false"> ไม่มี
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ที่จอดรถ</label>
                                        <div class="col-md-6">
                                            <label class="radio-inline">
                                                <input type="radio" name="parking[]" value="true"> มี
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="parking[]" value="false"> ไม่มี
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ราคาขายเริ่มต้น</label>
                                        <div class="col-md-3">
                                            {!! Form::text('sell_price', null,
                                            ['class' => 'form-control', 'id' => 'sell_price']) !!}
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">บาท</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">รายละเอียด</label>
                                        <div class="col-md-8">
                                            {!! Form::textarea('sell_price_detail', null,
                                            ['class' => 'form-control',
                                            'rows' => '3']) !!}
                                        </div>
                                    </div>

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
                                    {{--<div class="form-group @if ($errors->has('status')) {{ "has-error" }} @endif">--}}
                                        {{--<label  class="col-md-3 control-label text-right">แสดงผลหน้าเว็บไซต์</label>--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<label class="radio-inline">--}}
                                                {{--<input type="radio" name="status[]" id="status1"--}}
                                                       {{--value="1"> แสดงผล--}}
                                            {{--</label>--}}
                                            {{--<label class="radio-inline">--}}
                                                {{--<input type="radio" name="status[]" id="status2"--}}
                                                       {{--value="0" checked> ไม่แสดงผล--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div><!-- ข้อมูลเบื้องต้นร้านค้า -->
                                <!-- ผลงาน -->
                                <div class="tab-pane fade" id="tab2">
                                    <!-- Pic 3 -->
                                    <div class="bs-callout bs-callout-success">
                                        ผลงาน
                                    </div>
                                    {!! Form::dropzoneRegion(2) !!}
                                </div><!-- สภาพแวดล้อมร้านค้า -->
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