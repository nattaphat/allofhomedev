@extends('layouts.main_backend')

@section('jshome')
    <style type="text/css">

        img{
            max-width: 500px;
            max-height: 45px;
        }

        .dropzone .dz-preview .dz-image {
            width: 500px;
            border-radius: 0;
        }

    </style>
@stop

@section('jsbody')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\BannerARequest', '#my-form'); !!}

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
            dictDefaultMessage: "อัพโหลดไฟล์ขนาด 1000 x 90 pixel",
//            thumbnailWidth: 500,
//            thumbnailHeight: 45,
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
            },
            success: function (file, response) {
                var filename = file.name;
                var filetype = file.type;
                var filesize = file.size;
                var filepath = response;

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
            <h3 class="page-header">ข้อมูล Banner (Type A)</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    เพิ่ม Banner (Type A)
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_bannerA_store'],
                            'id'=> 'my-form', 'data-ajax' => 'true',
                            'class' => 'form-horizontal']) !!}

                        {!! Form::hidden('user_id', Auth::user()->id) !!}

                        <div class="form-group">
                            {!! Form::label('banner_name', 'ชื่อ Banner', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('banner_name', null,[
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
                                {!! Form::text('url', null,[
                                'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('remark', 'หมายเหตุ', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::textarea('remark', null,[
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
                                    <input type="radio" name="visible[]" value="true"> แสดงผล
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="visible[]" value="false" checked> ซ่อน
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