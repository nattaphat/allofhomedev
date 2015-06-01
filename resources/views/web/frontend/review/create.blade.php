@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')

    <!-- elFinder -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}>
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/theme.css') }}>

    <!-- Starrr -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('js/lib/starrr/starrr.min.css') }}>

@stop

@section('jsbody')

    <!-- Tiny MCE -->
    <script src={{ asset('js/lib/tinymce/js/tinymce/tinymce.min.js') }}></script>
    <script src={{ asset('js/lib/tinymce/js/tinymce/themes/modern/theme.min.js') }}></script>

    <!-- elFinder -->
    <script type="text/javascript" src={{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}></script>

    <!-- Starrr -->
    <script type="text/javascript" src={{ asset('js/lib/starrr/starrr.min.js') }}></script>

    <script type="text/javascript">
        $(document).ready(function(){

            <!-- Dropzone -->
            Dropzone.autoDiscover = false;
            var myDropzone1 = initDropzone1();

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
                        var oldVal = $("#pics").val();
                        $("#pics").val(oldVal + filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath + "###");
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

            function checkPostBack() {
                var pics = '{{ Input::old('pics') }}';

                if (pics != null && pics != '') {
                    var file_all = pics.split("###");
                    $.each(file_all, function (index, value) {
                        if (value != "") {
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
            }

            <!-- Tiny MCE -->
            tinymce.init({
                selector: "textarea#other_detail",
                theme: "modern",
                //width: 600,
                height: 500,
                file_browser_callback : elFinderBrowser,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                content_css: "css/content.css",
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });

            <!-- elFinder -->
            function elFinderBrowser (field_name, url, type, win) {
                tinymce.activeEditor.windowManager.open({
                    file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
                    title: 'AllOfHome\'s Files',
                    width: 900,
                    height: 450,
                    resizable: 'yes'
                }, {
                    setUrl: function (url) {
                        win.document.getElementById(field_name).value = url;
                    }
                });
                return false;
            }

            <!-- Select 2 Search Project -->
            $("#project_id").select2({
                ajax: {
                    url: "{{ url('project/get_shop_project') }}",
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
                placeholder: "ค้นหาโครงการ",
                escapeMarkup: function (markup) { return markup; },
                minimumInputLength: 1,
                templateResult: formatRepo,
                templateSelection: formatRepoSelection
            });

            // show result with customize format when search
            function formatRepo (repo) {
                if (repo.loading) return repo.text;
                var markup = repo.text;
                return markup;
            }

            // display in selection when selected
            function formatRepoSelection (repo) {
                if (repo.loading == true)
                    return repo.text;

                debugger;

                var old_project_id = '{{ Input::old('project_id') }}';
                var old_project_name = '{{ Input::old('project_name') }}';
                var old_type = '{{ Input::old('type') }}';

                // Postback
                if(repo.id == old_project_id && old_project_name != null && old_project_name != '')
                {
                    $('#project_name').val(old_project_name);
                    $('#type').val(old_type);

                    setVisible(old_type);

                    var v_1 = parseInt({{ Input::old('project_star_1') }});
                    var v_2 = parseInt({{ Input::old('project_star_2') }});
                    var v_3 = parseInt({{ Input::old('project_star_3') }});
                    var v_4 = parseInt({{ Input::old('project_star_4') }});
                    var v_5 = parseInt({{ Input::old('project_star_5') }});
                    var v_6 = parseInt({{ Input::old('project_star_6') }});
                    var v_7 = parseInt({{ Input::old('project_star_7') }});
                    var v_8 = parseInt({{ Input::old('project_star_8') }});
                    var v_9 = parseInt({{ Input::old('project_star_9') }});

                    var average = (
                            v_1  + v_2 + v_3 + v_4 + v_5 + v_6 + v_7 + v_8 + v_9
                            ) / 9.0;
                    var label_avg = $('#project_star_avg');
                    label_avg.html(parseFloat(average).toFixed(2));;
                    $('#project_avg').val(parseFloat(average).toFixed(2));

                    return old_project_name;
                }
                else
                {
                    //$('#project_id').val(repo.id);
                    $('#project_name').val(repo.text);

                    setVisible(repo.type);

                    return  repo.text;
                }
            }

            <!-- set Visible Star Ratting -->
            function setVisible(v_type)
            {
                var div_project = $('#div_project');
                var div_shop = $('#div_shop');
                var type = $('#type');

                if(v_type == "project")
                {
                    // display project rating
                    div_project.removeAttr("style");
                    div_shop.removeAttr("style");
                    div_shop.attr("style", "display:none;");
                    type.val(v_type);
                }
                else if(v_type != undefined && v_type != "")
                {
                    // display shop/brance rating
                    div_project.removeAttr("style");
                    div_project.attr("style", "display:none;");
                    div_shop.removeAttr("style");
                    type.val(v_type);
                }
                else
                {
                    div_project.removeAttr("style");
                    div_project.attr("style", "display:none;");
                    div_shop.removeAttr("style");
                    div_shop.attr("style", "display:none;");
                    type.val("");
                }
            }

            <!-- Select 2 Tags -->
            var tag_main_name = "";
            $("#tags").select2(
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

            <!-- Starrr Rating -->
            $('.starrr').on('starrr:change', function(e, value){
                if(value == undefined)
                    value = 0;

                switch (this.id)
                {
                    case "shop_1" :
                        $('#shop_avg').val(value);
                        break;
                    case "project_1" :
                        $('#project_star_1').val(value);
                        break;
                    case "project_2" :
                        $('#project_star_2').val(value);
                        break;
                    case "project_3" :
                        $('#project_star_3').val(value);
                        break;
                    case "project_4" :
                        $('#project_star_4').val(value);
                        break;
                    case "project_5" :
                        $('#project_star_5').val(value);
                        break;
                    case "project_6" :
                        $('#project_star_6').val(value);
                        break;
                    case "project_7" :
                        $('#project_star_7').val(value);
                        break;
                    case "project_8" :
                        $('#project_star_8').val(value);
                        break;
                    case "project_9" :
                        $('#project_star_9').val(value);
                        break;
                }

                if($("#type").val() == "project")
                {
                    var v_1 = parseInt($('#project_star_1').val());
                    var v_2 = parseInt($('#project_star_2').val());
                    var v_3 = parseInt($('#project_star_3').val());
                    var v_4 = parseInt($('#project_star_4').val());
                    var v_5 = parseInt($('#project_star_5').val());
                    var v_6 = parseInt($('#project_star_6').val());
                    var v_7 = parseInt($('#project_star_7').val());
                    var v_8 = parseInt($('#project_star_8').val());
                    var v_9 = parseInt($('#project_star_9').val());

                    var average = (
                        v_1  + v_2 + v_3 + v_4 + v_5 + v_6 + v_7 + v_8 + v_9
                    ) / 9.0;
                    var label_avg = $('#project_star_avg');
                    label_avg.html(parseFloat(average).toFixed(2));;
                    $('#project_avg').val(parseFloat(average).toFixed(2));
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
                <div class="panel panel-success" style="padding: 20px 0px 20px 20px;">
                    <div class="panel-body">
                        <div class="row">
                            <div>
                                <div class="block features">
                                    <h2 class="title-divider" >
                                        <span style="color: #55a79a;">เพิ่มรีวิว บ้าน/ทาวน์โฮม/คอนโด</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                {!! Form::open(array('url'=>'review/create', 'method' => 'POST',
                                'data-ajax' => 'true', 'class' => 'form-horizontal')) !!}

                                <!-- ข้อมูลทั่วไป -->
                                <div class="bs-callout bs-callout-success">
                                    ข้อมูลทั่วไป
                                </div>
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group @if ($errors->has('title')) {{ "has-error" }} @endif">
                                    {!! Form::label('title', 'หัวข้อ *', [
                                        'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::text('title', null,
                                            ['class' => 'form-control']) !!}
                                        <p class="help-block">
                                            {{ $errors->first('title') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('subtitle')) {{ "has-error" }} @endif">
                                    {!! Form::label('subtitle', 'เนื้อหาย่อ *', [
                                    'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::textarea('subtitle', null,[
                                            'class' => 'form-control',
                                            'rows' => 3
                                        ]) !!}
                                        <p class="help-block">
                                            {{ $errors->first('subtitle') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- รายละเอียดรีวิว -->
                                <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                                    รายละเอียดรีวิว
                                </div>

                                <div class="form-group @if ($errors->has('project_id')) {{ "has-error" }} @endif" style="margin: 30px 0px 0px 0px;">
                                    {!! Form::label('project_name', 'ร้านค้า/โครงการ *', [
                                        'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-9">
                                        {{--{!! Form::select('project_id', [], null, [--}}
                                            {{--'class' => 'form-control',--}}
                                            {{--'id' => 'project_id'--}}
                                        {{--]) !!}--}}
                                        <select class="form-control" id="project_id" name="project_id">
                                            @if(Input::old('project_id') != null)
                                                <option value="{{ Input::old('project_id') }}" selected>{{ App\Models\Project::getFullPrjAddress(Input::old('project_id')) }}</option>
                                            @endif
                                        </select>
                                        {!! Form::hidden('type', null, ['id' => 'type']) !!}
                                        {!! Form::hidden('project_name', null, ['id' => 'project_name']) !!}
                                        <p class="help-block">
                                            {{ $errors->first('project_id') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('project_id')) {{ "has-error" }} @endif"
                                     style="margin: 30px 20px 0px 30px; min-height: 30px;">
                                    <div class="col-md-2 control-label" style="text-align: left; padding-left: 0px;">
                                        <strong>ให้คะแนน *</strong>
                                    </div>
                                    <div class="col-md-10 help-block" style="padding-left: 0px;">
                                        {{ $errors->first('project_id') }}
                                    </div>
                                    <div class="col-md-12" id="div_shop">
                                        <!-- Shop -->
                                        <div class="col-md-2"></div>
                                        <div class="col-md-3" style="padding-top: 10px;">
                                            คะแนนความพึงพอใจ
                                        </div>
                                        <div class="col-md-7" style="padding-top: 10px;">
                                            <div class='starrr' id="shop_1" name="shop_1"
                                                 data-rating='{{ Input::old('shop_avg') }}'></div>
                                            {!! Form::hidden('shop_avg', 0, ['id' => 'shop_avg']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="div_project" style="display:none;">
                                        <!-- Project -->
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            ความพึงพอใจในเจ้าของโครงการ
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_1" name="project_1"
                                                 data-rating='{{ Input::old('project_star_1') }}'></div>
                                            {!! Form::hidden('project_star_1', 0, ['id' => 'project_star_1']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            ความพึงพอใจในรูปแบบบ้านด้านนอก
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_2" name="project_2"
                                                 data-rating='{{ Input::old('project_star_2') }}'></div>
                                            {!! Form::hidden('project_star_2', 0, ['id' => 'project_star_2']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            ความพึงพอใจในรูปแบบบ้านด้านใน
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_3" name="project_3"
                                                 data-rating='{{ Input::old('project_star_3') }}'></div>
                                            {!! Form::hidden('project_star_3', 0, ['id' => 'project_star_3']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            ความพึงพอใจในส่วนกลาง
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_4" name="project_4"
                                                 data-rating='{{ Input::old('project_star_4') }}'></div>
                                            {!! Form::hidden('project_star_4', 0, ['id' => 'project_star_4']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            ความพึงพอใจในข้อมูลเบื้องต้นโครงการ
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_5" name="project_5"
                                                 data-rating='{{ Input::old('project_star_5') }}'></div>
                                            {!! Form::hidden('project_star_5', 0, ['id' => 'project_star_5']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            สภาพแวดล้อมโครงการ
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_6" name="project_6"
                                                 data-rating='{{ Input::old('project_star_6') }}'></div>
                                            {!! Form::hidden('project_star_6', 0, ['id' => 'project_star_6']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            ความเหมาะสมของทำเลที่ตั้ง
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_7" name="project_7"
                                                 data-rating='{{ Input::old('project_star_7') }}'></div>
                                            {!! Form::hidden('project_star_7', 0, ['id' => 'project_star_7']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            ความเหมาะสมของราคา
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_8" name="project_8"
                                                 data-rating='{{ Input::old('project_star_8') }}'></div>
                                            {!! Form::hidden('project_star_8', 0, ['id' => 'project_star_8']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5" style="padding-top: 10px;">
                                            เงื่อนไขการจอง
                                        </div>
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <div class='starrr' id="project_9" name="project_9"
                                                 data-rating='{{ Input::old('project_star_9') }}'></div>
                                            {!! Form::hidden('project_star_9', 0, ['id' => 'project_star_9']) !!}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5 text-right" style="font-size: 20px;
                                            font-weight: 200;  padding-bottom: 5px; vertical-align: middle;">
                                            คะแนนเฉลี่ย <span style="font-size: 40px;"></span>
                                        </div>
                                        <div class="col-md-6" style="font-size: 20px;  font-weight: 200;
                                            padding-bottom: 5px;  vertical-align: middle;">
                                            {!! Form::label('project_star_avg', ' 0 ', [
                                                'id' => 'project_star_avg',
                                                'name' => 'project_star_avg',
                                                'style' => 'font-size: 40px;']) !!} / 5 &nbsp;&nbsp; ดาว
                                            {!! Form::hidden('project_avg',0, ['id' => 'project_avg']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group @if ($errors->has('other_detail')) {{ "has-error" }} @endif" style="margin: 30px 20px 0px 30px;">
                                    <strong class="control-label">เนื้อหา *</strong>
                                    {!! Form::textarea('other_detail', null,[
                                        'class' => 'form-control',
                                        'id' => 'other_detail',
                                        'style' => 'width: 100%'
                                    ]) !!}
                                    <p class="help-block">
                                        {{ $errors->first('other_detail') }}
                                    </p>
                                </div>
                                <div class="form-group @if ($errors->has('pics')) {{ "has-error" }} @endif" style="margin: 30px 20px 0px 30px;">
                                    <strong class="control-label">รูปภาพ *</strong>
                                    <div id="dZUpload1" name="dZUpload1" class="dropzone uploadify"></div>
                                    <input type="hidden" id="pics" name="pics"
                                           value="{{ Input::old('pics') }}">
                                    <p class="help-block">
                                        {{ $errors->first('pics') }}
                                    </p>
                                </div>
                                <!-- รายละเอียดอื่นๆ -->
                                <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                                    รายละเอียดอื่นๆ
                                </div>
                                <div class="form-group">
                                    {!! Form::label('video_url', 'วิดีโอ Youtube', [
                                    'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-7">
                                        {!! Form::text('video_url', null,['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="col-md-2 control-label">Tags</label>
                                    <div class="col-md-7">
                                        <select class="form-control" multiple="multiple" id="tags" name="tags[]">
                                            @if(Input::old('tags') != null)
                                                @foreach(Input::old('tags') as $key=>$value)
                                                    <option value="{{ $value }}" selected>{{ App\Models\TagSub::getTagSubName($value) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" style="padding-top: 30px;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        {!! Form::submit('บันทึก', [
                                            'class'=>'btn btn-primary',
                                            'onclickss' => 'alert("Under Construction!!"); return false;'
                                        ]) !!}
                                        {!! link_to(URL::route('condo_index'), 'ยกเลิก', ['class' => 'btn btn-default']) !!}
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