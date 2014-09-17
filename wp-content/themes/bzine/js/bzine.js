jQuery.noConflict();
var $=jQuery.noConflict();

(function($) {
	"use strict";
	//var defaults = {};
	
	$.fn.mtcimgfluid = function() {
		this.each(function(i){
			flx($(this));
		});
	};
	
	var flx = function(t){
		var h = t.height();
		var w = t.width();
		var p = t.parent();
		var ph= p.height();
		var pw= p.width();
		
		if(h < ph){
			t.removeAttr('width');
			t.removeAttr('height');
			t.height(ph);
			t.width((ph/h) * w);
			t.css('maxWidth','999px')
		}
	}
	
})(jQuery);






jQuery(function () {

	"use strict";
	
	$(document).ready(function(){
		if ($("#content-home-2").size()){
			/* Add Masonry layout on home 2 */
			var $container = $('#content-home-2');
			// initialize Masonry after all images have loaded  
			$container.imagesLoaded( function() {
			  $container.masonry();
			});

		}
	});
	
	
				
	/* 
	$('.post-list, .list_post, .products .product, .post_row, .widget').waypoint(function(direction) {
		$(this).addClass('animated fadeInDown');
	}, {
		offset: '80%' // Apply "stuck" when element 30px from top
	});  */

	
	
	/* Add tool tip on news picture */
	$('.list_mini a, .news-pict-v3 a').tooltip();
	
	$( document ).ready(function() {
		$('.list-v3-large img, .thumb-v1 img,.tab_list_thumb img').mtcimgfluid();
	});
	
	
	/* Fix responsive videos */
	Fluidvids.init({
		selector: ['iframe','video'],
		players: ['www.youtube.com', 'player.vimeo.com']
	});
	
	
	
	/* add  fancybox to gallery default where click*/
	$(".gallery-icon a").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
	
	
	
	/* slider to news scrool video bigger */
	$('.box_list_home').bxSlider({
		slideWidth: 400,
		minSlides: 2,
		maxSlides: 2,
		pager:true,
		pagerSelector: '#news-latest',
		adaptiveHeight:true,
		controls:false,
		responsive: true,
		slideMargin: 20 
	});
	

	
	/* slider to news scrool video small  */
	$('#latest_vid').bxSlider({
		slideWidth: 133,
		minSlides: 2,
		maxSlides: 5,
		pager:true,
		pagerSelector: '#latest2',
		adaptiveHeight:true,
		responsive: true,
		controls:false,
		slideMargin: 17 
	}); 
	
	
	
	/*  fixed mainmenunav if scroll down*/
	//$("._main_navigation").sticky({ topSpacing: 0 });
	
	
	
	/* News Ticker */
	$('#js-news').ticker({
		controls	: false,
		displayType	: bzine.news_ticker_animation,
		debugMode	: true,
		titleText	: ''
	});
	
	
	
	if ($('.box-list-vid-v3').size()){
		$(".box-list-vid-v3").carouFredSel({
			width	: '100%',
			auto: false,
			items	: 3,
			scroll	: 3,
			prev    : {
				button  : "#vid-v3_prev",
				key     : "left"
			},
			next    : {
				button  : "#vid-v3_next",
				key     : "right"
			}
		});
	}
	
	
	
	if ($('#latest-2').size()){
		$("#latest-2").carouFredSel({
			width	: '100%',
			auto: false,
			items	: 2,
			scroll	: 2,
			prev    : {
				button  : "#latest-2_prev",
				key     : "left"
			},
			next    : {
				button  : "#latest-2_next",
				key     : "right"
			}
		});
	}
	
	if ($('.foo2').size()){
		$(".foo2").carouFredSel({
			width	: 1080,
			items	: 4,
			scroll	:  {
				duration : 1,
				timeoutDuration : parseInt(bzine.slider_timeoutDuration), 
				pauseOnHover : true,
				items     : 4
			},
			prev    : {
				button  : "#foo2_prev",
				key     : "left"
			},
			next    : {
				button  : "#foo2_next",
				key     : "right"
			}
		});
	}
	
	
	
	
	/* Slideshow 3 */
	if ($('#carousel-3 div').size()){
		var $imgs = $('#carousel-3 div'), $capt3 = $('#captions-3 .list_c'), $timer = $('#timer');
		$imgs.carouFredSel({
			circular: true,
			responsive: true,
			width: "100%",
			auto:true,
			items		: {
				width: 1080,
				height  : "460", 
				visible	: 1
			},
			scroll: {
				fx : bzine.slider_effect, // directscroll , crossfade, cover-fade  	
				easing : 'swing',
				duration : 1,
				pauseOnHover : true,
				timeoutDuration : parseInt(bzine.slider_timeoutDuration), 
				onAfter : function( data ){
					
				},
				onBefore : function( data ) {
					$capt3.trigger( data.scroll.direction);
				}
			},
			onCreate: function (data) {
				
				
			},
			pagination: ".pager",
			prev: {
				button: $('.nav-prev'),
				key:'left'
			},
			next: {
				button: $('.nav-next'),
				key:'right'
			}
		});	 
		
		$capt3.carouFredSel({
			circular: true,
			auto: false,
			responsive: true,
			width: '100%',
			scroll: {
				easing	: 'quadratic',
				duration: 1,
				fx		: bzine.slider_effect
			}
		});
	}
	
	
	
	
	/* Slideshow Home 1 
	*************************************************************************************/
	if ($('#carousel div').size()){
		var $imgs = $('#carousel div'), $capt = $('#captions .list_c'), $timer = $('#timer');
		$imgs.carouFredSel({
			circular: true,
			responsive: true,
			items		: {
				width	: 760,
				height  : "56.5789473684%", // 480 	
				visible	: 1
			},
			scroll: {
				fx : bzine.slider_effect, // directscroll , crossfade, cover-fade  	
				easing : 'swing',
				duration : 1,
				pauseOnHover : true,
				timeoutDuration : parseInt(bzine.slider_timeoutDuration), 
				onBefore : function( data ) {
					$capt.trigger( data.scroll.direction);
					$timer.stop().animate({opacity: 0}, data.scroll.duration); 	
				},
				onAfter : function() {
					$timer.stop().animate({ opacity: 1}, 150); 	
				}
			},
			auto: {
				progress: '#timer'
			},
			pagination: ".pager",
			prev: {
				button: $('.nav-prev'),
				key:'left'
			},
			next: {
				button: $('.nav-next'),
				key:'right'
			}
		});	 
		
		$capt.carouFredSel({
			circular: true,
			auto: false,
			responsive: true,
			width: '100%',
			height: 'variable',
			scroll: {
				easing	: 'quadratic',
				duration: 1,
				fx		: bzine.slider_effect
			}
		});
	}
	
	  
});









