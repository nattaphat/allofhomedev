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
                            {!! Form::label('for_cat[]', 'แสดงสำหรับเมนู', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-8">
                                <div class="checkbox">
                                    <label>
                                        @if($for_menu != null)
                                            @if(in_array("1", $for_menu))
                                                {!! Form::checkbox('for_menu[]', '1', ['checked' => 'checked']) !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(1) }}
                                            @else
                                                {!! Form::checkbox('for_menu[]', '1') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(1) }}
                                            @endif
                                        @else
                                            {!! Form::checkbox('for_menu[]', '1') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(1) }}
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        @if($for_menu != null)
                                            @if(in_array("2", $for_menu))
                                                {!! Form::checkbox('for_menu[]', '2', ['checked' => 'checked']) !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(2) }}
                                            @else
                                                {!! Form::checkbox('for_menu[]', '2') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(2) }}
                                            @endif
                                        @else
                                            {!! Form::checkbox('for_menu[]', '2') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(2) }}
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        @if($for_menu != null)
                                            @if(in_array("3", $for_menu))
                                                {!! Form::checkbox('for_menu[]', '3', ['checked' => 'checked']) !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(3) }}
                                            @else
                                                {!! Form::checkbox('for_menu[]', '3') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(3) }}
                                            @endif
                                        @else
                                            {!! Form::checkbox('for_menu[]', '3') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(3) }}
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        @if($for_menu != null)
                                            @if(in_array("4", $for_menu))
                                                {!! Form::checkbox('for_menu[]', '4', ['checked' => 'checked']) !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(4) }}
                                            @else
                                                {!! Form::checkbox('for_menu[]', '4') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(4) }}
                                            @endif
                                        @else
                                            {!! Form::checkbox('for_menu[]', '4') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(4) }}
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        @if($for_menu != null)
                                            @if(in_array("5", $for_menu))
                                                {!! Form::checkbox('for_menu[]', '5', ['checked' => 'checked']) !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(5) }}
                                            @else
                                                {!! Form::checkbox('for_menu[]', '5') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(5) }}
                                            @endif
                                        @else
                                            {!! Form::checkbox('for_menu[]', '5') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(5) }}
                                        @endif
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        @if($for_menu != null)
                                            @if(in_array("6", $for_menu))
                                                {!! Form::checkbox('for_menu[]', '6', ['checked' => 'checked']) !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(6) }}
                                            @else
                                                {!! Form::checkbox('for_menu[]', '6') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(6) }}
                                            @endif
                                        @else
                                            {!! Form::checkbox('for_menu[]', '6') !!} &nbsp; {{ \App\Models\AllFunction::getBannerDForMenu(6) }}
                                        @endif
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