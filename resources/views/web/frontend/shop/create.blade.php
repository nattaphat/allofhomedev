@extends('layouts.main')

@section('jshome')

@stop

@section('jsbody')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ProjectRequest', '#my-form'); !!}

    <script type="text/javascript">
        $(document).ready(function(){

            <!-- Tags -->
            var tag_main_name = "";
            $("#tag").select2(
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

        var myDropzone2 = new Dropzone("#dZUpload2", {
            url: '{{ URL("post/upload") }}',
            maxFilesize: 3, //mb
            parallelUploads: 1,
            acceptedFiles: 'image/*',
            autoProcessQueue: true,
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
            },
            success: function (file, response) {
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

    </script>

@stop

@section('content')

    <div class="container nomargin">
        <div class="row">
            <div class="col-md-3">
                @include('layouts._partials.left_menu')
            </div>
            <div class="col-md-9">

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
                                    {!! Form::open(array('url'=>'project/create', 'method' => 'POST', 'files' => 'true',
                                    'id'=> 'my-form', 'data-ajax' => 'true', 'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data')) !!}


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