jQuery(function () {
	
	"use strict";
	
	jQuery("<select />").appendTo("#dropmenu");
	jQuery("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Go to..."
	}).appendTo("#dropmenu select");
	
	jQuery(".main-navigation").children('ul').children('li').each(function() {
		var href = jQuery(this).children('a').attr('href');
        var text = jQuery(this).children('a').text();
		
		/* Append this option to our "select" */
         jQuery('#dropmenu select').append('<option value="'+href+'">'+text+'</option>');
		 
         /* Check for "children" and navigate for more options if they exist */
         if (jQuery(this).children('ul').length > 0) {
            jQuery(this).children('ul').children('li').each(function() {
               /* Get child-level link and text */
               var href2 = jQuery(this).children('a').attr('href');
               var text2 = jQuery(this).children('a').text();
			   
               /* Append this option to our "select" */
               jQuery('#dropmenu select').append('<option value="'+href2+'">--- '+text2+'</option>');
            });
         }
		 
		 //make responsive dropdown menu actually work			
		jQuery("#dropmenu select").change(function() {
			window.location = jQuery(this).find("option:selected").val();
		});
	
	});
	
	
	/* fade in #back-top */
	/* Default hide button */
	jQuery("#back-top").hide();
	
	/* show hide button if condition */
	jQuery(window).scroll(function () {
	
		if (jQuery(this).scrollTop() > 200) {
		
			jQuery("#back-top").fadeIn();
			
		} else {
		
			jQuery("#back-top").fadeOut();
		}
		
	});
	
	/* scroll body to 0px on click */
	jQuery("#back-top a").click(function () {
		jQuery("body,html").animate({ scrollTop: 0 }, 800 );
		return false;
	});
});

/* popup share post */
function social_share(data) {
    window.open( data, "fbshare", "height=450,width=760,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" );
}