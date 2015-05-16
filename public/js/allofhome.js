$( document ).ready(function() {

    setDatePicker();
    fistPageSeclide();
    topSlide();

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

    /**
     * Slide on top first page
     */
    function topSlide()
    {
        $("#owl-demo").owlCarousel({

            //navigation : true, // Show next and prev buttons
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem:true,
            autoPlay:true,
            stopOnHover:true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });
    }

    /**
     * Second Slide in first page
     */
    function fistPageSeclide()
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