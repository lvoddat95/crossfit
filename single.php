<?php

// Force Content-Sidebar Layout
add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );

// Add body class
add_filter( 'body_class', 'crf_blog_body_class' );
function crf_blog_body_class( $classes ) {
	$classes[] = 'single-page';
	return $classes;
}

remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );


add_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
add_action( 'genesis_entry_header', 'genesis_do_post_title', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info');
add_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );


remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


add_filter( 'genesis_post_info', 'crf_post_info_filter' );
function crf_post_info_filter($post_info) {
	$post_info = '[post_date] by [post_author_posts_link]';
	return $post_info;
}


add_action( 'genesis_entry_content', 'themeprefix_featured_image', 1 );
function themeprefix_featured_image() {		
	$data = '';
	global $post;
	if(empty($size)) $size = 'full';
	if (has_post_thumbnail()) {
        $data .= '<div class="single-post-thumb banner-advs">
                    '.get_the_post_thumbnail(get_the_ID(),$size).'                
                </div>';
    }
    if(!empty($data)) echo apply_filters('crf_output_content',$data);
}


genesis();
