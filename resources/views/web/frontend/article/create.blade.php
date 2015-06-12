@extends('layouts.blank')

@section('jshome')

    <!-- elFinder -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}>
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/theme.css') }}>

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

        var myDropzone = new Dropzone("#dZUpload", {
            url: '{{ URL("post/upload") }}',
            maxFilesize: 3, //mb
            parallelUploads: 1,
            acceptedFiles: 'image/*',
            autoProcessQueue: true,
            dictDefaultMessage: "Drop file size 622 x 389 pixel",
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
            },
            success: function (file, response) {

                var filename = file.name;
                var filetype = file.type;
                var filesize = file.size;
                var filepath = response;

                debugger;

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'pics_filename[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filename);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'pics_filetype[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filetype);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'pics_filesize[]');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filesize);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
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
            previewsContainer: "#previews"
        });

    </script>

@stop

@section('content')

    <div class="container nomargin">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="block features">
                            <h2 class="title-divider" >
                                <span style="color: #55a79a;">เพิ่มบทความและข่าวสาร</span>
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
                                    {!! Form::open(array('url'=>'article/create', 'method' => 'POST', 'files' => 'true',
                                    'id'=> 'my-form', 'data-ajax' => 'true', 'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data')) !!}
                                    
                                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">

                                    <div class="form-group" style="padding-top: 30px;">
                                        {!! Form::label('title', 'หัวข้อ', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('subtitle', 'เนื้อหาย่อ', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            {!! Form::textarea('subtitle', null,['class' => 'form-control','rows' => 3]) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('for_cat[]', 'สำหรับหมวดหมู่', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('for_cat[]', '1') !!} &nbsp; หน้าแรก
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('for_cat[]', '2') !!} &nbsp; โครงการบ้านใหม่
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('for_cat[]', '3') !!} &nbsp; โครงการทาวน์โฮมใหม่
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('for_cat[]', '4') !!} &nbsp; โครงการคอนโดใหม่
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('for_cat[]', '5') !!} &nbsp; รีวิว
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('for_cat[]', '6') !!} &nbsp; ไอเดีย
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    {!! Form::checkbox('for_cat[]', '7') !!} &nbsp; บทความและข่าวสาร
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                                        เนื้อหา
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            {!! Form::textarea('other_detail', null,
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

                                    <div class="form-group">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div id="dZUpload" name="dZUpload1" class="dropzone uploadify"></div>
                                        </div>
                                        <div class="col-md-1"></div>
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

                                    <div class="bs-callout bs-callout-success" style="margin-top: 30px;">
                                        รายละเอียดอื่นๆ
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('video_url', 'วิดีโอ Youtube', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('video_url', null,['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('tags', 'Tags', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            <select class="form-control" multiple="multiple" id="tags" name="tags[]">
                                                @if(Input::old('tags') != null)
                                                    @foreach(Input::old('tags') as $key=>$value)
                                                        <option value="{{ $value }}" selected>{{ App\Models\TagSub::getTagSubName($value) }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('suggest', 'บทความแนะนำ', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-6">
                                            <label class="checkbox-inline">
                                                {!! Form::checkbox('suggest', 'true') !!} &nbsp; ตั้งค่าเป็นบทความแนะนำ
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('visible[]', 'แสดงผลหน้าเว็บไซต์', ['class' => 'col-md-3 control-label']) !!}
                                        <div class="col-md-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="visible[]" value="1"> แสดงผล
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="visible[]" value="0" checked> ไม่แสดงผล
                                            </label>
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