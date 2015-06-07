@extends('layouts.main')

@section('slider')
    {{--@include('layouts._partials.topslide')--}}
@stop

@section('jshome')

@stop

@section('jsbody')
    <script type="text/javascript">

        $(document).ready(function(){
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
                sending: function(file, xhr, formData) {
                    formData.append("_token", $('[name=_token]').val());

                },
                success: function (file, response) {
                    debugger;
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

        });
    </script>
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts._partials.left_menu')
            </div>
            <div class="col-md-9" id="main_div">

                {!! Form::open(array('url'=>'project/create', 'method' => 'POST', 'files' => 'true',
                'data-ajax' => 'true', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}


                <div class="row">
                    <div class="col-md-12">
                        <div id="dZUpload" class="dropzone uploadify"></div>
                    </div>
                </div>

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
                                        <a data-dz-remove>
                                            &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-trash"></i>
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

                <div class="form-group" style="padding: 20px 0px 20px 0;">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="button" class="btn btn-default">
                            <a href="{{ URL::previous() }}">ยกเลิก</a></button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop