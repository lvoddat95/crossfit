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
        $crf_pp_sec_1 = get_field('crf_pp_sec_1'); extract($crf_pp_sec_1);
        $crf_pp_sec_2 = get_field('crf_pp_sec_2'); extract($crf_pp_sec_2);
        $crf_pp_sec_3 = get_field('crf_pp_sec_3'); extract($crf_pp_sec_3);
        $crf_pp_sec_4 = get_field('crf_pp_sec_4'); extract($crf_pp_sec_4);
        $crf_pp_sec_5 = get_field('crf_pp_sec_5'); extract($crf_pp_sec_5);
    ?>
		<div class="crf-pp-section-1">
			<div class="container">
				<div class="sec-inner">
					<h3 class="sec-title"><?php if ($crf_title_light_1) echo esc_html( $crf_title_light_1 ); ?><strong><?php if ($crf_title_bold_1) echo esc_html( $crf_title_bold_1 ); ?></strong></h3>
					<div class="pp_sec-content">
						<?php if ($crf_content_html_1): ?>
							<?php echo apply_filters('s7upf_output_content',$crf_content_html_1);?>
						<?php endif ?>
					</div>
					<?php if ($crf_pp_btn_title_1) :?>
					<div class="wrap-button">
						<a class="btn-crossfit" href="<?php echo esc_html($crf_pp_btn_url_1) ?>"><?php echo esc_html($crf_pp_btn_title_1) ?></a>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div><!-- #crf-pp-section-1 -->

		<div class="crf-pp-section-2">
			<div class="container">
				<div class="pp_sec-wrap">
					<div class="pp_sec2-img-left">
						<?php if ($crf_pp_img_2)  echo '<img src="' . wp_get_attachment_url($crf_pp_img_2) . '"/>'; ?>
					</div>
					<div class="pp_sec2-content-right">
						<h3 class="sec-title text-left"><?php if ($crf_title_light_2) echo esc_html( $crf_title_light_2 ); ?><strong><?php if ($crf_title_bold_2) echo esc_html( $crf_title_bold_2 ); ?></strong></h3>
						<?php if ($crf_content_html_2): ?>
							<?php echo apply_filters('s7upf_output_content',$crf_content_html_2);?>
						<?php endif ?>
					</div>
					<?php if ($crf_pp_btn_title_2) :?>
					<div class="wrap-button text-center">
						<a class="btn-crossfit" href="<?php echo esc_html($crf_pp_btn_url_2) ?>"><?php echo esc_html($crf_pp_btn_title_2) ?></a>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div><!-- #crf-pp-section-2 -->

		<div class="crf-pp-section-3" style="background-image: url(<?php echo wp_get_attachment_image_src( $crf_bg_content_3,'full')[0];?>);">
			<div class="container">
				<div class="pp_sec-wrap">
					<h3 class="sec-title text-left black"><?php if ($crf_title_light_3) echo esc_html( $crf_title_light_3 ); ?><strong><?php if ($crf_title_bold_3) echo esc_html( $crf_title_bold_3 ); ?></strong></h3>
					<div class="row">
						<div class="col-sm-7 col-xs-12">
							<div class="pp_sec3-content">
								<?php if ($crf_content_html_3): ?>
									<?php echo apply_filters('s7upf_output_content',$crf_content_html_3);?>
								<?php endif ?>
							</div>
							<?php if ($crf_pp_btn_title_3) :?>
							<div class="wrap-button">
								<a class="btn-crossfit btn-white" href="<?php echo esc_html($crf_pp_btn_url_3) ?>"><?php echo esc_html($crf_pp_btn_title_3) ?></a>
							</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- #crf-pp-section-3 -->

		<div class="crf-pp-section-4">
			<div class="container">
				<div class="pp_sec-wrap">
					<h3 class="sec-title black"><?php if ($crf_title_light_4) echo esc_html( $crf_title_light_4 ); ?><strong><?php if ($crf_title_bold_4) echo esc_html( $crf_title_bold_4 ); ?></strong></h3>
					<div class="pp_sec4-content ">
						<?php if ($crf_pp_gal): ?>
							<div id="gal" class="gal-wrap">
								<?php foreach( $crf_pp_gal  as $key => $image ): ?>
									<div class="photo gal-item gal-item<?php echo $key; ?>"> 
										<a href="<?php echo esc_url($image['url']); ?>" class="mfp_lightbox" >
			                            <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
										</a>
									</div>
		                        <?php endforeach; ?>
	                        </div>
						<?php endif ?>
					</div>
					<?php if ($crf_pp_btn_title_4) :?>
					<div class="clearfix"></div>
					<div class="wrap-button text-center">
						<a class="btn-crossfit" href="<?php echo esc_html($crf_pp_btn_url_4) ?>"><?php echo esc_html($crf_pp_btn_title_4) ?></a>
					</div>
					<?php endif ?>
				</div>
				
			</div>
		</div><!-- #crf-pp-section-4 -->

		<div class="crf-pp-section-5">
			<div class="container">
				
			</div>
		</div><!-- #crf-pp-section-5 -->

		<div class="crf-pp-section-6">
			<div class="container">
				
			</div>
		</div><!-- #crf-pp-section-16 -->

		<div class="crf-pp-section-7">
			<div class="container">
				
			</div>
		</div><!-- #crf-pp-section-7 -->


	<?php
}


// Runs the Genesis loop.
genesis();
