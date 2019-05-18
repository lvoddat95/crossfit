<?php
/**
 * Crossfit.
 *
 * A template to force content sidebar layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Blog
 *
 * @package Crossfit
 * @author  MaiTemcrossfit
 */

// Force Content-Sidebar Layout
add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );

// Add body class
add_filter( 'body_class', 'crf_blog_body_class' );
function crf_blog_body_class( $classes ) {
	$classes[] = 'blog-template';
	return $classes;
}
remove_action( 'genesis_before_content_sidebar_wrap', 'func_crossfit_breadcrumb_section' );

remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'crf_custom_loop' );
function crf_custom_loop() {
	global $post,$wp_query;

	$size = get_field('blog_size','option');
	if(empty($size)) $size = array(420,240);

	$excerpt = get_field('blog_excerpt','option');

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => $wp_query->query_vars['posts_per_page'],
		'post_status'    => 'publish',
		'paged'          => get_query_var( 'paged' )
	);
	global $wp_query;
	$wp_query = new WP_Query( $args );
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); ?>
				<div class="list-col-item list-2-item list-post">
				    <div class="item-post">
				    	<?php if(has_post_thumbnail()):?>
					        <div class="post-thumb banner-advs zoom-image">
					            <a href="<?php echo esc_url(get_the_permalink())?>" class="adv-thumb-link">
					                <?php echo get_the_post_thumbnail(get_the_ID(),$size)?>
					            </a>
					        </div>
					    <?php endif;?>
					    <div class="post-info">
					    	<ul class="list-inline-block post-meta-data">
			                    <li class="meta-author">
			                        <span><?php esc_html_e("By",'crossfit'); ?></span>
			                        <a class="text-capitalize" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a>
			                    </li>
			                    <li class="meta-date"> 
			                        <?php echo get_the_date()?>
			                    </li>
			                </ul>    
					        <h3 class="post-title">
					            <a class="black" href="<?php echo esc_url(get_the_permalink()); ?>">
					            	<?php the_title()?>
					                <?php echo (is_sticky()) ? '<i class="dashicons dashicons-admin-post"></i>':''?>
					            </a>
					        </h3>

					        <?php if($excerpt) : ?>
								<div class="desc">
									<?php if($excerpt) echo '<p class="desc">'.crf_substr(get_the_excerpt(),0,(int)$excerpt).'</p>';?>
								</div>
							<?php endif; ?>

					        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="readmore"><?php esc_html_e("Read more","crossfit")?></a>
					    </div>
				    </div>
				</div>
			<?php
		endwhile;
		do_action( 'genesis_after_endwhile' );
	endif;
	wp_reset_query();
}

genesis();