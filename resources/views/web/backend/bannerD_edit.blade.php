@extends('layouts.main_backend')

@section('jshome')

    <style type="text/css">

        img{
            width: 300px;
            height: 250px;
        }

        .dropzone .dz-preview .dz-image {
            width: 300px;
            height: 250px;
            border-radius: 0;
        }

    </style>
@stop

@section('jsbody')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\BannerARequest', '#my-form'); !!}

    <script type="text/javascript">
        $(document).ready(function(){

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
                escapeMarkup: function (markup)
                {
                    debugger;
                    return markup;
                },
                templateSelection: function(repo)
                {
                    debugger;
                    if(repo.text != null && repo.text != "")
                        return repo.text;
                    else
                        return repo.tag_sub_name;
                },
                templateResult: function(repo)
                {
                    debugger;
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
            dictDefaultMessage: "อัพโหลดไฟล์ขนาด 300 x 250 pixel",
            thumbnailWidth: 300,
            thumbnailHeight: 250,
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
            <h3 class="page-header">ข้อมูล Banner (Type D)</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    แก้ไข Banner (Type D)
                </div>
                <div class="panel-body">
                    <div class="col-md-12">

                        {!! Form::open(['route' => ['backend_bannerD_update'],
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
                            {!! Form::label('remark', 'หมายเหตุ', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::textarea('remark', $banner->remark,[
                                'class' => 'form-control',
                                'rows' => '3'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <select class="form-control" multiple="multiple" id="tags" name="tags[]">
                                    @if($tags != null)
                                        @foreach($tags as $key=>$value)
                                            <option value="{{ $value->tag_sub_id }}" selected>{{ App\Models\TagSub::getTagSubName($value->tag_sub_id) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('default', 'ตั้งเป็นค่าเริ่มต้น', [
                            'class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="default[]" value="true"
                                            @if($banner->default)
                                               checked
                                            @endif
                                                > ตั้งเป็นค่าพื้นฐาน (จะแสดง Banner ในกรณีที่กระทู้ไม่มี Tags ใดๆ สัมพันธ์กับ Banner)
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="default[]" value="false"
                                            @if(!$banner->default)
                                               checked
                                            @endif
                                                > ไม่ตั้งค่า
                                    </label>
                                </div>
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