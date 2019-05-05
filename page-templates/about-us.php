<?php
/**
 * Crossfit.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: About Us
 *
 * @package Crossfit
 * @author  MaiTemcrossfit
 */


// Forces full width content layout.
add_filter('genesis_site_layout', '__genesis_return_full_width_content');

add_action('genesis_entry_content', 'crf_entry_content_about_us', 12);
function crf_entry_content_about_us()
{
    $section_about_us = get_field('section_about_us');
    extract($section_about_us);

    $section_our_coarcher = get_field('section_our_coarcher');
    extract($section_our_coarcher);

    $section_why_choose = get_field('section_why_choose');
    extract($section_why_choose);

    $section_testimonials = get_field('section_testimonials');
    extract($section_testimonials);
    ?>
    <div class="_about-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="_ab-sec-1-title-wrap section-title text-center">
                        <h3 class="title50 no-margin">
                            <span class="font-500 text-uppercase sec-about-title-1"><?php if (!empty($about_us_title1)) echo esc_html($about_us_title1); ?></span>
                            <span class="font-bold text-uppercase sec-about-title-2"><?php if (!empty($about_us_title2)) echo esc_html($about_us_title2); ?></span>
                        </h3>
                    </div>
                </div>
                <div class="row content-row1">
                    <div class="col1-img col-md-6 col-lg-6">
                        <div class="img-wrap">
                            <?php if ($about_us_img) echo '<img src="' . wp_get_attachment_url($about_us_img) . '"/>'; ?>
                        </div>
                    </div>
                    <div class="col2-content col-md-6 col-lg-6">
                        <div class="content-wrap content1 font-600 title30">
                            <?php if ($about_us_content1) echo apply_filters('crossfit_output_content',
                                $about_us_content1); ?>
                        </div>
                    </div>
                </div>
                <div class="content-row2 row">
                    <div class="cold-md-12 col-sm-12 col-xs-12">
                        <div class="content-wrap content2 title25">
                            <?php if ($about_us_content2) echo apply_filters('crossfit_output_content',
                                $about_us_content2); ?>
                        </div>
                    </div>
                </div>
                <div class="button-about row text-center">
                    <?php if ($about_us_button_text): ?>
                        <a class="btn-crossfit"
                           href="<?php echo esc_html($about_us_button_url); ?>"><?php echo esc_html($about_us_button_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="hm-section-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="section-title hm-section-4-title hm-section-2-title text-center text-uppercase">
                        <h2 class="title51 font-montse no-margin"><?php if (!empty($why_choose_title1)) echo esc_html($why_choose_title1) ?></h2>
                        <h3 class="title51 font-bold font-montse no-margin"><?php if (!empty($why_choose_title2)) echo esc_html($why_choose_title2) ?></h3>
                    </div>
                    <div class="content-wrap row">
                        <div class="col-md-4 col-sm-4 col-sx-4">
                            <div class="wcc-wrap">
                                <div class="wcc-title font-600">
                                    <?php if (!empty($content_title1)) echo esc_html($content_title1); ?>
                                </div>
                                <div class="wcc-desc">
                                    <?php if (!empty($content_des1)) echo esc_html($content_des1); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title font-600">
                                    <?php if (!empty($content_title2)) echo esc_html($content_title2); ?>
                                </div>
                                <div class="wcc-desc">
                                    <?php if (!empty($content_des2)) echo esc_html($content_des2); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title font-600">
                                    <?php if (!empty($content_title3)) echo esc_html($content_title3); ?>
                                </div>
                                <div class="wcc-desc">
                                    <?php if (!empty($content_des3)) echo esc_html($content_des3); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-sx-4">
                            <div class="img-wrap">
                                <?php if (!empty($why_choose_img) && is_array($why_choose_img)) {
                                    echo '<img src="' . wp_get_attachment_url($why_choose_img["ID"]) . '"/>';
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-sx-4 text-right">
                            <div class="wcc-wrap">
                                <div class="wcc-title font-600">
                                    <?php if (!empty($content_title4)) echo esc_html($content_title4); ?>
                                </div>
                                <div class="wcc-desc">
                                    <?php if (!empty($content_des4)) echo esc_html($content_des4); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title font-600">
                                    <?php if (!empty($content_title5)) echo esc_html($content_title5); ?>
                                </div>
                                <div class="wcc-desc">
                                    <?php if (!empty($content_des5)) echo esc_html($content_des5); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title font-600">
                                    <?php if (!empty($content_title6)) echo esc_html($content_title6); ?>
                                </div>
                                <div class="wcc-desc">
                                    <?php if (!empty($content_des6)) echo esc_html($content_des6); ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center col-md-12 col-xs-12 col-sm-12">
                            <a class="btn-crossfit"
                               href="<?php echo esc_html($why_choose_button_url) ?>"><?php echo esc_html($why_choose_button_text) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="hm-section-5"
         style="background-image: url(<?php echo wp_get_attachment_image_src($testimonials_background, 'full')[0]; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <h2 class="testimonials-title font-bold text-center white title51 font-montse no-margin"><?php if (!empty($testimonials_title)) echo esc_html($testimonials_title) ?></h2>
                    <?php echo do_shortcode("[gts-slider]") ?>
                    <div class="text-center btn-wrap">
                        <a class="btn-crossfit"
                           href="<?php echo esc_html($testimonials_button_url) ?>"><?php echo esc_html($testimonials_button_text) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
}


// Runs the Genesis loop.
genesis();
