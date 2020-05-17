$(document).ready(function() {
    // items slider. /plugins/slickslider/
    if ($('.slider-banner-slick').length > 0) { // check if element exists
        $('.slider-banner-slick').slick({
              infinite: true,
              autoplay: true,
              slidesToShow: 1,
              dots: false,
              prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                 nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
        });
    } // end if

     // items slider. /plugins/slickslider/
    if ($('.slider-custom-slick').length > 0) { // check if element exists
        $('.slider-custom-slick').slick({
            infinite: true,
            slidesToShow: 4,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 2,
                slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                slidesToShow: 2,
                slidesToScroll: 2
                }
            }
        ],
            dots: true,
            prevArrow: $('.slick-prev-custom'),
            nextArrow: $('.slick-next-custom')
        });
    } // end if
});