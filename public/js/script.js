$( document ).ready(function() {

    $('#collapsible-panels .detail').slideUp();

    picture_preview_slider();
    toggle_preview();

    $( '.dropdown' ).hover(
        function(){
            var index = $(this).index();

            for(var i=0; i<4; i++)
            {
                if(i == index-1)
                {
                    $(".sub-menu").eq(i).slideDown(200);
                }
                else
                {
                    $(".sub-menu").eq(i).slideUp(200);
                }
            }
        },
        function(){

        }
    );

    $( '.nodropdown' ).hover(
        function(){
            $(".sub-menu").slideUp(200);
        },
        function(){

        }
    );

    $( '.sub-menu' ).hover(
        function(){

        },
        function(){
            $(this).slideUp(200);
        }
    );

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

