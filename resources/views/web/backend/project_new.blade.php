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
    {!! JsValidator::formRequest('App\Http\Requests\ProjectRequest', '#my-form'); !!}

    <script type="text/javascript">
        $(document).ready(function(){

            initial();

            <!-- Area Change -->
            $("#area").change(function(){
                var id = this.value;
                areaOnChange(id);
            });

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
            $('#btn_save').click(function(){
                if($('#latitude').val() == "")
                {
                    alert("กรุณากำหนดที่ตั้งโครงการบนแผนที่");
                    return false;
                }
            });

            <!-- Brand -->
            $("#brand_id").select2(
            {
                ajax: {
                    url: "{{ url('get_brand') }}",
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
                placeholder: "ค้นหาแบรนด์",
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

            $("#construct_date").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy'
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

            $("#finish_date").datepicker({
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

            $('#area_1').mask('000,000,000,000,000.00', {reverse: true});
            $('#area_2').mask('000,000,000,000,000.00', {reverse: true});
            $('#area_3').mask('000,000,000,000,000.00', {reverse: true});

            $('#num_unit').mask('000,000,000,000,000', {reverse: true});
            $('#num_building').mask('000,000,000,000,000', {reverse: true});
            $('#num_parking').mask('000,000,000,000,000', {reverse: true});
            $('#percent_parking').mask('000,000,000,000,000.00', {reverse: true});
            $('#num_elev_person').mask('000,000,000,000,000', {reverse: true});
            $('#num_elev_object').mask('000,000,000,000,000', {reverse: true});
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

    @for($i=2; $i<=43; $i++)
        <script type="text/javascript">

            <!-- Dropzone -->

            // Get the template HTML and remove it from the doument
            var previewNode = document.querySelector("#template{{ $i }}");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            var myDropzone2 = new Dropzone("#dZUpload{{ $i }}", {
                url: '{{ URL("post/upload") }}',
                maxFilesize: 3, //mb
                parallelUploads: 1,
                acceptedFiles: 'image/*',
                autoProcessQueue: true,
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('[name=_token]').val());
                },
                success: function (file, response) {
                    var filename = file.name;
                    var filetype = file.type;
                    var filesize = file.size;
                    var filepath = response;

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('name', 'pics_filename{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filename);
                    document.forms[0].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('name', 'pics_filetype{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filetype);
                    document.forms[0].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('name', 'pics_filesize{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filesize);
                    document.forms[0].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('name', 'pics_filepath{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filepath);
                    document.forms[0].appendChild(input_hidden);
                },
                error: function (file, response) {
                    this.removeFile(file);
                    alert(response);
                },
                previewTemplate: previewTemplate,
                previewsContainer: "#previews{{ $i }}"
            });

        </script>
    @endfor

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">โครงการทั้งหมด</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    เพิ่มโครงการ
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_project_store'],
                            'id'=> 'my-form', 'data-ajax' => 'true',
                            'class' => 'form-horizontal']) !!}

                        <div class="tabbable">
                            <ul id="myTab" class="nav nav-tabs">
                                <li id="tabPreview" class="active"><a href="#tab1" data-toggle="tab">ข้อมูลเบื้องต้น</a></li>
                                <li id="tabReview"><a href="#tab2" data-toggle="tab">สภาพแวดล้อม</a></li>
                                <li id="tabReview"><a href="#tab3" data-toggle="tab">ส่วนกลาง</a></li>
                                <li id="tabReview"><a href="#tab4" data-toggle="tab">ผังโครงการ</a></li>
                                <li id="tabReview"><a href="#tab5" data-toggle="tab">บ้านตกแต่ง</a></li>
                                <li id="tabReview"><a href="#tab6" data-toggle="tab">บ้านส่งมอบ</a></li>
                                <li id="tabReview"><a href="#tab7" data-toggle="tab">อื่นๆ</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <!-- ข้อมูลเบื้องต้นโครงการ -->
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
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="for_cat[]" value="1">บ้าน &nbsp;
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="for_cat[]" value="2">ทาวน์โฮม &nbsp;
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="for_cat[]" value="3">คอนโด &nbsp;
                                            </label>
                                        </div>
                                    </div>
                                    <div class="bs-callout bs-callout-success" style="margin-top: 50px;">
                                        ข้อมูลเบื้องต้นโครงการ
                                    </div>
                                    <div class="form-group @if ($errors->has('project_name')) {{ "has-error" }} @endif">
                                        {!! Form::label('project_name', 'ชื่อโครงการ', [
                                        'class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-6">
                                            {!! Form::text('project_name', null,
                                            ['class' => 'form-control']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('project_name') }}
                                            </p>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        {!! Form::label('brand_id', 'บริษัทเจ้าของโครงการ', [
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
                                        <div class="col-md-8">ที่ตั้งโครงการ:</div>
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
                                            {!! Form::text('latitude', null,
                                            ['class' => 'form-control', 'id' => 'latitude',
                                            'readonly', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude</label>
                                        <div class="col-md-6">
                                            {!! Form::text('longitude', null,
                                            ['class' => 'form-control', 'id' => 'longitude',
                                            'readonly', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ลิงค์แผนที่</label>
                                        <div class="col-md-6">
                                            {!! Form::text('map_url', null,
                                            ['class' => 'form-control', 'id' => 'map_url',
                                            'readonly', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('area_id')) {{ "has-error" }} @endif" style="padding-top:30px;">
                                        <label class="col-md-3 control-label">ทำเล / ย่าน หลัก</label>
                                        <div class="col-md-6">
                                            {!! Form::select('area_id', [null=>'-- กรุณาเลือก --']
                                            + $area->lists('area_name', 'id'), Input::old('area_id'),
                                            ['id' => 'area', 'style' => 'width: 100%']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('area_id') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('subarea_id')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">ทำเล / ย่าน ย่อย</label>
                                        <div class="col-md-6">
                                            {!! Form::select('subarea_id', [null=>'-- กรุณาเลือก --']
                                            + $subarea->lists('subarea_name', 'id'), Input::old('subarea_id'),
                                            ['id' => 'subarea', 'style' => 'width: 100%;']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('subarea_id') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('area_1') || $errors->has('area_2')
                                                        || $errors->has('area_3')) {{ "has-error" }} @endif" style="padding-top:30px;">
                                        <label class="col-md-3 control-label">ขนาดที่ดินโครงการ</label>
                                        <div class="col-md-2">
                                            {!! Form::text('area_1', null,
                                            ['class' => 'form-control', 'id' => 'area_1']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('area_1') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">ไร่</label>
                                        <div class="col-md-2">
                                            {!! Form::text('area_2', null,
                                            ['class' => 'form-control', 'id' => 'area_2']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('area_2') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label"style="text-align:left;">งาน</label>
                                        <div class="col-md-2">
                                            {!! Form::text('area_3', null,
                                            ['class' => 'form-control', 'id' => 'area_3']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('area_3') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">วา</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('num_building')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">จำนวนอาคาร</label>
                                        <div class="col-md-3">
                                            {!! Form::text('num_building', null,
                                            ['class' => 'form-control', 'id' => 'num_building']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('num_building') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">อาคาร</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('num_unit')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">จำนวนยูนิต</label>
                                        <div class="col-md-3">
                                            {!! Form::text('num_unit', null,
                                            ['class' => 'form-control', 'id' => 'num_unit']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('num_unit') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">ยูนิต</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('num_elev_person')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">จำนวนลิฟต์โดยสาร</label>
                                        <div class="col-md-3">
                                            {!! Form::text('num_elev_person', null,
                                            ['class' => 'form-control', 'id' => 'num_elev_person']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('num_elev_person') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">ตัว</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('num_elev_object')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">จำนวนลิฟต์ขนส่ง</label>
                                        <div class="col-md-3">
                                            {!! Form::text('num_elev_object', null,
                                            ['class' => 'form-control', 'id' => 'num_elev_object']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('num_elev_object') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">ตัว</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('ratio_elev')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">อัตราส่วนลิฟต์โดยสาร : ยูนิต</label>
                                        <div class="col-md-6">
                                            {!! Form::text('ratio_elev', null,
                                            ['class' => 'form-control']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('ratio_elev') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('num_parking')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">จำนวนที่จอดรถ</label>
                                        <div class="col-md-3">
                                            {!! Form::text('num_parking', null,
                                            ['class' => 'form-control', 'id' => 'num_parking']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('num_parking') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">คัน</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('percent_parking')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">จำนวนที่จอดรถ</label>
                                        <div class="col-md-3">
                                            {!! Form::text('percent_parking', null,
                                            ['class' => 'form-control', 'id' => 'percent_parking']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('percent_parking') }}
                                            </p>
                                        </div>
                                        <label class="col-md-2 control-label" style="text-align:left;">เปอร์เซ็น</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('home_type_per_area')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">รูปแบบบ้าน / ที่ดินเริ่มต้น</label>
                                        <div class="col-md-8">
                                            {!! Form::textarea('home_type_per_area', null,
                                            ['class' => 'form-control',
                                            'rows' => '3']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('home_type_per_area') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('home_area')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">พื้นที่ใช้สอยภายในบ้าน</label>
                                        <div class="col-md-8">
                                            {!! Form::textarea('home_area', null,
                                            ['class' => 'form-control',
                                            'rows' => '3']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('home_area') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('eia')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">โครงการผ่าน EIA</label>
                                        <div class="col-md-3">
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
                                            <p class="help-block">
                                                {{ $errors->first('eia') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('sell_price')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">ราคาขายเริ่มต้น</label>
                                        <div class="col-md-3">
                                            {!! Form::text('sell_price', null,
                                            ['class' => 'form-control', 'id' => 'sell_price']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('sell_price') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">บาท</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('sell_price_from') || $errors->has('sell_price_to')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">ช่วงราคาขาย</label>
                                        <div class="col-md-3">
                                            {!! Form::text('sell_price_from', null,
                                            ['class' => 'form-control', 'id' => 'sell_price_from']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('sell_price_from') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:center;">ถึง</label>
                                        <div class="col-md-3">
                                            {!! Form::text('sell_price_to', null,
                                            ['class' => 'form-control', 'id' => 'sell_price_to']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('sell_price_to') }}
                                            </p>
                                        </div>
                                        <label class="col-md-1 control-label" style="text-align:left;">บาท</label>
                                    </div>
                                    <div class="form-group @if ($errors->has('sell_price_detail')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">รายละเอียดราคาขาย</label>
                                        <div class="col-md-8">
                                            {!! Form::textarea('sell_price_detail', null,
                                            ['class' => 'form-control',
                                            'rows' => '3']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('sell_price_detail') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('home_material')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">การก่อสร้างตัวบ้าน</label>
                                        <div class="col-md-8">
                                            {!! Form::textarea('home_material', null,
                                            ['class' => 'form-control',
                                            'rows' => '3']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('home_material') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('home_style')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">สไตล์การออกแบบ</label>
                                        <div class="col-md-8">
                                            {!! Form::textarea('home_style', null,
                                            ['class' => 'form-control',
                                            'rows' => '3']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('home_style') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('construct_date')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">เริ่มก่อสร้าง</label>
                                        <div class="col-md-3">
                                            {!! Form::text('construct_date', null,
                                            ['class' => 'form-control', 'id' => 'construct_date']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('construct_date') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group @if ($errors->has('finish_date')) {{ "has-error" }} @endif">
                                        <label class="col-md-3 control-label">คาดว่าแล้วเสร็จ</label>
                                        <div class="col-md-3">
                                            {!! Form::text('finish_date', null,
                                            ['class' => 'form-control', 'id' => 'finish_date']) !!}
                                            <p class="help-block">
                                                {{ $errors->first('finish_date') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bs-callout bs-callout-success" style="margin-top: 40px;">
                                        รูปภาพ
                                    </div>
                                    {!! Form::dropzoneRegion(2) !!}

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
                                    <div class="form-group">
                                        <label  class="col-md-3 control-label text-right">สถานะ Review</label>
                                        <div class="col-md-8">
                                            <div class="radio">
                                                <label class="radio-inline">
                                                    <input type="radio" name="review_status[]" value="1"> รีวิวเรียบร้อยแล้ว
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="review_status[]" value="0" checked> รอรีวิว
                                                </label>
                                            </div>
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
                                </div><!-- ข้อมูลเบื้องต้นโครงการ -->
                                <!-- สภาพแวดล้อมโครงการ -->
                                <div class="tab-pane fade" id="tab2">
                                    <!-- Pic 3 -->
                                    <div class="bs-callout bs-callout-success">
                                        สภาพแวดล้อมโครงการ
                                    </div>
                                    <p><strong>การเดินทางเข้าโครงการ</strong></p>
                                    {!! Form::dropzoneRegion(3) !!}

                                    <!-- Pic 4 -->
                                    <p><strong>ภาพรวมรอบโครงการ</strong></p>
                                    {!! Form::dropzoneRegion(4) !!}

                                    <!-- Pic 5 -->
                                    <p><strong>ตลาดสด</strong></p>
                                    {!! Form::dropzoneRegion(5) !!}

                                    <!-- Pic 6 -->
                                    <p><strong>ห้างสรรพสินค้า</strong></p>
                                    {!! Form::dropzoneRegion(6) !!}

                                    <!-- Pic 7 -->
                                    <p><strong>ถนนทางเช้าโครงการ</strong></p>
                                    {!! Form::dropzoneRegion(7) !!}

                                    <!-- Pic 8 -->
                                    <p><strong>ระยะทางจากทางด่วน</strong></p>
                                    {!! Form::dropzoneRegion(8) !!}

                                    <!-- Pic9 -->
                                    <p><strong>ระยะทางจาก BTS</strong></p>
                                    {!! Form::dropzoneRegion(9) !!}

                                    <!-- Pic10 -->
                                    <p><strong>ระยะทางจาก MRT</strong></p>
                                    {!! Form::dropzoneRegion(10) !!}

                                </div><!-- สภาพแวดล้อมโครงการ -->
                                <!-- รายละเอียดส่วนกลาง -->
                                <div class="tab-pane fade" id="tab3">
                                    <div class="bs-callout bs-callout-success">
                                        รายละเอียดส่วนกลาง
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">กองทุนสำรอง</label>
                                        <div class="col-md-6">
                                            {!! Form::text('spare_price', null,
                                            ['class' => 'form-control', 'id' => 'spare_price']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ค่าส่วนกลาง</label>
                                        <div class="col-md-6">
                                            {!! Form::text('central_price', null,
                                            ['class' => 'form-control', 'id' => 'central_price']) !!}
                                        </div>
                                    </div>

                                    <!-- Pic 11 -->
                                    <p><strong>ทางเข้าโครงการ</strong></p>
                                    {!! Form::dropzoneRegion(11) !!}

                                    <!-- Pic 12 -->
                                    <p><strong>สวนสาธารณะ</strong></p>
                                    {!! Form::dropzoneRegion(12) !!}

                                    <!-- Pic 13 -->
                                    <p><strong>สระว่ายน้ำ</strong></p>
                                    {!! Form::dropzoneRegion(13) !!}

                                    <!-- Pic 14 -->
                                    <p><strong>ฟิตเนส</strong></p>
                                    {!! Form::dropzoneRegion(14) !!}

                                    <!-- Pic 15 -->
                                    <p><strong>ซาวน่า</strong></p>
                                    {!! Form::dropzoneRegion(15) !!}

                                    <!-- Pic 16 -->
                                    <p><strong>สตรีม</strong></p>
                                    {!! Form::dropzoneRegion(16) !!}

                                    <!-- Pic 17 -->
                                    <p><strong>ลิฟต์</strong></p>
                                    {!! Form::dropzoneRegion(17) !!}

                                    <!-- Pic 18 -->
                                    <p><strong>อื่นๆ</strong></p>
                                    {!! Form::dropzoneRegion(18) !!}
                                </div><!-- รายละเอียดส่วนกลาง -->

                                <!-- ผังโครงการ -->
                                <div class="tab-pane fade" id="tab4">
                                    <div class="bs-callout bs-callout-success">
                                        ผังโครงการ
                                    </div>
                                    <!-- Pic 19 -->
                                    {!! Form::dropzoneRegion(19) !!}
                                </div><!-- ผังโครงการ -->

                                <!-- บรรยากาศบ้านตกแต่ง -->
                                <div class="tab-pane fade" id="tab5">
                                    <div class="bs-callout bs-callout-success">
                                        บรรยากาศบ้านตกแต่ง
                                    </div>
                                    <!-- Pic 20 -->
                                    <p><strong>Plan บ้าน</strong></p>
                                    {!! Form::dropzoneRegion(20) !!}

                                    <!-- Pic 21 -->
                                    <p><strong>หน้าบ้าน</strong></p>
                                    {!! Form::dropzoneRegion(21) !!}

                                    <!-- Pic 22 -->
                                    <p><strong>ห้องนั่งเล่น</strong></p>
                                    {!! Form::dropzoneRegion(22) !!}

                                    <!-- Pic 23 -->
                                    <p><strong>ห้องนอน 1</strong></p>
                                    {!! Form::dropzoneRegion(23) !!}

                                    <!-- Pic 24 -->
                                    <p><strong>ห้องนอน 2</strong></p>
                                    {!! Form::dropzoneRegion(24) !!}

                                    <!-- Pic 25 -->
                                    <p><strong>ห้องนอน 3</strong></p>
                                    {!! Form::dropzoneRegion(25) !!}

                                    <!-- Pic 26 -->
                                    <p><strong>ห้องนอน 4</strong></p>
                                    {!! Form::dropzoneRegion(26) !!}

                                    <!-- Pic 27 -->
                                    <p><strong>ห้องอเนกประสงค์</strong></p>
                                    {!! Form::dropzoneRegion(27) !!}

                                    <!-- Pic 28 -->
                                    <p><strong>ห้องครัว</strong></p>
                                    {!! Form::dropzoneRegion(28) !!}

                                    <!-- Pic 29 -->
                                    <p><strong>ห้องน้ำ</strong></p>
                                    {!! Form::dropzoneRegion(29) !!}

                                    <!-- Pic 30 -->
                                    <p><strong>ห้องอื่นๆ</strong></p>
                                    {!! Form::dropzoneRegion(30) !!}

                                    <!-- Pic 31 -->
                                    <p><strong>รอบรั้วตัวบ้าน</strong></p>
                                    {!! Form::dropzoneRegion(31) !!}

                                    <!-- Pic 32 -->
                                    <p><strong>Plan บ้าน</strong></p>
                                    {!! Form::dropzoneRegion(32) !!}

                                </div><!-- บรรยากาศบ้านตกแต่ง -->
                                <!-- เจาะลึกตัวบ้านส่งมอบ -->
                                <div class="tab-pane fade" id="tab6">
                                    <div class="bs-callout bs-callout-success">
                                        เจาะลึกตัวบ้านส่งมอบ
                                    </div>

                                    <!-- Pic 33 -->
                                    <p><strong>หน้าบ้าน</strong></p>
                                    {!! Form::dropzoneRegion(33) !!}

                                    <!-- Pic 34 -->
                                    <p><strong>ห้องนั่งเล่น</strong></p>
                                    {!! Form::dropzoneRegion(34) !!}

                                    <!-- Pic 35 -->
                                    <p><strong>ห้องนอน 1</strong></p>
                                    {!! Form::dropzoneRegion(35) !!}

                                    <!-- Pic 36 -->
                                    <p><strong>ห้องนอน 2</strong></p>
                                    {!! Form::dropzoneRegion(36) !!}

                                    <!-- Pic 37 -->
                                    <p><strong>ห้องนอน 3</strong></p>
                                    {!! Form::dropzoneRegion(37) !!}

                                    <!-- Pic 38 -->
                                    <p><strong>ห้องนอน 4</strong></p>
                                    {!! Form::dropzoneRegion(38) !!}

                                    <!-- Pic 39 -->
                                    <p><strong>ห้องอเนกประสงค์</strong></p>
                                    {!! Form::dropzoneRegion(39) !!}

                                    <!-- Pic 40 -->
                                    <p><strong>ห้องครัว</strong></p>
                                    {!! Form::dropzoneRegion(40) !!}

                                    <!-- Pic 41 -->
                                    <p><strong>ห้องน้ำ</strong></p>
                                    {!! Form::dropzoneRegion(41) !!}

                                    <!-- Pic 42 -->
                                    <p><strong>ห้องอื่นๆ</strong></p>
                                    {!! Form::dropzoneRegion(42) !!}

                                    <!-- Pic 43 -->
                                    <p><strong>รอบรั้วตัวบ้าน</strong></p>
                                    {!! Form::dropzoneRegion(43) !!}

                                </div><!-- เจาะลึกตัวบ้านส่งมอบ -->
                                <!-- รายละเอียดอื่นๆ -->
                                <div class="tab-pane fade" id="tab7">
                                    <div class="bs-callout bs-callout-success">
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
                                </div><!-- รายละเอียดอื่นๆ -->
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