$('.icon-back-big a').click(function  () {
	$('#modulebar').animate({left:'-250px'},500);

})

$('a.module').click(function  () {
	$('#modulebar').animate({left:'37px'},500);
})
$('#modulebar').mouseover(function  () {
	$('#modulebar').css("opacity","1");
})

$('#modulebar').mouseleave(function  () {
	$('#modulebar').css("opacity","0.5");
})

$('.module-add a').click(function  () {
	$('.chooseable').show();
	$('.module-add').hide();
})


$('.module-choose').mouseleave(function  () {
	$(this).removeClass("module-choose-hover");
	
})

$('.module-choose').click(function  () {
	$(this).removeClass("module-choose").removeClass("module-choose-hover").addClass("list-group");
	
})

$('.module-choose').mouseover(function  () {
	$(this).addClass("module-choose-hover");
	
})


$('.module-completed a').click(function  () {
	$('.module-choose').hide();
	$('.module-add').show();

})