jQuery(function($){
	  //toggle class open on button navbar menu
  $('#exCollapsingNavbar').on('hide.bs.collapse', function () {
    $('.navbar-toggler').removeClass('open');
  })
  $('#exCollapsingNavbar').on('show.bs.collapse', function () {
    $('.navbar-toggler').addClass('open');
  })
	//icon heart hoggle
	$(".wish-icon i").click(function(){
			$(this).toggleClass("fa-heart fa-heart-o");
		});	
  	// Add minus icon for collapse element which is open by default
		$(".collapse.show").each(function(){
			$(this).siblings(".card-header").find(".btn i").addClass("fa-minus").removeClass("fa-plus");
		});
		
		// Toggle plus minus icon on show hide of collapse element
		$(".collapse").on('show.bs.collapse', function(){
			$(this).parent().find(".card-header .btn i").removeClass("fa-plus").addClass("fa-minus");
		}).on('hide.bs.collapse', function(){
			$(this).parent().find(".card-header .btn i").removeClass("fa-minus").addClass("fa-plus");
		});

	 // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
	if ( $('.product__slider-main').length ) {
  var $slider = $('.product__slider-main')
    .on('init', function(slick) {
      $('.product__slider-main').fadeIn(1000);
      clrbx();
    })
    .slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        lazyLoad: 'ondemand',
        autoplaySpeed: 3000,
        asNavFor: '.product__slider-thmb'
    });

  
  var thumbnailsSlider = $('.product__slider-thmb')
    .on('init', function(slick) {
      $('.product__slider-thmb').fadeIn(1000);
    })
    .slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      lazyLoad: 'ondemand',
      asNavFor: '.product__slider-main',
      dots: false,
      centerMode: false,
      focusOnSelect: true
    });

   //remove active class from all thumbnail slides
  $('.product__slider-thmb .slick-slide').removeClass('slick-active');

   //set active class to first thumbnail slides
  $('.product__slider-thmb .slick-slide').eq(0).addClass('slick-active');

   // On before slide change match active thumbnail to current slide
  $('.product__slider-main').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      var mySlideNumber = nextSlide;
      $('.product__slider-thmb .slick-slide').removeClass('slick-active');
      $('.product__slider-thmb .slick-slide').eq(mySlideNumber).addClass('slick-active');
});
  
  // init slider
  //require(['js-sliderWithProgressbar'], function(slider) {
    $('.product__slider-main').each(function() {
      //var sldr = new slider($(this), options, sliderOptions, previewSliderOptions);
    });
  //});
  
  var options = {
    progressbarSelector    : '.bJS_progressbar'
    , slideSelector        : '.bJS_slider'
    , previewSlideSelector : '.bJS_previewSlider'
    , progressInterval     : ''
    , onCustomProgressbar : function($slide, $progressbar) {}
  }
  
  var sliderOptions = {
    slidesToShow   : 1,
    slidesToScroll : 1,
    arrows         : false,
    fade           : true,
    autoplay       : true
  }

  var previewSliderOptions = {
    slidesToShow   : 3,
    slidesToScroll : 1,
    dots           : false,
    focusOnSelect  : true,
    centerMode     : true
  }
  
  // Colorbox
  function clrbx() {
    /*var $slides = $('.product__slider--lghtbox .slide img');
    console.log($slides);
    $('.product__slider--lghtbox .slide img').colorbox({
      rel: 'cboxElement',
    });*/
    
    
    $('.product__slider-main .slick-slide').each(function(){
      
    });
    
    //$('.product__slider-main .slick-slide').each()
  }
}
$('.nav li').click(function(){
$('.nav li').removeClass('active');
$(this).addClass('active');
})
	
//scroll top
	$(function(){
 
    $(document).on( 'scroll', function(){
 
    	if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});
 