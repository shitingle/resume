
/*
$(".module-title").mouseover(function  () {
	$(".toolbar").show();
})

$(".module-title").mouseleave(function  () {
	$(".toolbar").hide();
})
*/

$(".modual").mouseover(function  () {
  $(".toolbar").show();
  $(this).find("input")[0].focus();
})

$(".modual").mouseleave(function  () {
  $(".toolbar").hide();
})

$(".toolbar a.del").click(function  () {
	$(".modual").remove();
})

$(".toolbar").mouseover(function  () {
  $(".module-inner").addClass('modual_hover');
})
$(".toolbar").mouseleave(function  () {
  $(".module-inner").removeClass('modual_hover');
})


    $( "#sortable" ).sortable({
      revert: true
    });
    $( "#draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      revert: "invalid"
    });
    $( "ul, li" ).disableSelection();

