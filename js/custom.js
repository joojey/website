// SCROLL TO TOP ANIMATION
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

    $('.scroll-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});

// MOVING CAR ANIMATION ONSCROLL
$(window).on('scroll',function(){
		var carPosition = Math.round($(window).scrollTop() / $(window).height() * -0);
    $('.car-move').css('transform','translateX('+(carPosition)+'%)');
});

// TRAFFIC LIGHT ANIMATION ONSCROLL
$(window).scroll(function() {
    $('.traffic-light').fadeOut();
});

// CLOUD ANIMATION ONSCROLL
$(window).on('scroll',function(){
	var titlePosition = Math.round($(window).scrollTop() / $(window).height() * -280);
	$('.transition-up').css('transform','translateY('+(titlePosition)+'%)');
});

// NAVIGATION ANIMATION
$(document).ready(function(){
    $( "a.scrollLink" ).click(function( event ) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 500);
    });
});

//SKILLS-SECTION BLINK AUTOMATION
let i = 1;
function automate(){
    var filterOn = document.getElementById("skillID-" + i);
    filterOn.classList.add("skillImgAutomation");
    setTimeout(automate, 440);
    if(i>=16){
        i = 1;
    }else{
        i++;
    }
}
automate();

//CONSOLE
const args = [
    `%c  `,
    'font-size:200px; background-size:200px; background-repeat:no-repeat; background-image:url("https://raw.githubusercontent.com/woltersjoh/website/master/img/avatar_hello.png");',
];
window.console.log.apply(console, args);
