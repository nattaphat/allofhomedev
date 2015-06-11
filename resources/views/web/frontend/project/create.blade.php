@extends('layouts.blank')

@section('jshome')
    <script type="text/javascript"> var centreGot = true; </script>
    {!! $map['js'] !!}
@stop

@section('jsbody')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ProjectRequest', '#my-form'); !!}

    <script type="text/javascript">
        $(document).ready(function(){

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

            $('#area_1').mask('000,000,000,000,000', {reverse: true});
            $('#area_2').mask('000,000,000,000,000', {reverse: true});
            $('#area_3').mask('000,000,000,000,000', {reverse: true});

            $('#num_unit').mask('000,000,000,000,000', {reverse: true});
            $('#num_building').mask('000,000,000,000,000', {reverse: true});
            $('#num_parking').mask('000,000,000,000,000', {reverse: true});
            $('#percent_parking').mask('000,000,000,000,000', {reverse: true});
            $('#num_elev_person').mask('000,000,000,000,000', {reverse: true});
            $('#num_elev_object').mask('000,000,000,000,000', {reverse: true});

            <!-- Dropzone -->
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
                        $("#project_owner_logo").val(filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath);
                        file.previewElement.classList.add("dz-success");
                    },
                    error: function (file, response) {
                        this.removeFile(file);
                        alert(response);
                    }
                });
            }

            myDropzone.on("removedfile", function()
            {
                $("#project_owner_logo").val("");
            });

            <!-- Area Change -->
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

            <!-- Province Change -->
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

            <!-- Amphoe Change -->
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

            <!-- Postback -->
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

                    myDropzone.options.maxFiles = 1;
                }
            }

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

            $('#btn_save').click(function(){
                if($('#latitude').val() == "")
                {
                    alert("กรุณากำหนดที่ตั้งโครงการบนแผนที่");
                    return false;
                }
            });
        });
    </script>

    <!-- Pics -->
    <script type="text/javascript">

        // Get the template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone2 = new Dropzone("#dZUpload2", {
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
                input_hidden.setAttribute('name', 'pics_filename[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filename);
                document.forms[1].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'pics_filetype[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filetype);
                document.forms[1].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'pics_filesize[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filesize);
                document.forms[1].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'pics_filepath[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filepath);
                document.forms[1].appendChild(input_hidden);
            },
            error: function (file, response) {
                this.removeFile(file);
                alert(response);
            },
            previewTemplate: previewTemplate,
            previewsContainer: "#previews"
        });

    </script>

    @for($i=3; $i<=43; $i++)
        <script type="text/javascript">

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
                    document.forms[1].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('name', 'pics_filetype{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filetype);
                    document.forms[1].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('name', 'pics_filesize{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filesize);
                    document.forms[1].appendChild(input_hidden);

                    var input_hidden = document.createElement('input');
                    input_hidden.setAttribute('name', 'pics_filepath{{ $i }}[]');
                    input_hidden.setAttribute('type', 'hidden');
                    input_hidden.setAttribute('value', filepath);
                    document.forms[1].appendChild(input_hidden);
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="block features">
                            <h2 class="title-divider" >
                                <span style="color: #55a79a;">เพิ่มโครงการ</span>
                                <small>Admin Control</small>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-body" style="margin: 0px 5px 15px 15px;">

                                <div class="row">
                                    {!! Form::open(array('url'=>'project/create', 'method' => 'POST', 'files' => 'true',
                                    'id'=> 'my-form', 'data-ajax' => 'true', 'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data')) !!}

                                    <div class="row">
                                        <div class="col-md-12">
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
                                                        <div class="form-group @if ($errors->has('project_owner')) {{ "has-error" }} @endif">
                                                            {!! Form::label('project_owner', 'บริษัทเจ้าของโครงการ', [
                                                            'class' => 'col-md-3 control-label']) !!}
                                                            <div class="col-md-6">
                                                                {!! Form::text('project_owner', null,
                                                                ['class' => 'form-control']) !!}
                                                                <p class="help-block">
                                                                    {{ $errors->first('project_owner') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group @if ($errors->has('project_owner_logo')) {{ "has-error" }} @endif">
                                                            <div class="col-md-3 control-label">โลโก้บริษัทเจ้าของโครงการ</div>
                                                            <div class="col-md-3">
                                                                <div id="dZUpload" class="dropzone uploadify"></div>
                                                                <input type="hidden" id="project_owner_logo" name="project_owner_logo"
                                                                       value="{{ Input::old('project_owner_logo') }}">
                                                                <p class="help-block">
                                                                    {{ $errors->first('project_owner_logo') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group @if ($errors->has('telephone')) {{ "has-error" }} @endif">
                                                            <label class="col-md-3 control-label">เบอร์โทรติดต่อ</label>
                                                            <div class="col-md-6">
                                                                {!! Form::text('telephone', null,
                                                                ['class' => 'form-control']) !!}
                                                                <p class="help-block">
                                                                    {{ $errors->first('telephone') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group @if ($errors->has('email')) {{ "has-error" }} @endif">
                                                            <label class="col-md-3 control-label">อีเมล</label>
                                                            <div class="col-md-6">
                                                                {!! Form::text('email', null,
                                                                ['class' => 'form-control']) !!}
                                                                <p class="help-block">
                                                                    {{ $errors->first('email') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group @if ($errors->has('website')) {{ "has-error" }} @endif">
                                                            <label class="col-md-3 control-label">เว็บไซต์</label>
                                                            <div class="col-md-6">
                                                                {!! Form::text('website', null,
                                                                ['class' => 'form-control']) !!}
                                                                <p class="help-block">
                                                                    {{ $errors->first('website') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Facebook</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="facebook" name="facebook"
                                                                       placeholder="" value="{{Input::old('facebook')}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group @if ($errors->has('line')) {{ "has-error" }} @endif">
                                                            <label class="col-md-3 control-label">LINE</label>
                                                            <div class="col-md-6">
                                                                {!! Form::text('line', null,
                                                                ['class' => 'form-control']) !!}
                                                                <p class="help-block">
                                                                    {{ $errors->first('line') }}
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
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload2" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews" style="padding-top: 20px;">
                                                                    <div id="template" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
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
                                                        <div class="form-group @if ($errors->has('status')) {{ "has-error" }} @endif">
                                                            <label  class="col-md-3 control-label text-right">แสดงผลหน้าเว็บไซต์</label>
                                                            <div class="col-md-8">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="status[]" id="status1"
                                                                           value="1"> แสดงผล
                                                                </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="status[]" id="status2"
                                                                           value="0" checked> ไม่แสดงผล
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div><!-- ข้อมูลเบื้องต้นโครงการ -->
                                                    <!-- สภาพแวดล้อมโครงการ -->
                                                    <div class="tab-pane fade" id="tab2">
                                                        <!-- Pic 3 -->
                                                        <div class="bs-callout bs-callout-success">
                                                            สภาพแวดล้อมโครงการ
                                                        </div>
                                                        <p><strong>การเดินทางเข้าโครงการ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload3" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews3" style="padding-top: 20px;">
                                                                    <div id="template3" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description3[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 4 -->
                                                        <p><strong>ภาพรวมรอบโครงการ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload4" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews4" style="padding-top: 20px;">
                                                                    <div id="template4" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description4[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 5 -->
                                                        <p><strong>ตลาดสด</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload5" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews5" style="padding-top: 20px;">
                                                                    <div id="template5" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description5[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 6 -->
                                                        <p><strong>ห้างสรรพสินค้า</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload6" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews6" style="padding-top: 20px;">
                                                                    <div id="template6" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description6[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 7 -->
                                                        <p><strong>ถนนทางเช้าโครงการ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload7" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews7" style="padding-top: 20px;">
                                                                    <div id="template7" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description7[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 8 -->
                                                        <p><strong>ระยะทางจากทางด่วน</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload8" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews8" style="padding-top: 20px;">
                                                                    <div id="template8" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description8[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic9 -->
                                                        <p><strong>ระยะทางจาก BTS</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload9" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews9" style="padding-top: 20px;">
                                                                    <div id="template9" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description9[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic10 -->
                                                        <p><strong>ระยะทางจาก MRT</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload10" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews10" style="padding-top: 20px;">
                                                                    <div id="template10" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description10[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>
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
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload11" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews11" style="padding-top: 20px;">
                                                                    <div id="template11" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description11[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 12 -->
                                                        <p><strong>สวนสาธารณะ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload12" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews12" style="padding-top: 20px;">
                                                                    <div id="template12" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description12[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 13 -->
                                                        <p><strong>สระว่ายน้ำ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload13" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews13" style="padding-top: 20px;">
                                                                    <div id="template13" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description13[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 14 -->
                                                        <p><strong>ฟิตเนส</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload14" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews14" style="padding-top: 20px;">
                                                                    <div id="template14" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description14[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 15 -->
                                                        <p><strong>ซาวน่า</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload15" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews15" style="padding-top: 20px;">
                                                                    <div id="template15" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description15[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 16 -->
                                                        <p><strong>สตรีม</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload16" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews16" style="padding-top: 20px;">
                                                                    <div id="template16" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description16[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 17 -->
                                                        <p><strong>ลิฟต์</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload17" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews17" style="padding-top: 20px;">
                                                                    <div id="template17" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description17[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 18 -->
                                                        <p><strong>อื่นๆ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload18" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews18" style="padding-top: 20px;">
                                                                    <div id="template18" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description18[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>
                                                    </div><!-- รายละเอียดส่วนกลาง -->
                                                    <!-- ผังโครงการ -->
                                                    <div class="tab-pane fade" id="tab4">
                                                        <div class="bs-callout bs-callout-success">
                                                            ผังโครงการ
                                                        </div>
                                                        <!-- Pic 19 -->
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload19" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews19" style="padding-top: 20px;">
                                                                    <div id="template19" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description19[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>
                                                    </div><!-- ผังโครงการ -->
                                                    <!-- บรรยากาศบ้านตกแต่ง -->
                                                    <div class="tab-pane fade" id="tab5">
                                                        <div class="bs-callout bs-callout-success">
                                                            บรรยากาศบ้านตกแต่ง
                                                        </div>
                                                        <!-- Pic 20 -->
                                                        <p><strong>Plan บ้าน</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload20" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews20" style="padding-top: 20px;">
                                                                    <div id="template20" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description20[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 21 -->
                                                        <p><strong>หน้าบ้าน</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload21" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews21" style="padding-top: 20px;">
                                                                    <div id="template21" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description21[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 22 -->
                                                        <p><strong>ห้องนั่งเล่น</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload22" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews22" style="padding-top: 20px;">
                                                                    <div id="template22" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description22[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 23 -->
                                                        <p><strong>ห้องนอน 1</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload23" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews23" style="padding-top: 20px;">
                                                                    <div id="template23" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description23[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 24 -->
                                                        <p><strong>ห้องนอน 2</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload24" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews24" style="padding-top: 20px;">
                                                                    <div id="template24" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description24[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 25 -->
                                                        <p><strong>ห้องนอน 3</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload25" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews25" style="padding-top: 20px;">
                                                                    <div id="template25" class="file-row" style="margin-top: 20px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description25[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>



                                                        <!-- Pic 26 -->
                                                        <p><strong>ห้องนอน 4</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload26" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews26" style="padding-top: 30px;">
                                                                    <div id="template26" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description26[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 27 -->
                                                        <p><strong>ห้องอเนกประสงค์</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload27" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews27" style="padding-top: 30px;">
                                                                    <div id="template27" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description27[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 28 -->
                                                        <p><strong>ห้องครัว</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload28" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews28" style="padding-top: 30px;">
                                                                    <div id="template28" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description28[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 29 -->
                                                        <p><strong>ห้องน้ำ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload29" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews29" style="padding-top: 30px;">
                                                                    <div id="template29" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description29[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 30 -->
                                                        <p><strong>ห้องอื่นๆ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload30" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews30" style="padding-top: 30px;">
                                                                    <div id="template30" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description30[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 31 -->
                                                        <p><strong>รอบรั้วตัวบ้าน</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload31" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews31" style="padding-top: 30px;">
                                                                    <div id="template31" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description31[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 32 -->
                                                        <p><strong>Plan บ้าน</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload32" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews32" style="padding-top: 30px;">
                                                                    <div id="template32" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description32[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>
                                                    </div><!-- บรรยากาศบ้านตกแต่ง -->
                                                    <!-- เจาะลึกตัวบ้านส่งมอบ -->
                                                    <div class="tab-pane fade" id="tab6">
                                                        <div class="bs-callout bs-callout-success">
                                                            เจาะลึกตัวบ้านส่งมอบ
                                                        </div>

                                                        <!-- Pic 33 -->
                                                        <p><strong>หน้าบ้าน</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload33" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews33" style="padding-top: 30px;">
                                                                    <div id="template33" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description33[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 34 -->
                                                        <p><strong>ห้องนั่งเล่น</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload34" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews34" style="padding-top: 30px;">
                                                                    <div id="template34" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description34[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 35 -->
                                                        <p><strong>ห้องนอน 1</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload35" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews35" style="padding-top: 30px;">
                                                                    <div id="template35" class="file-row" style="margin-top: 30px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description35[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 36 -->
                                                        <p><strong>ห้องนอน 2</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload36" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews36" style="padding-top: 40px;">
                                                                    <div id="template36" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description36[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 37 -->
                                                        <p><strong>ห้องนอน 3</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload37" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews37" style="padding-top: 40px;">
                                                                    <div id="template37" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description37[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 38 -->
                                                        <p><strong>ห้องนอน 4</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload38" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews38" style="padding-top: 40px;">
                                                                    <div id="template38" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description38[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 39 -->
                                                        <p><strong>ห้องอเนกประสงค์</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload39" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews39" style="padding-top: 40px;">
                                                                    <div id="template39" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description39[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 40 -->
                                                        <p><strong>ห้องครัว</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload40" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews40" style="padding-top: 40px;">
                                                                    <div id="template40" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description40[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                        <!-- Pic 41 -->
                                                        <p><strong>ห้องน้ำ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload41" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews41" style="padding-top: 40px;">
                                                                    <div id="template41" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description41[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 42 -->
                                                        <p><strong>ห้องอื่นๆ</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload42" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews42" style="padding-top: 40px;">
                                                                    <div id="template42" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description42[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>


                                                        <!-- Pic 43 -->
                                                        <p><strong>รอบรั้วตัวบ้าน</strong></p>
                                                        <div class="form-group">
                                                            <label class="col-md-1 control-label text-right"></label>
                                                            <div class="col-md-10">
                                                                <div id="dZUpload43" class="dropzone uploadify"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="table table-striped" class="files" id="previews43" style="padding-top: 40px;">
                                                                    <div id="template43" class="file-row" style="margin-top: 40px;">
                                                                        <div class="row well active">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <img data-dz-thumbnail />
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <textarea name="pics_description43[]" rows="5" style="width: 100%;"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        &nbsp;&nbsp;&nbsp;
                                                                                        <a href="#" data-dz-remove>
                                                                                            <i class="glyphicon glyphicon-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                            <div class="progress-bar" style="width: 0%;" data-dz-uploadprogress></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>
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
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding: 20px 0px 20px 0;">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
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
            </div>
        </div>
    </div>

@stop