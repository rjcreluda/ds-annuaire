$(document).ready(function(){
    // $(".news-wrapper").slick({
    //     dots: true,
    //     infinite: true,
    //     centerMode: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 1
    // });
    $('.news-wrapper').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><span class="fa fa-arrow-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="fa fa-arrow-right"></span></button>',
        responsive: [
            {
                breakpoint: 999,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 770,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 599,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

});