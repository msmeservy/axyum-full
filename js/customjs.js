$('.toggle-x').click(function(){
    $('.toggle-x').toggleClass('active');
    $('.mobile-navigation').addClass('active').slideToggle('slow');
});

/*
jQuery(function($) {
    $('document').ready(function() {
        $(window).scrollTop(1);
        $(window).scrollTop(0);
        });
        
        
    document.addEventListener('scroll', () => {
    document.documentElement.dataset.scroll = window.scrollY;
    });
});
*/



/* MOBILE NAV */
$('.menu-item-has-children').click(function(){
	var _content = $(this).find(".sub-menu");
	$(".sub-menu").not(_content).removeClass("active")
	_content.toggleClass("active");
});



	
if($('#mobile-nav').is(":visible")) {
		$('body').addClass("fixed");
		console.log('here');
	} else {
		$('body').removeClass("fixed");
}


$(window).scroll(function(){
    var sticky = $('.headerarea'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 100) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
  });

function isElementInViewport (el) {

    //special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }

    var rect = el.getBoundingClientRect();

    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
        rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
    );

}

/*var isAnimated = false;
window.onscroll = function(){
    if(isElementInViewport($('#myStat')) && !isAnimated){
        $('#myStat').circliful();
        isAnimated = true;
    }
}*/