$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.scrolltotop').fadeIn();
        } else {
            $('.scrolltotop').fadeOut();
        }

        if ($(this).scrollTop() > 100) {
            $('.goback').fadeIn();
        }
    });

    $('.scrolltotop').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});

$(window).on('scroll',function(){
		var carPosition = Math.round($(window).scrollTop() / $(window).height() * -0);
    $('.car-move').css('transform','translateX('+(carPosition)+'%)');
});

$(window).scroll(function() {
    $('.traffic-light').fadeOut();
});

$(window).on('scroll',function(){
	var titlePosition = Math.round($(window).scrollTop() / $(window).height() * -280);
	$('.transition-up').css('transform','translateY('+(titlePosition)+'%)');
});
