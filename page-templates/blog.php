<?php
/**
 * Crossfit.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Blog
 *
 * @package Crossfit
 * @author  MaiTemcrossfit
 */

 
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_loop' ); // Add custom loop
 
function custom_do_loop() {
 
  // Intro Text (from page content)
	echo '<div class="page hentry entry">';
	echo '<h1 class="entry-title">'. get_the_title() .'</h1>';
	echo '<div class="entry-content">';
		the_content();
	echo '</div><!-- end .entry-content -->';
 
global $post;
 
	// arguments, adjust as needed
	$args = wp_parse_args(
		genesis_get_custom_field( 'query_args' ),
		array(
		'post_type'      => 'post',
		'posts_per_page' => 4,
		'post_status'    => 'publish',
		'cat'		 	 => $include,
		'paged'          => get_query_var( 'paged' ) )
	);
 
	global $wp_query;
	$wp_query = new WP_Query( $args );
 
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); 
 
			echo '<div class="rgc-featured-image">';
				echo '<h3> <a href="' . get_permalink() .'"> '. get_the_title() .' </a> </h3>'; // show the title
				echo '<a href="' . get_permalink() .'" title="' . the_title_attribute( 'echo=0' ) . '">'; // Original Grid
				echo get_the_post_thumbnail($thumbnail->ID, 'portfolio' );
				echo '</a>';
			echo '</div>';
 
		endwhile;
		do_action( 'genesis_after_endwhile' );
	endif;
 
	wp_reset_query();
}
 
genesis();