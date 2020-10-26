
jQuery(document).ready(function($) {
  $(document).ready(function(){
  
/*
  $('[data-toggle="tooltip"]').tooltip(); 
  $('#myCarousel').carousel();
*/	
	


  $('.slider').mouseenter(function(){
    $('.arrow-prev').removeClass('hidden');
    $('.arrow-next').removeClass('hidden');
  });
  $('.slider').mouseleave(function(){
    $('.arrow-prev').addClass('hidden');
    $('.arrow-next').addClass('hidden');
  });

  $('.arrow-next').click(function() {
    var currentSlide = $('.active-slide');
    var nextSlide = currentSlide.next();

    var currentDot = $('.active-dot');
    var nextDot = currentDot.next();

    if(nextSlide.length === 0) {
      nextSlide = $('.slideMAIN').first();
      nextDot = $('.dot').first();
    }
    
    currentSlide.removeClass('active-slide');
    nextSlide.addClass('active-slide');

    currentDot.removeClass('active-dot');
    nextDot.addClass('active-dot');
  });


  $('.arrow-prev').click(function() {
    var currentSlide = $('.active-slide');
    var nth = $('.active-slide').index();
    var prevSlide = currentSlide.prev();

    var currentDot = $('.active-dot');
    var prevDot = currentDot.prev();

    if(prevSlide.length === 0 || nth === 2) {
      prevSlide = $('.slideMAIN').last();
      prevDot = $('.dot').last();
    }
    
    currentSlide.removeClass('active-slide');
    prevSlide.addClass('active-slide');

    currentDot.removeClass('active-dot');
    prevDot.addClass('active-dot');
  });

	var autoMove = function(){
	var currentSlide = $('.active-slide');
    var nextSlide = currentSlide.next();

    var currentDot = $('.active-dot');
    var nextDot = currentDot.next();

    if(nextSlide.length === 0) {
      nextSlide = $('.slideMAIN').first();
      nextDot = $('.dot').first();
    }
		currentSlide.removeClass('active-slide');
    	nextSlide.addClass('active-slide');

    	currentDot.removeClass('active-dot');
    	nextDot.addClass('active-dot');
	}
	
	window.setInterval(autoMove, 6000);


  $('.slider-img-dots li').click(function() {
    var index = $(this).index() + 1;
    var currentDot = $('.active-img-dot');
    var newDot = $('.slider-img-dots > li:nth-child(' + index + ')');
    var currentImage = $('.active-image');
    var newImage = $('.img-slider-normal > div:nth-child(' + index + ')');
    var currentCaption = $('.active-caption');
    var newCaption = $('.slider-captions > div:nth-child(' + index + ')');
    if (!newDot.hasClass('active-img-dot')){ 
      newDot.addClass('active-img-dot');
      currentDot.removeClass('active-img-dot');
      newImage.addClass('active-image');
      currentImage.removeClass('active-image');
      newCaption.addClass('active-caption');
      currentCaption.removeClass('active-caption');
    } 
  });

  $('.pagination-index li').click(function() {
    var index = $(this).index() + 1;
    var currentSlide = $('.active-page');
    var newSlide = $('.tekstarit-slider > div:nth-child(' + index + ')');
    var currentIndex = $('.active-index');
    var newIndex = $('.pagination-index > li:nth-child(' + index + ')');
    if (!newIndex.hasClass('active-index')){ 
      newIndex.addClass('active-index');
      currentIndex.removeClass('active-index');
      newSlide.addClass('active-page');
      currentSlide.removeClass('active-page');
    }
  });
$(".sidebar-item").hover(function(){
    var divToShow = $(this).find("div.PopupBox");
    var $window = $(window);
    var windowsize = $window.width();
        if (windowsize > 1400) {
    $(this).css('max-height', $(this).height());

    divToShow.css({
        display: "inline-block",
        position: "relative",
        left: "105%",
        top: (-$(this).height()) + "px"
    });
  } 
},
function(){
    $("div.PopupBox").hide();   
});
});

var buttonCounter = 0;
$(".btn").click(function(){
  
  if (buttonCounter%2 == 0){
    $(".related").css({
        padding: "0px",
        margin: "0px"
    });
  } else {
    $(".related").css({
        padding: "10px",
    });
  }
  buttonCounter++;
  $(".related ul").toggle();
});

$("#newest").click(function(){
  $("#display-month").removeClass("active");
  $("#display-new").addClass("active");
  $(this).addClass("active_teksti");
  $("#monthly").removeClass("active_teksti");
});

$("#monthly").click(function(){
  $("#display-month").addClass("active");
  $("#display-new").removeClass("active");
  $(this).addClass("active_teksti");
  $("#newest").removeClass("active_teksti");
});

$('.pagination-index li').click(function() {
    var index = $(this).index() + 1;
    var currentSlide = $('.pagination.active-page');
    var newSlide = $('#display-new > div:nth-child(' + index + ')');
    var currentIndex = $('.active-index');
    var newIndex = $('.pagination-index > li:nth-child(' + index + ')');
    if (!newIndex.hasClass('active-index')){ 
      newIndex.addClass('active-index');
      currentIndex.removeClass('active-index');
      newSlide.addClass('active-page');
      currentSlide.removeClass('active-page');
    }
  });

$('.pagination-index-2 li').click(function() {
    var index = $(this).index() + 1;
    var currentSlide = $('.pagination-2.active-page');
    var newSlide = $('#display-month > div:nth-child(' + index + ')');
    var currentIndex = $('.active-index');
    var newIndex = $('.pagination-index-2 > li:nth-child(' + index + ')');
    if (!newIndex.hasClass('active-index')){ 
      newIndex.addClass('active-index');
      currentIndex.removeClass('active-index');
      newSlide.addClass('active-page');
      currentSlide.removeClass('active-page');
    }
  });
/*
function moveScroller() {
    var move = function() {
        var mq = window.matchMedia( "(min-width: 500px)" );
        if (mq.matches) {
          var st = $(window).scrollTop();
          var nav = $("#scroller-anchor");
          if (nav.length) {
            var ot = $("#scroller-anchor").offset().top;
          }
          var s = $("#scroller");
          if(st > ot) {
              s.css({
                  position: "fixed",
                  top: "0px"
              });
          } else {
              if(st <= ot) {
                  s.css({
                      position: "relative",
                      top: ""
                  });
              }
          }
        }
    };
    $(window).scroll(move);
    move();
}


  });
*/ 
$('.menu-bars').click(function() {
  $('#menu-reimari').toggle();
});


(function($) {
    var $window = $(window),
        $menu = $('.menu-bars:nth-child(1)');

    function resize() {
        if ($window.width() < 1150) {
            return $menu.addClass('fa fa-bars');
        }
        var isHidden = $( "#menu-reimari" ).is( ":hidden" );
        if (($window.width() >= 1150) && (isHidden === true))  {
          $('#menu-reimari').toggle();
        }

        $menu.removeClass('fa fa-bars');
    }

    $window
        .resize(resize)
        .trigger('resize');
})(jQuery);


$('#tag-list ul li').mouseenter(function(){
  var originalwidth = $(this).children(':first').width();
  $(this).children(':first').css({width: '0px'});
  $(this).children(':first').animate({width: originalwidth}, 500);
});

// Making certain animiation finishes so the bar is the right width
$('#tag-list ul li').mouseleave(function(){
  $(this).children(':first').finish();
});
});
