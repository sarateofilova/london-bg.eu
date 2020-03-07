jQuery(function ($) {
    $(function() {
        $(document).on("scroll", function() {

            if($(document).scrollTop()>100) {
                $(".shrink").removeClass("large").addClass("small");
                $(".site-branding").addClass("small-logo");
                $(".custom-logo").addClass("small-logo");
                
            } else {
                $(".shrink").removeClass("small").addClass("large");
                $(".site-branding").removeClass("small-logo");
                $(".custom-logo").removeClass("small-logo");
            }
            
        });

        $(window).scroll(function() {    // this will work when your window scrolled.
            var height = $(window).scrollTop();  //getting the scrolling height of window
            if(height  > 100) {
                $(".bottom-header-container").css({"position": "fixed", "margin": "0 auto",
                "top": "0", "width": "100%"});
            } else{
                $(".bottom-header-container").css({"position": "relative"});
            }
        });
    });    
});

jQuery(document).ready(function($) {
    jQuery('.stellarnav').stellarNav({

        // adds default color to nav. (light, dark)
        theme     : 'plein', 
      
        // number in pixels to determine when the nav should turn mobile friendly
        breakpoint: 1000, 
      
        // label for the mobile nav
        menuLabel: '<a class="menu-title" href="#">Menu</a>', 
      
        // adds a click-to-call phone link to the top of menu - i.e.: "18009084500"
        phoneBtn: false, 
      
        // adds a location link to the top of menu - i.e.: "/location/", "http://site.com/contact-us/"
        locationBtn: false, 
      
        // makes nav sticky on scroll
        sticky     : false, 
      
        // how fast the dropdown should open in milliseconds
        openingSpeed: 250, 
      
        // controls how long the dropdowns stay open for in milliseconds
        closingDelay: 250, 
      
        // 'static', 'top', 'left', 'right'
        position: 'static', 
      
        // shows dropdown arrows next to the items that have sub menus
        showArrows: true, 
      
        // adds a close button to the end of nav
        closeBtn     : false, 
      
        // fixes horizontal scrollbar issue on very long navs
        scrollbarFix: false,
      
        // enables mobile mode
        mobileMode: false
        
      });
});


