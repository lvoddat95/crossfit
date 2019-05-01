<?php
/**
 * Template Name: Home Page
 */
get_header();

/* section 1 */
$hm_sec_1_fields = mtb_get_meta('section_signup_form');
extract($hm_sec_1_fields);

/* section 2 */
$hm_sec_2_fields = mtb_get_meta('section_welcome');
//var_dump($hm_sec_2_fields);
extract($hm_sec_2_fields);
/* End section 2 */

/* section 3 */
$hm_sec_3_fields = mtb_get_meta('section_new_to_crossfit');
extract($hm_sec_3_fields);
/* End section 3 */

/* section 4 */
$hm_sec_4_fields = mtb_get_meta('section_why_choose_crossfit');
extract($hm_sec_4_fields);
//var_dump($hm_sec_4_fields);
/* End section 4 */

/* section 5 */
$hm_sec_5_fields = mtb_get_meta('section_testimonials');
extract($hm_sec_5_fields);
/* End section 5 */

/* section 6 */
$hm_sec_6_fields = mtb_get_meta('section_contact_us_form');
extract($hm_sec_6_fields);
/* End section 6 */

?>
    <div class="hm-section-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="signup-email-wrap">
                        <?php if(!empty($hm_sec_1_shortcode)) echo do_shortcode($hm_sec_1_shortcode) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hm-section-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="section-title hm-section-2-title text-center text-uppercase">
                        <h2 class="title51 font-montse no-margin"><?php if (!empty($hm_section2_title1)) echo esc_html($hm_section2_title1) ?></h2>
                        <h3 class="title51 font-bold font-montse no-margin"><?php if (!empty($hm_section2_title2)) echo esc_html($hm_section2_title2) ?></h3>
                    </div>
                </div>
                <div class="hm-section-2-content row">
                    <div class="col-img col-md-6 col-lg-6">
                        <div class="img-wrap">
                            <?php if (!empty($hm_section2_image) && is_array($hm_section2_image)) {
                                echo '<img src="' . wp_get_attachment_url($hm_section2_image[0]) . '"/>';
                            } ?>
                        </div>
                    </div>
                    <div class="col-content col-md-6 col-lg-6">
                        <div class="content-wrap title25 font-500">
                            <?php if (!empty($hm_section2_content)) echo apply_filters('crossfit_output_content', $hm_section2_content) ?>
                        </div>
                        <a class="btn-crossfit"
                           href="<?php echo esc_html($hm_section2_btn_url) ?>"><?php echo esc_html($hm_section2_btn_text) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hm-section-3">
        <div class="container">
            <div class="row">
                <div class="col-section3-content col-md-8 col-md-8 col-md-8">
                    <div class="hm-section-3-content">
                        <h2 class="section3-title title51 white font-montse no-margin text-uppercase">
                            <span class="font-300"><?php if (!empty($hm_sec_3_title1)) echo esc_html($hm_sec_3_title1) ?></span>
                            <strong><?php if (!empty($hm_sec_3_title2)) echo esc_html($hm_sec_3_title2) ?></span></strong>
                        </h2>
                        <div class="content-wrap title25 white">
                            <?php if (!empty($hm_sec_3_content)) echo apply_filters('crossfit_output_content', $hm_sec_3_content) ?>
                        </div>
                        <a class="btn-crossfit"
                           href="<?php echo esc_html($hm_sec_3_btn_url) ?>"><?php echo esc_html($hm_sec_3_btn_text) ?></a>
                    </div>
                </div>
                <div class="col-section3-img col-md-4 col-xs-4 col-sm-4">
                    <div class="img-wrap">
                        <?php if (!empty($hm_sec_3_image) && is_array($hm_sec_3_image)) {
                            echo '<img src="' . wp_get_attachment_url($hm_sec_3_image[0]) . '"/>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hm-section-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="section-title hm-section-4-title hm-section-2-title text-center text-uppercase">
                    <h2 class="title51 font-montse no-margin"><?php if (!empty($hm_sec_4_title1)) echo esc_html($hm_sec_4_title1) ?></h2>
                    <h3 class="title51 font-bold font-montse no-margin"><?php if (!empty($hm_sec_4_title2)) echo esc_html($hm_sec_4_title2) ?></h3>
                </div>
                <div class="content-wrap row">
                    <div class="col-md-4 col-sm-4 col-sx-4">
                        <div class="wcc-wrap">
                            <div class="wcc-title font-600">
                                <?php if (!empty($hm_sec_4_content_title_1)) echo esc_html($hm_sec_4_content_title_1); ?>
                            </div>
                            <div class="wcc-desc">
                                <?php if (!empty($hm_sec_4_content_desc_1)) echo esc_html($hm_sec_4_content_desc_1); ?>
                            </div>
                        </div>
                        <div class="wcc-wrap">
                            <div class="wcc-title font-600">
                                <?php if (!empty($hm_sec_4_content_title_2)) echo esc_html($hm_sec_4_content_title_2); ?>
                            </div>
                            <div class="wcc-desc">
                                <?php if (!empty($hm_sec_4_content_desc_2)) echo esc_html($hm_sec_4_content_desc_2); ?>
                            </div>
                        </div>
                        <div class="wcc-wrap">
                            <div class="wcc-title font-600">
                                <?php if (!empty($hm_sec_4_content_title_3)) echo esc_html($hm_sec_4_content_title_3); ?>
                            </div>
                            <div class="wcc-desc">
                                <?php if (!empty($hm_sec_4_content_desc_3)) echo esc_html($hm_sec_4_content_desc_3); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-sx-4">
                        <div class="img-wrap">
                            <?php if (!empty($hm_sec_3_image) && is_array($hm_sec_4_image)) {
                                echo '<img src="' . wp_get_attachment_url($hm_sec_4_image[0]) . '"/>';
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-sx-4 text-right">
                        <div class="wcc-wrap">
                            <div class="wcc-title font-600">
                                <?php if (!empty($hm_sec_4_content_title_4)) echo esc_html($hm_sec_4_content_title_4); ?>
                            </div>
                            <div class="wcc-desc">
                                <?php if (!empty($hm_sec_4_content_desc_4)) echo esc_html($hm_sec_4_content_desc_4); ?>
                            </div>
                        </div>
                        <div class="wcc-wrap">
                            <div class="wcc-title font-600">
                                <?php if (!empty($hm_sec_4_content_title_5)) echo esc_html($hm_sec_4_content_title_5); ?>
                            </div>
                            <div class="wcc-desc">
                                <?php if (!empty($hm_sec_4_content_desc_5)) echo esc_html($hm_sec_4_content_desc_5); ?>
                            </div>
                        </div>
                        <div class="wcc-wrap">
                            <div class="wcc-title font-600">
                                <?php if (!empty($hm_sec_4_content_title_6)) echo esc_html($hm_sec_4_content_title_6); ?>
                            </div>
                            <div class="wcc-desc">
                                <?php if (!empty($hm_sec_4_content_desc_6)) echo esc_html($hm_sec_4_content_desc_6); ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center col-md-12 col-xs-12 col-sm-12">
                        <a class="btn-crossfit"
                           href="<?php echo esc_html($hm_sec_4_btn_url) ?>"><?php echo esc_html($hm_sec_4_btn_text) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="hm-section-5" style="background:url('http://localhost/crossfit/wp-content/uploads/2019/05/testimonial-bg-1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <h2 class="testimonials-title font-bold text-center white title51 font-montse no-margin"><?php if (!empty($hm_sec_5_title)) echo esc_html($hm_sec_5_title) ?></h2>
                    <?php echo do_shortcode("[gts-slider]") ?>
                    <div class="text-center btn-wrap">
                        <a class="btn-crossfit"
                           href="<?php echo esc_html($hm_sec_5_btn_url) ?>"><?php echo esc_html($hm_sec_5_btn_text) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hm-section-6" >
        <div class="container">
            <div class="row contact-us-wrap">
                <div class="col-map col-md-6 col-sm-6 col-xs-12">
                    <div class="google-maps">
                        <?php if(!empty($hm_sec_6_google_iframe)) echo apply_filters('crossfit_output_content',$hm_sec_6_google_iframe) ?>
                    </div>
                </div>
                <div class="col-contact col-md-6 col-sm-6 col-xs-12">
                    <?php if(!empty($hm_sec_6_shortcode)) echo do_shortcode($hm_sec_6_shortcode) ?>
                </div>
            </div>
        </div>
    </div>
<?php

get_footer();