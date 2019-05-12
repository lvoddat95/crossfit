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
        $crf_pp_sec_6 = get_field('crf_pp_sec_6'); extract($crf_pp_sec_6);
        $crf_pp_sec_7 = get_field('crf_pp_sec_7'); extract($crf_pp_sec_7);

        $inline_css = "	.crf_pp_table table { 
					    	background-image: url('$crf_wtm_table'); 
					    }
	    			";
		wp_add_inline_style( 'crossfit-theme', $inline_css );
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
						<div class="col-md-7 col-sm-12 col-xs-12">
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
				<div class="pp_sec-wrap">
					<div class="sec-title sec-title-desc white">
						<h3 class="title51 white no-margin"><?php if ($crf_title_light_5) echo esc_html( $crf_title_light_5 ); ?><strong><?php if ($crf_title_bold_5) echo esc_html( $crf_title_bold_5 ); ?></strong></h3>
						<p class="title30 desc white"><?php if ($crf_subtitle_5) echo esc_html( $crf_subtitle_5 ); ?></p>
					</div>
					<div class="crf_pp_table">
						<?php 
							if ( ! empty ( $crf_schedule_table )) {

							    echo '<table border="0" class="table-responsive table-customize">';
							    	if ( ! empty( $crf_schedule_table['caption'] ) ) {
							            echo '<caption>' . $crf_schedule_table['caption'] . '</caption>';
							        }
							        if ( $crf_schedule_table['header'] ) {

							            echo '<thead>';

							                echo '<tr>';

							                    foreach ( $crf_schedule_table['header'] as $th ) {

							                        echo '<th>';
							                            echo '<span>'.$th['c'].'</span>';
							                        echo '</th>';
							                    }

							                echo '</tr>';

							            echo '</thead>';
							        }

							        echo '<tbody>';

							            foreach ( $crf_schedule_table['body'] as $tr ) {

							                echo '<tr>';

							                    foreach ( $tr as $key => $td ) {

							                        echo '<td data-title="' . $crf_schedule_table['header'][ $key ]['c'] . '">';
							                            echo '<span>'.$td['c'].'</span>';
							                        echo '</td>';
							                    }

							                echo '</tr>';
							            }

							        echo '</tbody>';

							    echo '</table>';
							}
						 ?>
					</div>

					<div class="pp_sec5-content">
						<?php if ($crf_content_html_5): ?>
							<?php echo apply_filters('s7upf_output_content',$crf_content_html_5);?>
						<?php endif ?>
					</div>
					<?php if ($crf_pp_btn_title_5) :?>
					<div class="clearfix"></div>
					<div class="wrap-button text-center">
						<a class="btn-crossfit" href="<?php echo esc_html($crf_pp_btn_url_5) ?>"><?php echo esc_html($crf_pp_btn_title_5) ?></a>
					</div>
					<?php endif ?>

				</div>
				
			</div>
		</div><!-- #crf-pp-section-5 -->

		<div class="crf-pp-section-6">
			<div class="container">
				<div class="pp_sec-wrap">
					<h3 class="sec-title"><?php if ($crf_title_light_6) echo esc_html( $crf_title_light_6 ); ?><strong><?php if ($crf_title_bold_6) echo esc_html( $crf_title_bold_6 ); ?></strong></h3>

					<?php if ($crf_prc_table): ?>
						<div class="tab-pricings">
							<div class="nav-wrap text-center">
								<ul class="nav nav-tabs">
									<?php foreach( $crf_prc_table  as $key => $val ): 
										$key == 0 ? $active = 'active' : $active = ''; 
										?>
										<li class="<?php echo esc_attr($active)?>">
											<a data-toggle="tab" href="#type<?php echo esc_attr($key);?>">
												<?php echo $val['crf_pk_types']['crf_pk_name']; ?>
											</a>
										</li>
			                        <?php endforeach; ?>
		                        </ul>
	                        </div>
	                        <div class="tab-content">
	                        	<?php foreach( $crf_prc_table  as $key => $val ): $key == 0 ? $in = 'in active' : $in = ''; ?>
									<div id="type<?php echo esc_attr($key);?>" class="tab-pane fade <?php echo esc_attr($in)?>">
								    	<div class="pricing-wrap">
								    		<?php if ($val['crf_pk_types']['crf_types_prc']): ?>
									    		<?php foreach( $val['crf_pk_types']['crf_types_prc']  as $key => $t ): ?>
											    	<div class="pricing-box">
										    			<div class="pricing-inner-box">
															<div class="price">
																<div class="price-p price-p<?php echo esc_attr(count($t['crf_pk_prc_box'] )); ?>">
																	<?php if ($t['crf_pk_prc_box']): $items = array(); ?>
																		<?php foreach( $t['crf_pk_prc_box'] as $key => $p ): 
																			$items[] = count($t['crf_pk_prc_box'] );
																		?>
																			<h3 class="p p<?php echo esc_attr(count($t['crf_pk_prc_box'] )); ?>">
																				<?php echo esc_html( $p['crf_pk_prc_p'] ); ?><span class="u u<?php echo esc_attr(count($t['crf_pk_prc_box'] )); ?>"><?php echo esc_html( $p['crf_pk_prc_u'] ); ?></span>
																			</h3>
												                        <?php endforeach; ?>
														    		<?php endif; ?>
																</div>
																<div class="title">
																	<?php if ($t['crf_pk_prc_s']): ?><h4><?php echo esc_html( $t['crf_pk_prc_s'] ); ?></h4><?php endif; ?>
																</div>
															</div>
															<div class="info">
																<?php if ($t['detail']): ?>
																	<?php echo apply_filters('s7upf_output_content',$t['detail']);?>
																<?php endif; ?>
															</div>
															<?php if ($crf_sign_up_btn['crf_sign_up_title_6']) :?>
																<div class="signup-wrap">
																	<a class="btn-crossfit btn-signup" href="<?php echo esc_url($crf_sign_up_btn['crf_sign_up_link_6']) ?>"><?php echo esc_html($crf_sign_up_btn['crf_sign_up_title_6']) ?></a>
																</div>
															<?php endif; ?>
														</div>
														
											    	</div>
						                        <?php endforeach; ?>
								    		<?php endif; ?>
								    	</div>

								    </div>
		                        <?php endforeach; ?>
						    </div> 
					    </div>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- #crf-pp-section-16 -->

	    <?php if ($crf_pp_tes == 'true'): ?>
		<div class="crf-pp-section-7 hm-section-5" style="background-image: url(<?php echo wp_get_attachment_image_src( $crf_pp_bg_7,'full')[0];?>);">
			<div class="container">
	            <div class="row">
	                <div class="col-md-12 col-xs-12 col-sm-12">
	                    <h3 class="sec-title white"><?php if ($crf_title_light_7) echo esc_html( $crf_title_light_7 ); ?><strong><?php if ($crf_title_bold_7) echo esc_html( $crf_title_bold_7 ); ?></strong></h3>
	                    <?php echo do_shortcode("[gts-slider]") ?>
	                    <?php if ($crf_pp_btn_title_7) :?>
						<div class="clearfix"></div>
						<div class="wrap-button text-center">
							<a class="btn-crossfit" href="<?php echo esc_html($crf_pp_btn_url_7) ?>"><?php echo esc_html($crf_pp_btn_title_7) ?></a>
						</div>
						<?php endif ?>
	                </div>
	            </div>
			</div>
		</div><!-- #crf-pp-section-7 -->
        <?php endif ?>

	<?php
}


// Runs the Genesis loop.
genesis();
