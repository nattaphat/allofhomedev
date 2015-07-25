@extends('layouts.main_backend')

@section('jsbody')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\BrandRequest', '#my-form'); !!}

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
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
            },
            success: function (file, response) {

                var filename = file.name;
                var filetype = file.type;
                var filesize = file.size;
                var filepath = (response == undefined ? file.path : response);

                file.previewElement.classList.add("dz-success");

                $('#filename').val(filename);
                $('#filetype').val(filetype);
                $('#filesize').val(filesize);
                $('#filepath').val(filepath);
            },
            error: function (file, response) {
                this.removeFile(file);
                alert(response);
            },
            init : function()
            {
                @if($attachment != null)
                    var mockFile = { name: '{{ $attachment->filename }}', size: '{{ $attachment->filesize }}',
                        type: '{{ $attachment->filetype }}', path: '{{ $attachment->path }}',
                        accepted: true, status: Dropzone.ADDED};
                    this.emit("addedfile", mockFile);
                    this.emit("thumbnail", mockFile, '{{ $logo }}');
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
            <h3 class="page-header">แบรนด์</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    เพิ่มแบรนด์
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_shop_update'],
                            'id'=> 'my-form', 'data-ajax' => 'true',
                            'class' => 'form-horizontal']) !!}

                        {!! Form::hidden('id', $shop->id) !!}
                        {!! Form::hidden('filename', $attachment == null? "" : $attachment->filename, ['id'=> 'filename']) !!}
                        {!! Form::hidden('filesize', $attachment == null? "" : $attachment->filesize, ['id'=> 'filesize']) !!}
                        {!! Form::hidden('filetype', $attachment == null? "" : $attachment->filetype, ['id'=> 'filetype']) !!}
                        {!! Form::hidden('filepath', $attachment == null? "" : $attachment->path, ['id'=> 'filepath']) !!}

                        <div class="form-group">
                            {!! Form::label('shop_name', 'ชื่อแบรนด์', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('shop_name', $shop->brand_name,[
                                    'class' => 'form-control'
                                    ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('dZUpload', 'โลโก้', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <div id="dZUpload" name="dZUpload" class="dropzone uploadify"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('telephone', 'โทรศัพท์', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('telephone', $shop->telephone,[
                                'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'อีเมล', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('email', $shop->email,[
                                'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('facebook', 'เฟสบุ๊ค', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('facebook', $shop->facebook,[
                                'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('line', 'ไลน์', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('line', $shop->line,[
                                'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('suggest', 'แสดงผลบนเว็บไซต์', [
                                'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <label class="radio-inline">
                                    <input type="radio" name="suggest[]" value="true" @if($shop->suggest) checked @endif> สำคัญ
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="suggest[]" value="false" @if(!$shop->suggest) checked @endif> ธรรมดา
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