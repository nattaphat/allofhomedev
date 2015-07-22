@extends('layouts.main_backend')

@section('jshome')
    <!-- elFinder -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}>
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/theme.css') }}>

    <style type="text/css">
        img{
            max-width: 100px;
            max-height: 100px;
        }
    </style>
@stop

@section('jsbody')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ArticleRequest', '#my-form'); !!}

    <!-- Tiny MCE -->
    <script src={{ asset('js/lib/tinymce/js/tinymce/tinymce.min.js') }}></script>
    <script src={{ asset('js/lib/tinymce/js/tinymce/themes/modern/theme.min.js') }}></script>

    <!-- elFinder -->
    <script type="text/javascript" src={{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}></script>

    <!-- Starrr -->
    <script type="text/javascript" src={{ asset('js/lib/starrr/starrr.min.js') }}></script>

    <script type="text/javascript">
        $(document).ready(function(){

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

            <!-- Cat Home -->
            $("#cat_home_id").select2(
                    {
                        ajax: {
                            url: "{{ url('get_cat_home') }}",
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
                        escapeMarkup: function (markup) { return markup; }
                    });

            <!-- Tags -->
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

    <!-- Pics -->
    <script type="text/javascript">

        <!-- Dropzone -->
        Dropzone.autoDiscover = false;

        // Get the template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);
        var id = 0;

        var myDropzone = new Dropzone("#dZUpload", {
            url: '{{ URL("post/upload") }}',
            maxFilesize: 3, //mb
            parallelUploads: 1,
            acceptedFiles: 'image/*',
            autoProcessQueue: true,
            //dictDefaultMessage: "Drop file size 622 x 389 pixel",
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
            },
            success: function (file, response) {
                file.id = id++;

                var filename = file.name;
                var filetype = file.type;
                var filesize = file.size;
                var filepath = response;

                debugger;

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filename_id_' + file.id);
                input_hidden.setAttribute('name', 'pics_filename[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filename);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filetype_id_' + file.id);
                input_hidden.setAttribute('name', 'pics_filetype[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filetype);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filesize_id_' + file.id);
                input_hidden.setAttribute('name', 'pics_filesize[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filesize);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filepath_id_' + file.id);
                input_hidden.setAttribute('name', 'pics_filepath[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filepath);
                document.forms[0].appendChild(input_hidden);
            },
            error: function (file, response) {
                this.removeFile(file);
                alert(response);
            },
            previewTemplate: previewTemplate,
            previewsContainer: "#previews",
            init : function()
            {
                @if($pic != null)
                @foreach($pic as $p)
                var mockFile = { name: '{{ $p->file_name }}', size: '{{ $p->file_size }}', accepted: true,
                    id: id++, description: '{{ str_replace("\r\n", '##@@##', $p->description) }}' };

                this.emit("addedfile", mockFile);
                this.emit("thumbnail", mockFile, '{{ $p->file_path }}');
                this.emit("complete", mockFile);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filename_id_' + mockFile.id);
                input_hidden.setAttribute('name', 'pics_filename[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', '{{ $p->file_name }}');
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filetype_id_' + mockFile.id);
                input_hidden.setAttribute('name', 'pics_filetype[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', '{{ $p->file_type }}');
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filesize_id_' + mockFile.id);
                input_hidden.setAttribute('name', 'pics_filesize[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', '{{ $p->file_size }}');
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('id', 'pics_filepath_id_' + mockFile.id);
                input_hidden.setAttribute('name', 'pics_filepath[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', '{{ $p->file_path }}');
                document.forms[0].appendChild(input_hidden);
                @endforeach
            @endif
        },
            complete: function(file) {
                if (file.description != null) {
                    if (file.previewElement) {

                        var str= file.description;
                        var regex = new RegExp('##@@##', 'g');
                        str = str.replace(regex, '\r\n');

                        var textbox = file.previewElement.children[0].children[0].children[0].children[1].children[0];
                        textbox.value = str;
                    }
                }
            }
        });

        myDropzone.on("removedfile", function(file){
            var id = file.id;
            $('#pics_filename_id_'+id).remove();
            $('#pics_filetype_id_'+id).remove();
            $('#pics_filesize_id_'+id).remove();
            $('#pics_filepath_id_'+id).remove();
        });

    </script>

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">ไอเดีย</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    เพิ่มไอเดีย
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_idea_update'],
                        'id'=> 'my-form', 'data-ajax' => 'true',
                        'class' => 'form-horizontal']) !!}

                        {!! Form::hidden('id', $cat->id) !!}
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group" style="padding-top: 30px;">
                            {!! Form::label('title', 'หัวข้อ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('title', $cat->title, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('subtitle', 'เนื้อหาย่อ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::textarea('subtitle', $cat->subtitle,['class' => 'form-control','rows' => 3]) !!}
                            </div>
                        </div>

                        <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                            เนื้อหา
                        </div>

                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                {!! Form::textarea('other_detail', str_replace("../files/", asset("files")."/", $cat->other_detail),
                                [
                                'class' => 'form-control',
                                'id' => 'other_detail',
                                'style' => 'width: 100%'
                                ]) !!}
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                            รูปภาพ
                        </div>

                        {!! Form::dropzoneRegion("") !!}

                        <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                            รายละเอียดอื่นๆ
                        </div>

                        <div class="form-group">
                            {!! Form::label('video_url', 'วิดีโอ Youtube', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('video_url', $cat->video_url,['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <select class="form-control" multiple="multiple" id="tags" name="tags[]">
                                    @if($tag != null)
                                        @foreach($tag as $key=>$value)
                                            <option value="{{ $value->tag_sub_id }}" selected>{{ App\Models\TagSub::getTagSubName($value->tag_sub_id) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('suggest', 'บทความแนะนำ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                <label class="checkbox-inline">
                                    @if ($cat->suggest != null && $cat->suggest == true)
                                        {!! Form::checkbox('suggest', 'true', ['checked' => 'checked']) !!} &nbsp; ตั้งค่าเป็นบทความแนะนำ
                                    @else
                                        {!! Form::checkbox('suggest', 'true') !!} &nbsp; ตั้งค่าเป็นบทความแนะนำ
                                    @endif
                                </label>
                            </div>
                        </div>

                        {{--@if(\Auth::getUser()->role == '1')--}}
                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('visible[]', 'สถานะ', ['class' => 'col-md-2 control-label']) !!}--}}
                        {{--<div class="col-md-8">--}}
                        {{--<label class="radio-inline">--}}
                        {{--<input type="radio" name="visible[]" value="1"> แสดงบนเว็บไซต์--}}
                        {{--</label>--}}
                        {{--<label class="radio-inline">--}}
                        {{--<input type="radio" name="visible[]" value="0" checked> ซ่อน--}}
                        {{--</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}

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