/**
 * Crossfit entry point.
 *
 * @package GenesisSample\JS
 * @author  MaiTem
 * @license 
 */

var genesisSample = ( function( $ ) {
	'use strict';

	/**
	 * Adjust site inner margin top to compensate for sticky header height.
	 *
	 * @since 2.6.0
	 */
	var moveContentBelowFixedHeader = function() {
		var siteInnerMarginTop = 0;

		if ( 'fixed' === $( '.site-header' ).css( 'position' ) ) {
			siteInnerMarginTop = $( '.site-header' ).outerHeight();
		}

		$( '.site-inner' ).css( 'margin-top', siteInnerMarginTop );
	},

	/**
	 * Initialize Crossfit.
	 *
	 * Internal functions to execute on full page load.
	 *
	 * @since 2.6.0
	 */
	load = function() {
		moveContentBelowFixedHeader();

		$( window ).resize( function() {
			moveContentBelowFixedHeader();
		});

		// Run after the Customizer updates.
		// 1.5s delay is to allow logo area reflow.
		if ( 'undefined' != typeof wp && 'undefined' != typeof wp.customize ) {
			wp.customize.bind( 'change', function( setting ) {
				setTimeout( function() {
					moveContentBelowFixedHeader();
				}, 1500 );
			});
		}
	};

	// Expose the load and ready functions.
	return {
		load: load
	};

}( jQuery ) );

jQuery( window ).on( 'load', genesisSample.load );

(function($){
    "use strict"; // Start of use strict  

    function background_cover_mobile(){
		var img=$('.breadcrumb-section');
    	if($(window).width()<600){
			img.css('background-image', function () {
				console.log(img.attr('cover') !== undefined);
			});
		}else{
			img.css('background-image', function () {
				if(typeof img.attr('url') !== undefined && img.attr('url') !== false) {
			    	var bg = ('url(' + $(this).data('brc') + ')');
			    }
			    return bg;
			});
		}
	}


	function header_fixed(){
		if($('.menu-sticky').length > 0 && $(window).width()>1024){   
		    if ($(window).scrollTop() >= 300) {
		        $('.site-header').addClass('fixed-header');
		    }
		    else {
		        $('.site-header').removeClass('fixed-header');
		    }
		}
	}

	function gallery(){
	  // Define App Namespace
	    var popup = {
	    	// Initializer
	    	init: function() {
	      		popup.popupImage();
	    	},
		    popupImage : function() {
				/* Image Popup*/ 
			 	$('#gal').magnificPopup({
			    	delegate: 'a',
			    	type: 'image',
			    	mainClass: 'mfp-fade',
			    	removalDelay: 160,
			    	preloader: false,
			    	fixedContentPos: false,
			    	gallery: {
			        	enabled:true
			        }
			   	});
		    }
	    };
	  	popup.init($);
	}

	$(document).ready(function(){
		background_cover_mobile();
		gallery();

		// Click scroll down
		$('.icon-down').on('click',function(e){
			e.preventDefault();
		    $('html, body').animate({
		      	scrollTop: $(".signup-email-form").offset().top
		    }, 500, 'swing')
		});



	});

	$(window).load(function(){
	  	if ($('#gal').length > 0 ) {
		  	$('#gal').masonry({
		    	itemSelector: '.gal-item'
		  	})
		}
	  	if ($('.blog-masonry').length > 0 ) {
			$('.content > .blog-masonry').masonry({
		    	itemSelector: '.list-post'
		  	})
		}

	})


	$(window).scroll(function(){
		header_fixed();
	});


	$(window).resize(function(){
	   background_cover_mobile();
	});


})(jQuery);