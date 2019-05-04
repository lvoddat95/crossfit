<?php
/**
 * Crossfit.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Contact Us
 *
 * @package Crossfit
 * @author  MaiTemcrossfit
 */


// Forces full width content layout.
add_filter('genesis_site_layout', '__genesis_return_full_width_content');

add_action( 'genesis_entry_content', 'crf_entry_content_contact_us', 12 );
function crf_entry_content_contact_us() { 
    $section_contact = get_field('section_contact');
    extract($section_contact);

   if(empty($size))
	 $size= array(50,50);



?>
   


<div class="section-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<?php if ($contact_form) echo do_shortcode($contact_form); ?>
			 </div>
			<div class="col-sm-6 col-lg-6">
				<div class="col2-row1">
					<h3 class="title1"><?php if($contact_title1) echo esc_html($contact_title1); ?></h3>
					
					<div class="contact-des1"><?php if($contact_des1) echo esc_html($contact_des1); ?>
						
					</div>


				</div>

				<div class="col2-row2">
					<h3 class="title2"><?php if($contact_title2) echo esc_html($contact_title2); ?></h3>

					<div class="contact-img-wrap ">

						<?php if ($contact_img1) echo '<img src="' . wp_get_attachment_image($contact_img1,$size,false);

						 if ($contact_img2) echo '<img src="' . wp_get_attachment_image($contact_img2,$size,false) ; 
						 if ($contact_img3) echo '<img src="' . wp_get_attachment_image($contact_img3,$size,false) ; 
						 if ($contact_img4) echo '<img src="' . wp_get_attachment_image($contact_img4,$size,false)  ; 
						 if ($contact_img5) echo '<img src="' . wp_get_attachment_image($contact_img5,$size,false) ;
						  ?>

					</div>

				</div>

				<div class="col2-row3">
					<h3 class="title3"><?php if($contact_title3) echo esc_html($contact_title3); ?></h3>
					<div class="contact_des3">
						<?php if($contact_des3) echo esc_html($contact_des3); ?>
						
					</div>
				</div>
				

			</div>
		</div>


	</div>


</div>



<?php
        
    }
    genesis();