$( document ).ready(function() {

    debugger;

    $('#collapsible-panels .detail').slideUp();

    picture_preview_slider();
    toggle_preview();

});

function picture_preview_slider()
{
    $('#slider').flexslider({
        slideshow: true,
        animation: "fade",
        slideshowSpeed: 3000,
        pauseOnHover: true,
        smoothHeight: true,
        manualControls: ".list-preview-ul li",
        useCSS: false
    });
}

function toggle_preview()
{
    $('#collapsible-panels a').click(function(e) {
        var div = $(this).next('#collapsible-panels div');
        var a = $(this);
        div.slideToggle('slow');
        a.toggleClass('active');
        e.preventDefault();
    });
}

