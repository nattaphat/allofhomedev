$( document ).ready(function() {

    setDatePicker();
    fistPageSlide();

    /**
     * For signup page
     * [setDatePicker description]
     */
    function setDatePicker()
    {
        /*DatePicker*/
        $('#birthday').datepicker({
            autoclose: true,
            todayHighlight: true ,
            format: 'mm-dd-yyyy',
            endDate: '+0d'
        });
    }

    function fistPageSlide()
    {
        var options = { $AutoPlay: true };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    }
    changeInfoPhoto();
    function changeInfoPhoto()
    {
        // with plugin options
        $("#userInfoPhotoUpload").fileinput(
            {
                "previewFileType": "image",
                "browseClass": "btn btn-success",
                "browseLabel": "Pick Image",
                "browseIcon": "<i class=\"glyphicon glyphicon-picture\"></i> ",
                "removeClass": "btn btn-danger",
                "removeLabel": "Delete",
                "removeIcon": "<i class=\"glyphicon glyphicon-trash\"></i> ",
                "uploadClass": "btn btn-info",
                "uploadLabel": "Upload",
                "uploadIcon": "<i class=\"glyphicon glyphicon-upload\"></i> "
            });
    }
});