$( document ).ready(function() {

    $('#collapsible-panels .detail').slideDown();

    picture_preview_slider();
    toggle_preview();
    articleSlider();
    bannerB_Slider();
    bannerC_Slider();

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

    $('.p-subtitle').dotdotdot({
        ellipsis: '...', /* The HTML to add as ellipsis. */
        wrap : 'word', /* How to cut off the text/html: 'word'/'letter'/'children' */
        watch : true /* Whether to update the ellipsis: true/'window' */
    });

    $('.article-subtitle').dotdotdot({
        ellipsis: '...', /* The HTML to add as ellipsis. */
        wrap : 'word', /* How to cut off the text/html: 'word'/'letter'/'children' */
        watch : true /* Whether to update the ellipsis: true/'window' */
    });

    $('#btn_search').click(function(){
        if($('#txt_search').val() != "")
        {
            $_word = $('#txt_search').val();
            $_token = $('#search_token').val();
            $_url = $('#search_url').val();

            $.redirect($_url, { _token: $_token, _word: $_word});
        }
    });

});

function picture_preview_slider()
{
    $('#slider').flexslider({
        slideshow: true,
        animation: "fade",
        slideshowSpeed: 6000,
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

function articleSlider()
{
    $('#articleSlider').flexslider({
        slideshow: true,
        animation: "fade",
        slideshowSpeed: 6000,
        pauseOnHover: true,
        smoothHeight: true,
        useCSS: true,
        controlNav: false,
        directionNav: true
    });
}

function bannerB_Slider()
{
    $('#bannerB_Slider').flexslider({
        slideshow: true,
        animation: "slide",
        slideshowSpeed: 6000,
        pauseOnHover: false,
        smoothHeight: true,
        useCSS: true,
        controlNav: false,
        directionNav: false
    });
}

function bannerC_Slider()
{
    $('#bannerC_Slider').flexslider({
        slideshow: true,
        animation: "fade",
        slideshowSpeed: 6000,
        pauseOnHover: false,
        smoothHeight: true,
        useCSS: true,
        controlNav: false,
        directionNav: false
    });
}


