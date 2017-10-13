$(document).ready(function() {
$('#dropdown-link1').on('click', function() {
var query = $('.link1');
var isVisible = query.is(':visible');
$(this).find('.glyphicon-plus').toggle();
$(this).find('.glyphicon-remove').toggle();
if (isVisible === true){
$('.link1').slideUp(1000);
$('.showMe1').slideDown(1000);
}
else{
$('.showMe1').slideToggle(1000);
}

});
$('#dropdown-link').on('click', function() {
var query = $('.link2');
var isVisible = query.is(':visible');
$(this).find('.glyphicon-plus').toggle();
$(this).find('.glyphicon-remove').toggle();
if (isVisible === true){
$('.link2').slideUp(1000);
$('.showMe2').slideDown(1000);
}
else{
$('.showMe2').slideToggle(1000);
}
});
$('#dropdown-link2').on('click', function() {
var query = $('.link3');
var isVisible = query.is(':visible');
$(this).find('.glyphicon-plus').toggle();
$(this).find('.glyphicon-remove').toggle();
if (isVisible === true){
$('.link3').slideUp(1000);
$('.showMe3').slideDown(1000);
}
else{
$('.showMe3').slideToggle(1000);
}
});
$(window).scroll(function(){
if($(this).scrollTop()>=50){
$('nav').addClass('fixedTop');
$('.addContainer').addClass('container');
$('nav').removeClass('positionRelative');
$('.banner-back').removeClass('container');
}
else{
$('nav').addClass('positionRelative');
$('.addContainer').removeClass('container');
$('nav').removeClass('fixedTop');
$('.banner-back').addClass('container');
}
})


// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
   if (event.target == modal) {
       modal.style.display = "none";
   }
}

$(window).scroll(function() {
scrollTop = $(window).scrollTop(),
divOffset = $('.banner-text,.about_banner').offset().top;
dist = (divOffset - scrollTop);
if (dist <= -10) {
$('.logo_img1').addClass('ladding_logo');
$('.logo_img2').addClass('scroll_logo');
} 
else {
$('.logo_img2').removeClass('scroll_logo');
$('.logo_img1').removeClass('ladding_logo');
}
});


$('#dropdown-link3').on('click', function() {
var query = $('.clickMe2');
var isVisible = query.is(':visible');
$(this).find('.glyphicon-plus').toggle();
$(this).find('.glyphicon-remove').toggle();
if (isVisible === true){
$('.clickMe2').slideUp(1000);
$('.clickMe1').slideDown(1000);

}
else{
$('.clickMe1').slideToggle(1000);
}
});
$('#dropdown-link4').on('click', function() {
var query = $('.clickMe3');
var isVisible = query.is(':visible');
$(this).find('.glyphicon-plus').toggle();
$(this).find('.glyphicon-remove').toggle();
if (isVisible === true){
$('.clickMe3').slideUp(1000);
$('.clickMe4').slideDown(1000);
}
else{
$('.clickMe4').slideToggle(1000);
}
});







 var show = 4;
    //calculate each slides width depending on how many you want to show
    var w = $('#slider').width() / show;
    
    //set each slide width
    $('.slide').width(w);
    
    setInterval(function(){
        //animate only the first slide on the left, all the slides after will just follow
        $('.slide').first().animate({
            marginLeft: -w 
        }, 'slow', function () {
        //once completely hidden, move this slide next to the last slide
        //and reset the margin-left to 0
            $(this).appendTo($(this).parent()).css({marginLeft: 0});
        });
    }, 2000); 

$(".view").click(function(){
        $(".pane").slideToggle("slow");
        $('.glyphicon-chevron-up').toggleClass('dsplyNone');
        $('.glyphicon-chevron-up').toggleClass('dsplyShow');
        $('.glyphicon-remove').toggleClass('dsplyShow')
        $('.glyphicon-remove').toggleClass('dsplyNone')
    });


});


/*$(window).scroll(function(){

	if ($(window).scrollTop() > 200){
		$(".link1").animate({left: '800px'}).animate({top: '500px'}).animate({left: '70px'});
	}
})
*/

