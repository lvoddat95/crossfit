<?php
/**
 * Crossfit
 *
 * This file adds the breadcrumb section to the Crossfit Theme.
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}


/* Set up breadcrumb section.*/
add_action( 'genesis_before', 'func_crossfit_breadcrumb_section_setup' );
function func_crossfit_breadcrumb_section_setup() {

	// Remove default breadcrumb section.
	if (!is_single() || !is_singular()) {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	}
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_open', 5, 3 );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_close', 15, 3 );
	remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
	remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
	remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

}


/**
 * Integrate with Genesis Title Toggle plugin
 */
add_action( 'be_title_toggle_remove', 'func_crossfit_genesis_title_toggle' );
function func_crossfit_genesis_title_toggle() {

	remove_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_title', 10 );
	remove_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_excerpt', 20 );

}

/* Display title in breadcrumb section.*/
add_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_title', 10 );
function func_crossfit_page_title() { ?>
	<div class="page-title" style="background-image: url(<?php echo get_stylesheet_directory_uri(). '/assets/images/texture.png';?>);">
		<?php 
			// Add post titles back inside posts loop.
			if ( is_home() || is_archive() || is_category() || is_tag() || is_tax() || is_search() ) {
				add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );
			}

			if ( class_exists( 'WooCommerce' ) && is_shop() ) {

				genesis_markup( array(
					'open'    => '<h1 %s>',
					'close'   => '</h1>',
					'content' => get_the_title( wc_get_page_id( 'shop' ) ),
					'context' => 'entry-title',
				) );

			} elseif ( is_404() ) {

				genesis_markup( array(
					'open'    => '<h1 %s>',
					'close'   => '</h1>',
					'content' => apply_filters( 'genesis_404_entry_title', __( '404', 'crossfit' ) ),
					'context' => 'entry-title',
				) );

			} elseif ( is_search() ) {

				genesis_markup( array(
					'open'    => '<h1 %s>',
					'close'   => '</h1>',
					'content' => apply_filters( 'genesis_search_title_text', __( 'Search: ', 'crossfit' ) ) . get_search_query(),
					'context' => 'entry-title',
				) );

			} elseif ( is_single() ) {

			} elseif ( is_author() ) {
			    $author = get_queried_object();
			    $author_title = $author->display_name;
			    genesis_markup( array(
					'open'    => '<h1 %s>',
					'close'   => '</h1>',
					'content' => apply_filters( 'genesis_author_entry_title', __( 'Author: ', 'crossfit' ) ). $author_title,
					'context' => 'entry-title',
				) );

			} else { 

				genesis_do_post_title();

			}
		?>
	</div>
<?php
}

/* Display page excerpt.*/
add_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_excerpt', 20 );
function func_crossfit_page_excerpt() {

	if( class_exists('ACF') )  {

		$brc_subtitle = get_field('brc_subtitle');
		$brc_desc = get_field('brc_desc');
		$icon_down = get_field('icon_down');

		if ($brc_subtitle) printf( '<span class="subtitle">%s</span>', $brc_subtitle);
		if ($brc_subtitle) printf( '<p itemprop="description">%s</p>', $brc_desc);
	 	if ($icon_down) echo '<a href="javascript:;" class="icon-down"><img class="icon" src="' . wp_get_attachment_url( $icon_down ) . '" alt="scroll down"/></a>';
	}
}

function crf_breadcrumb_featured_image() {
	$breadcrumb_default = get_field('crf_theme_brc','option');
    if ( !is_single() ) {

	    $id = get_queried_object_id ();

        if ( has_post_thumbnail( $id ) && !is_search()) {

            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );

            $url = $image[0];

        } else {

		$url = get_stylesheet_directory_uri() . '/assets/images/breadcrumbs.jpg';
		if ($breadcrumb_default) $url = $breadcrumb_default;

        }

    }else{

    	$url = get_stylesheet_directory_uri() . '/assets/images/breadcrumbs.jpg';
		if ($breadcrumb_default) $url = $breadcrumb_default;

    }

    return $url;
}





/* Display the breadcrumb section.*/
add_action( 'genesis_before_content_sidebar_wrap', 'func_crossfit_breadcrumb_section' );
function func_crossfit_breadcrumb_section() {
	$bg_mobile = get_field('bg_mobile');
	$attr= '';
	if ($bg_mobile) $attr = 'data-cover="'.$bg_mobile.'"';
	echo '<section class="breadcrumb-section" 
			'.$attr.'
			data-brc="'.crf_breadcrumb_featured_image().'"
			style="background-image: url('.crf_breadcrumb_featured_image().');">
			<div class="container">
				<div class="brc-inner">';

	/**
	 * Do breadcrumb section hook.
	 *
	 * @hooked func_crossfit_page_title - 10
	 * @hooked func_crossfit_page_excerpt - 20
	 */
	do_action( 'func_crossfit_breadcrumb_section' );

	echo '</div>
		</div>
	</section>';

}
