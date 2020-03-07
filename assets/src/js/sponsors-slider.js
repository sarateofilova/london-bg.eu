jQuery(function ($) {
    $(function() {
        $(".slider-slick").slick({
            arrows: true,
            slidesToShow: 4,
            infinite: true,
          
            // the magic
            responsive: [{
          
                breakpoint: 1024,
                settings: {
                  
                }
          
              }, {
          
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                }
          
              }]
          });
    });
})




  