<?php

// Force Content-Sidebar Layout
add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );

// Add body class
add_filter( 'body_class', 'crf_blog_body_class' );
function crf_blog_body_class( $classes ) {
	$classes[] = 'single-page';
	return $classes;
}


genesis();
