jQuery(function ($){


    $('#last-Projects').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1
    });


    $('#testimonies').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        adaptiveHeight: true
    });
});