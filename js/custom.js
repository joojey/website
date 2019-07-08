// SCROLL TO TOP

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.scrolltotop').fadeIn();
        } else {
            $('.scrolltotop').fadeOut();
        }
    });

    $('.scrolltotop').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});

// AUTO

$(window).on('scroll',function(){
		var carPosition = Math.round($(window).scrollTop() / $(window).height() * -0);
    $('.car-move').css('transform','translateX('+(carPosition)+'%)');

});

// ROTE AMPEL

$(window).scroll(function() {
    $('.traffic-light').fadeOut();
});

// ALLGEMEINE BEWEGUNG

$(window).on('scroll',function(){
	var titlePosition = Math.round($(window).scrollTop() / $(window).height() * -280);
	$('.transition-up').css('transform','translateY('+(titlePosition)+'%)');
});



// SPACE SHUTTLE BEWEGUNG

$(window).on('scroll',function(){
	var titlePosition = Math.round($(window).scrollTop() / $(window).height() * -400);
	$('.transition-up-shuttle').css('transform','translateY('+(titlePosition)+'%)');
});
