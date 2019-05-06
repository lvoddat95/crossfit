<?php
/**
 * Crossfit.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Event Name
 *
 * @package Crossfit
 * @author  MaiTemcrossfit
 */


// Forces full width content layout.
add_filter('genesis_site_layout', '__genesis_return_full_width_content');

add_action( 'genesis_entry_content', 'crf_entry_content_event_name', 12 );
function crf_entry_content_event_name() { 
    
	$section_event = get_field('section_event');
	extract($section_event);

	if(empty($size))
		$size= array(300,300);

?>

<div class="section-event">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12">
				<div class="wrap1 text-center">
				<div class="img-wrap event-img1">
					<?php if ($event_img1) echo '<img src="' . wp_get_attachment_image($event_img1,$size,false); ?>
				</div>
				<div class="content-wrap event-content1">
					<?php if($event_content1) echo esc_html($event_content1); ?>

				</div>
				</div>
				<div class="event-title"><h2><?php if($event_title) echo esc_html($event_title); ?></h2>
				</div>


				<div class="row wrap1">
					<div class="col-lg-6 col-md-6 col1-content">
						<div class="event-title1">
							<h2><?php if($event_title1) echo esc_html($event_title1); ?></h2>
						</div>
						<div class="wrap-content-col-1">
							<h3 class="title-1a">
								<?php if($event_title1a) echo esc_html($event_title1a); ?>
								
							</h3>
							<div class="content-1a">
								<?php if($event_content1a) echo esc_html($event_content1a); ?>
							</div>
							<h3 class="title-1b">
								<?php if($event_title1b) echo esc_html($event_title1b); ?>
							</h3>
							<div class="content-1b">
								<?php if($event_content1b) echo esc_html($event_content1b); ?>
							</div>
						</div>
					
					</div>
					<div class="col-lg-6 col-md-6 col2-img">
						<div class="img-wrap event-img2">
							<?php if ($event_img2) echo '<img src="' . wp_get_attachment_image($event_img2,$size,false); ?>
						</div>
					</div>
					<div class="last-row1">
						<h3><?php if($last_row1) echo esc_html($last_row1); ?></h3>
					</div>
				</div>

				<div class="row wrap2">
					<div class="event-title2"><h2>
						<?php if($event_title2) echo esc_html($event_title2); ?>
							</h2>
					</div>
					<div class="event-2a">
							<h3 class="event-title2a"><?php if($event_title2a) echo esc_html($event_title2a); ?></h3>

						<?php if($event_content2a) echo esc_html($event_content2a); ?>
					</div>
					<div class="event-2b">
						<h3 class="event-title2b">
							<?php if($event_title2a) echo esc_html($event_title2a); ?></h3>
						
						<?php if($event_content2b) echo esc_html($event_content2b); ?>
					</div>
					<div class="event-2c">
						<h3 class="event-title2c">
							<?php if($event_title2c) echo esc_html($event_title2c); ?></h3>

						<?php if($event_content2c) echo esc_html($event_content2c); ?>
					</div>

				</div>

				<div class="row wrap3">
					<div class="col-md-6 col-lg-6 col-xs-6">
						<div class="img-wrap event-img3">
						<?php if ($event_img3) echo '<img src="' . wp_get_attachment_image($event_img3,$size,false); ?>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 col-xs-6">
						<div class="event-title3">
							<h2>
								<?php if($event_title3) echo esc_html($event_title3) ?>
							</h2>
							<div class="event-content3a">
								<?php if($event_content3a) echo esc_html($event_content3a); ?>
							</div>
						</div>
						
					</div>
					
					
				</div>
				<div class=" row event-content3b">
						<?php if($event_content3b) echo esc_html($event_content3b); ?>

					</div>
				<div class="row event-button">
					<?php if ($event_button_text): ?>
                            <a class="btn-event"
                               href="<?php echo esc_html($event_button_url); ?>"><?php echo esc_html($event_button_text); ?></a>
                        <?php endif; ?>
				</div>


			</div>


		</div>
	</div>
	


</div>




<?php    
}
genesis();