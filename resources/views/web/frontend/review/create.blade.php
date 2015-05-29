@extends('layouts.main')

@section('slider')
    @include('layouts._partials.topslide')
@stop

@section('jshome')

    <!-- elFinder -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('js/lib/elfinder/css/elfinder.min.css') }}>
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('js/lib/elfinder/css/theme.css') }}>

@stop

@section('jsbody')

    <!-- Tiny MCE -->
    <script src={{ asset('js/lib/tinymce/js/tinymce/tinymce.min.js') }}></script>
    <script src={{ asset('js/lib/tinymce/js/tinymce/themes/modern/theme.min.js') }}></script>

    <!-- elFinder -->
    <script type="text/javascript" src={{ asset('js/lib/elfinder/js/elfinder.min.js') }}></script>

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
                        $oldVal = $("#pics").val();
                        $("#pics").val($oldVal + filename + "@@@" + filetype + "@@@" + filesize + "@@@" + filepath + "###");
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
                placeholder: "ค้นหาโครงการ",
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
                if (repo.loading)
                    return repo.text;
                return "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + repo.text;
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
                                <div class="form-group">
                                    {!! Form::label('title', 'หัวข้อ *', [
                                    'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::text('title', null,['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('subtitle', 'เนื้อหาย่อ *', [
                                    'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::textarea('subtitle', null,[
                                        'class' => 'form-control',
                                        'rows' => 3
                                        ]) !!}
                                    </div>
                                </div>

                                <!-- รายละเอียดรีวิว -->
                                <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                                    รายละเอียดรีวิว
                                </div>

                                <div class="form-group" style="margin: 30px 20px 0px 30px;">
                                    <ul class="list-inline">
                                        <li><strong>ร้านค้า/โครงการ *</strong></li>
                                        <li style="width: 70%;">
                                            {!! Form::select('project_id', [], null, [
                                            'class' => 'form-control span3',
                                            'id' => 'project_id'
                                            ]) !!}
                                        </li>
                                    </ul>
                                </div>

                                <div class="form-group" style="margin: 30px 20px 0px 30px;">
                                    <strong>ให้คะแนน *</strong>

                                </div>

                                <div class="form-group" style="margin: 30px 20px 0px 30px;">
                                    <strong>เนื้อหา *</strong>
                                    {!! Form::textarea('other_detail', null,[
                                    'class' => 'form-control',
                                    'id' => 'other_detail',
                                    'style' => 'width: 100%'
                                    ]) !!}
                                </div>

                                <div class="form-group" style="margin: 30px 20px 0px 30px;">
                                    <strong>รูปภาพ *</strong>
                                    <div id="dZUpload1" name="dZUpload1" class="dropzone uploadify"></div>
                                    <input type="hidden" id="pics" name="pics"
                                           value="{{ Input::old('pics') }}">
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
                                    {!! Form::label('tags', 'Tags', [
                                    'class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-7">
                                        {!! Form::select('tags[]', [], null, [
                                            'class' => 'form-control',
                                            'multiple' => 'multiple',
                                            'id' => 'tags'
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="form-group" style="padding-top: 30px;">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        {!! Form::submit('บันทึก', [
                                            'class'=>'btn btn-primary',
                                            'onclick' => 'return alert("Under Construction!!"); return false;'
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