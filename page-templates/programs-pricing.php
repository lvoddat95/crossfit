<?php
/**
 * Crossfit.
 *
 * Display to Programs/Pricing page. A template to force full-width layout, no-sidebar.
 *
 * Template Name: Programs/Pricing
 *
 * @package Crossfit
 * @author  MaiTemcrossfit
 */


// Forces full width content layout.
add_filter('genesis_site_layout', '__genesis_return_full_width_content');

add_action( 'genesis_entry_content', 'crf_entry_content_program_pricing', 12 );
function crf_entry_content_program_pricing() { 
        // $ = get_field('');
        // extract($);

    ?>
	
		<div class="crf-pp-section-1">
			
		</div>
		<div class="crf-pp-section-2">
			
		</div>
		<div class="crf-pp-section-3">
			
		</div>
		<div class="crf-pp-section-4">
			
		</div>
		<div class="crf-pp-section-5">
			
		</div>
		<div class="crf-pp-section-6">
			
		</div>
		<div class="crf-pp-section-7">
			
		</div>




	<?php
}


// Runs the Genesis loop.
genesis();
