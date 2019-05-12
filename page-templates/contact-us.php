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

add_action('genesis_entry_content', 'crf_entry_content_contact_us', 12);
function crf_entry_content_contact_us()
{
    $section_contact = get_field('section_contact');
    extract($section_contact);
    if (empty($size))
        $size = array(120, 120);
    ?>
    <div class="_ct-section-contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?php if(!empty($free_trial_title)) {
                        ?>
                        <h2 class="no-margin title45 free-trial-title font-600"><?php echo esc_html($free_trial_title) ?></h2>
                        <?php
                    } ?>
                    <?php if(!empty($free_trial_description)) {
                        ?>
                        <div class="free-trial-description title25"><?php echo apply_filters('crossfit-output-content',$free_trial_description) ?></div>
                        <?php
                    } ?>
                    <?php if ($free_trial_contact_form) echo do_shortcode($free_trial_contact_form); ?>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="col2-row1 contact-info">
                        <h3 class="title-phone title45 no-margin"><?php if ($contact_title1) echo esc_html($contact_title1); ?></h3>
                        <div class="contact-des-phone title25"><?php if ($contact_des1) echo esc_html($contact_des1); ?>
                        </div>
                    </div>
                    <div class="col2-row2 contact-info">
                        <h3 class="title-social title45 no-margin"><?php if ($contact_title2) echo esc_html($contact_title2); ?></h3>
                        <div class="contact-social-wrap flex-wrap">
                            <?php if(!empty($social_image) && is_array($social_image)){
                                foreach ($social_image as $key => $value){
                                    extract($value);
                                    if(empty($social_url)) $social_url = '#';
                                    ?>
                                    <div class="img-wrap">
                                        <?php if(!empty($social_image)) echo '<a href="'.esc_url($social_url).'">'.wp_get_attachment_image($social_image,$size,false).'</a>' ?>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>

                    </div>

                    <div class="col2-row3">
                        <h3 class="title-address title45 no-margin"><?php if ($contact_title3) echo esc_html($contact_title3); ?></h3>
                        <div class="desc-address title25">
                            <?php if ($contact_des3) echo apply_filters('crossfit-output-content',$contact_des3); ?>

                        </div>
                    </div>


                </div>
            </div>


        </div>


    </div>


    <?php

}

genesis();