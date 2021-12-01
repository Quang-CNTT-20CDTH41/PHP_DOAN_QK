// NAV SCROLL
$(function(){
        var stickyHeaderTop = $('#stickytypeheader').offset().top;
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('#stickytypeheader').css({position: 'fixed', margin: '0 105px', top: '0', zIndex: '1000'});
                } else {
                        $('#stickytypeheader').css({position: 'static', top: '0', zIndex: '1000'});
                }
        });
});

// BANNER
$('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        autoplay:true,
        autoplayTimeout:5000, 
        dots: true,
        stagePadding: 21,
        responsive:{
                0:{
                        items:1
                },
                600:{
                        items:3
                },
                1000:{
                        items:5
                }
        }
})

// MENU 

$(document).ready(function(){
        $(".menu li").hover(function(){
            $(this).find("ul:first").slideDown();
        }, function(){
            $(this).find("ul:first").hide();
        });
});
