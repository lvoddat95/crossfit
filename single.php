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


add_action( 'genesis_entry_content', 'crf_single_featured_image', 1 );
function crf_single_featured_image() {		
	$html = '';
	global $post;
	if(empty($size)) $size = 'full';
	if (has_post_thumbnail()) {
        $html .= '<div class="single-post-thumb banner-advs">
                    '.get_the_post_thumbnail(get_the_ID(),$size).'                
                </div>';
    }
    if(!empty($html)) echo apply_filters('crf_output_content',$html);
}

add_action( 'genesis_entry_content', 'crf_single_social_share', 2 );
function crf_single_social_share() {		
	$html = '';
	$html .= 
	'<div class="single-share">
		<ul>
			<li>
				<a target="_blank" title="Share on Facebook" href="'.esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink()).'">
					<img src="'.get_stylesheet_directory_uri() . '/assets/images/share/fb.png" alt="Facebook Icon">
				</a>
			</li>
			<li>
				<a target="_blank" title="Share on Twitter" href="'.esc_url('http://www.twitter.com/share?url='.get_the_permalink()).'">
					<img src="'.get_stylesheet_directory_uri() . '/assets/images/share/tw.png" alt="Twitter Icon">
				</a>
			</li>
			<li>
				<a target="_blank" title="Share on Pinterest" href="'.esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.wp_get_attachment_url(get_post_thumbnail_id())).'">
					<img src="'.get_stylesheet_directory_uri() . '/assets/images/share/pt.png" alt="Pinterest Icon">
				</a>
			</li>
			<li>
				<a target="_blank" title="Share on Mail" href="mailto:?subject='.esc_attr__("I wanted you to see this site&amp;body=Check out this site","crossfit").' '.get_the_permalink().'">
					<img src="'.get_stylesheet_directory_uri() . '/assets/images/share/mail.png" alt="Mail Icon">
				</a>
			</li>
		</ul>
		<span>'.esc_html__( 'Share', 'crossfit' ).'</span>
	</div>';
	if(!empty($html)) echo apply_filters('crf_output_content',$html);
}


genesis();
