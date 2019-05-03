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

	jQuery(document).ready(function(){

		// Click scroll down
		jQuery('.icon-down').on('click',function(e){
			e.preventDefault();
		    jQuery('html, body').animate({
		      	scrollTop: jQuery(".signup-email-form").offset().top
		    }, 500, 'swing')
		});



	});