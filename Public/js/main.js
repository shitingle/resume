var current_navbar;
var current_page;
var current_banner = 0;

navbar_switch = function(navbar, animate) {
  current_navbar = navbar;
  var navbar_pos = navbar.position().left;
  var width = navbar.children().width() / 2;
  var pos = -1381 + navbar_pos + 25 + width;
  if (animate) {
    $('#bottombar').animate({
      'background-position': pos + 'px'
    }, 500);
  } else {
    $('#bottombar').css('background-position', pos + 'px');
  }
}

page_switch = function(navbar) {
  navbar_switch(navbar, true);
  current_page.fadeOut(500);
  current_page = $('#content #' + navbar.attr('id'));
  current_page.fadeIn(500, function(){
    $(window).resize();
  });
}

banner_slide = function(direction) {
  var new_banner = current_banner + direction;
  if (new_banner > 3 || new_banner < 0) {
    return;
  }
  var points = $('#point div');
  points.eq(current_banner).removeClass('on');
  points.eq(current_banner).addClass('off');
  $('#mainpage .slide').eq(current_banner).fadeOut(500);
  $('#mainpage .background').eq(current_banner).fadeOut(500);
  current_banner = new_banner;
  points.eq(current_banner).removeClass('off');
  points.eq(current_banner).addClass('on');
  $('#mainpage .slide').eq(current_banner).delay(500).fadeIn(500);
  $('#mainpage .background').eq(current_banner).fadeIn(500);
}

$(document).ready(function(e) {
  current_page = $('#content #mainpage');
  navbar_switch($('#navbar #mainpage'), false);
  $('#templates').css('height', ($(window).height() - 65) + 'px');
  //$('.pane').css('height', ($(window).height() - 68 * 2) + 'px');
  $('.nano').nanoScroller({
    //disableResize: true,
    alwaysVisible: true 
  });

  $(window).resize(function(e) {
    navbar_switch(current_navbar, false);
    if (current_page.attr('id') == 'resumepage') {
      $('#templates').css('height', ($(window).height() - 65) + 'px');
    }
  });

  $('#navbar a').click(function(e) {
    page_switch($(this));
  });

  $('#slide_left').click(function(e) {
    banner_slide(-1);
  });

  $('#slide_right').click(function(e) {
    banner_slide(1);
  });

  $('.color_select').click(function () {
    window.location.href='http://localhost/resumeplan/index.php/index/edit';
  })

  $('.open-popup-link').magnificPopup({
    //removalDelay: 300,
    type: 'inline',
    //mainClass: 'mfp-fade',
    midClick: false,
    callbacks: {
      open: function (){
        document.getElementById('light1').src = 'http://localhost/resumeplan/public/img/light_off.png';
        document.getElementById('light2').src = 'http://localhost/resumeplan/public/img/light_on.png';
        document.getElementById('light3').src = 'http://localhost/resumeplan/public/img/light_off.png';
      },
      close: function (){
        document.getElementById('light1').src = 'http://localhost/resumeplan/public/img/light_on.png';
        document.getElementById('light2').src = 'http://localhost/resumeplan/public/img/light_off.png';
        document.getElementById('light3').src = 'http://localhost/resumeplan/public/img/light_off.png';
      }
    }
  });

});
