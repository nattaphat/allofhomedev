@extends('layouts.main_backend')

@section('jshome')

    <!-- elFinder -->
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}>
    <link rel="stylesheet" type="text/css" media="screen" href={{ asset('packages/barryvdh/elfinder/css/theme.css') }}>

    <style type="text/css">

        img{
            width: 300px;
            height: 322px;
        }

        .dropzone .dz-preview .dz-image {
            width: 300px;
            height: 322px;
            border-radius: 0;
        }

    </style>
@stop

@section('jsbody')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\BannerARequest', '#my-form'); !!}

    <!-- Tiny MCE -->
    <script src={{ asset('js/lib/tinymce/js/tinymce/tinymce.min.js') }}></script>
    <script src={{ asset('js/lib/tinymce/js/tinymce/themes/modern/theme.min.js') }}></script>

    <!-- elFinder -->
    <script type="text/javascript" src={{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}></script>

    <script type="text/javascript">
        $(document).ready(function(){

            <!-- Tiny MCE -->
            tinymce.init({
                selector: "textarea#remark",
                theme: "modern",
                //width: 600,
                height: 150,
                file_browser_callback : elFinderBrowser,
                plugins: [
                    "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                    "save table contextmenu directionality template paste textcolor"
                ],
                content_css: "css/content.css",
                toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
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

        });
    </script>

    <script type="text/javascript">

        <!-- Dropzone -->
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#dZUpload", {
            url: '{{ URL("post/upload") }}',
            maxFiles: 1,
            maxFilesize: 3, //mb
            parallelUploads: 1,
            acceptedFiles: 'image/*',
            autoProcessQueue: true,
            addRemoveLinks: true,
            dictDefaultMessage: "อัพโหลดไฟล์ขนาด 300 x 322 pixel",
            thumbnailWidth: 300,
            thumbnailHeight: 322,
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
            },
            success: function (file, response) {
                var filename = file.name;
                var filetype = file.type;
                var filesize = file.size;
                var filepath = (response == undefined ? file.path : response);

                file.previewElement.classList.add("dz-success");

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'filename');
                input_hidden.setAttribute('id', 'filename');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filename);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'filetype');
                input_hidden.setAttribute('id', 'filetype');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filetype);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'filesize');
                input_hidden.setAttribute('id', 'filesize');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filesize);
                document.forms[0].appendChild(input_hidden);

                var input_hidden = document.createElement('input');
                input_hidden.setAttribute('name', 'filepath');
                input_hidden.setAttribute('id', 'filepath');
                input_hidden.setAttribute('type', 'hidden');
                input_hidden.setAttribute('value', filepath);
                document.forms[0].appendChild(input_hidden);
            },
            error: function (file, response) {
                this.removeFile(file);
                alert(response);
            },
            init : function()
            {
                @if($banner->file_path != null)
                var mockFile = { name: '{{ $banner->file_name }}', size: '{{ $banner->file_size }}',
                    type: '{{ $banner->file_type }}', path: '{{ $banner->file_path }}',
                    accepted: true, status: Dropzone.ADDED };
                this.emit("addedfile", mockFile);
                this.emit("thumbnail", mockFile, '{{ $banner->file_path }}');
                this.emit("success", mockFile);
                this.emit("complete", mockFile);
                this.files.push(mockFile);
                @endif
            }
        });

        myDropzone.on("removedfile", function(){
            $('#filename').val("");
            $('#filetype').val("");
            $('#filesize').val("");
            $('#filepath').val("");
        });

    </script>

@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">ข้อมูล Banner (Type C)</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    แก้ไข Banner (Type C)
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_bannerC_update'],
                            'id'=> 'my-form', 'data-ajax' => 'true',
                            'class' => 'form-horizontal']) !!}

                        {!! Form::hidden('id', $banner->id) !!}
                        {!! Form::hidden('user_id', Auth::user()->id) !!}

                        <div class="form-group">
                            {!! Form::label('banner_name', 'ชื่อ Banner', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('banner_name', $banner->banner_name,[
                                    'class' => 'form-control'
                                    ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('dZUpload', 'รูปภาพ', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <div id="dZUpload" name="dZUpload" class="dropzone uploadify"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('url', 'ลิงค์ URL', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('url', $banner->url,[
                                'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('remark', 'คำอธิบายใต้ภาพ', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::textarea('remark', $banner->remark,[
                                'class' => 'form-control',
                                'rows' => '3'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('visible', 'แสดงผลบนเว็บไซต์', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <label class="radio-inline">
                                    <input type="radio" name="visible[]" value="true"
                                    @if($banner->visible)
                                           checked
                                            @endif
                                            > แสดงผล
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="visible[]" value="false"
                                    @if(!$banner->visible)
                                           checked
                                            @endif
                                            > ซ่อน
                                </label>
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