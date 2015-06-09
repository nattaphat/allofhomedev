@extends('layouts.main')

@section('slider')
{{--@include('layouts._partials.topslide')--}}
@stop

@section('jshome')

@stop

@section('jsbody')
<script type="text/javascript">

    Dropzone.options.myDropzone = {

        // Prevents Dropzone from uploading dropped files immediately
        autoProcessQueue: false,

        init: function() {
            var submitButton = document.querySelector("#submit-all"),
                    myDropzone = this; // closure

            submitButton.addEventListener("click", function() {
                myDropzone.processQueue(); // Tell Dropzone to process all queued files
            });

            this.on('addedfile', function(file) {
//                debugger;
//                var select = document.createElement('select');
//                select.setAttribute('name', 'folder[' + file.name + ']');
//
//                var option;
//                option = document.createElement('option');
//                option.innerHTML = 'images';
//                select.appendChild(option);
//
//                option = document.createElement('option');
//                option.innerHTML = 'css';
//                select.appendChild(option);
//
//                var xx = document.forms;
//
//                document.forms[1].appendChild(select);

                var textarea = document.createElement('textarea');
                textarea.setAttribute('name', 'file[' + file.name + ']');
                textarea.setAttribute('rows', '3');

                document.forms[1].appendChild(textarea);

            });

            this.on('sending', function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
            });
        }
    };

</script>
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts._partials.left_menu')
        </div>
        <div class="col-md-9">

            <button id="submit-all">Submit all files</button>
            <form action="{{ URL("post/upload") }}" class="dropzone" id="my-dropzone"></form>

        </div>
</div>
</div>
@stop