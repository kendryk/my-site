jQuery(function ($){


    if (window.matchMedia("(max-width: 1024px)").matches){
        $('#last-Projects').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    } else {
        $('#last-Projects').slick({
            dots: true,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1
        });
    }




    $('#testimonies').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        adaptiveHeight: true
    });

    // Get the modal
    let count= document.getElementsByClassName('img_size').length;

    for (let i = 0; i < count; i++){

    const modal = document.getElementById('myModal-'+i);

// Get the image and insert it inside the modal - use its "alt" text as a caption
        const img = document.getElementById('myImg-'+i);
        const modalImg = document.getElementById('img01-'+i);
        const captionText = document.getElementById('caption-'+i);


    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

// Get the <span> element that closes the modal
    let span = document.getElementById("button-"+i);
        console.log(span);
// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
}

// -------------------------init Isotope

   let $grid = $('.grid').isotope({
    //options
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
});

// filter items on button click
    $('.filter-button-group').on( 'click', 'button', function() {
        let filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });










});