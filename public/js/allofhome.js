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
        $('#carousel_allofhome').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: true,
            slideshow: false,
            itemWidth: 210,
            itemMargin: 5,
            asNavFor: '#slider_allofhome'
        });

        $('#slider_allofhome').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: true,
            pausePlay: true,
            animationSpeed: 400,
            slideshow: true,
            sync: "#carousel_allofhome"
        });
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