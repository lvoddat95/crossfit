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
                        <h3 class="title51 no-margin">
                            <span class="font-500 text-uppercase sec-about-title-1"><?php if (!empty($about_us_title1)) echo esc_html($about_us_title1); ?></span>
                            <span class="font-bold text-uppercase sec-about-title-2"><?php if (!empty($about_us_title2)) echo esc_html($about_us_title2); ?></span>
                        </h3>
                    </div>
                </div>
                <div class="content-row1 row">
                    <div class="col1-img col-sm-6 col-md-6 col-lg-6">
                        <div class="img-wrap">
                            <?php if ($about_us_img) echo '<img src="' . wp_get_attachment_url($about_us_img) . '"/>'; ?>
                        </div>
                    </div>
                    <div class="col2-content col-sm-6 col-md-6 col-lg-6">
                        <div class="content-wrap content1 font-600 title30">
                            <?php if ($about_us_content1) echo apply_filters('crossfit_output_content',
                                $about_us_content1); ?>
                        </div>
                    </div>
                </div>
                <div class="content-row2 row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="content-wrap content2 title25">
                            <?php if ($about_us_content2) echo apply_filters('crossfit_output_content',
                                $about_us_content2); ?>
                        </div>
                    </div>
                </div>
                <div class="button-about col-md-12 col-sm-12 col-xs-12 text-center">
                    <?php if ($about_us_button_text): ?>
                        <a class="btn-crossfit"
                           href="<?php echo esc_html($about_us_button_url); ?>"><?php echo esc_html($about_us_button_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="_about-section-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="group-tabs">
                        <!-- Nav tabs -->
                        <div class="tab-nav-wrap col-md-4 col-sm-4 col-xs-4">
                            <h3 class="_ab-sec-2-title-wrap no-margin title51">
                                <span class="white font-600 text-uppercase"><?php if (!empty($coaches_title1)) echo esc_html($coaches_title1) ?></span>
                                <span class="white font-bold text-uppercase"><?php if (!empty($coaches_title2)) echo esc_html($coaches_title2) ?></span>
                            </h3>
                            <ul class="nav nav-tabs nav-pills nav-stacked" role="tablist">
                                <?php if (!empty($our_couches_tab) && is_array($our_couches_tab)) foreach ($our_couches_tab as $key => $value) {
                                    extract($value);
                                    $class_active = '';
                                    if ($key == 0) {
                                        $class_active = 'active';
                                    } else {
                                        $class_active = '';
                                    }
                                    ?>
                                    <li role="presentation" class="<?php echo esc_attr($class_active) ?>">
                                        <a class="flex-wrap" href="#<?php echo esc_attr('our_coach_tab_' . $key); ?>"
                                           aria-controls="<?php echo esc_attr('our_coach_tab_' . $key); ?>" role="tab"
                                           data-toggle="tab">
                                            <i class="img-wrap"><img
                                                        src="<?php echo wp_get_attachment_image_src($our_coach_image, array(124, 124))[0]; ?>"/></i>
                                            <span class="coach-info-wrap white">
                                         <span class="coach-name font-600 title30"><?php echo esc_html($our_coach_name) ?></span>
                                        <span class="coach-office font-500 title26"><?php echo esc_html($our_coach_office) ?></span>
                                        </span>
                                        </a>
                                    </li>
                                    <?php
                                } ?>
                            </ul>
                            <h5 class="biography title30 no-margin">
                                <span class="color"><?php if (!empty($coaches_biography_text)) echo esc_html($coaches_biography_text); ?></span>
                            </h5>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content col-md-8 col-sm-8 col-xs-8">
                            <?php if (!empty($our_couches_tab) && is_array($our_couches_tab)) foreach ($our_couches_tab as $key => $value) {
                                //var_dump($value);
                                extract($value);
                                $class_active = '';
                                if ($key == 0) {
                                    $class_active = 'active';
                                } else {
                                    $class_active = '';
                                }
                                ?>
                                <div role="tabpanel"
                                     class="tab-pane our-coach-content <?php echo esc_attr($class_active) ?>"
                                     id="<?php echo esc_attr('our_coach_tab_' . $key); ?>">
                                    <div class="text-center img-title-coach-wrap">
                                        <div class="img-wrap round display-inline-block">
                                            <img src="<?php echo wp_get_attachment_image_src($our_coach_image, array(230, 230))[0]; ?>"/>
                                        </div>
                                        <h4 class="our-coach-content-title no-margin white title30 font-600"><?php echo esc_html($our_coach_full_name); ?></h4>
                                    </div>
                                    <div class="coach-content title25">
                                        <?php echo apply_filters('crossfit_output_content', $our_coach_content) ?>
                                    </div>
                                    <?php if (!empty($coaches_read_more_text))
                                    ?>
                                    <a class="title30 btn-readmore-coach" href="<?php echo $our_coach_read_more_url ? esc_url($our_coach_read_more_url) : "#" ?>"><?php echo esc_html($coaches_read_more_text) ?></a>
                                    <?php
                                    ?>
                                </div>
                                <?php
                            } ?>
                        </div>
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
                        <h2 class="title51 font-montse no-margin"><?php if (!empty($why_choose_title1)) echo esc_html($why_choose_title1) ?></h2>
                        <h3 class="title51 font-bold font-montse no-margin"><?php if (!empty($why_choose_title2)) echo esc_html($why_choose_title2) ?></h3>
                    </div>
                    <div class="content-wrap row">
                        <div class="col-md-4 col-sm-4 col-sx-4 col-wcc-1">
                            <div class="wcc-wrap">
                                <div class="wcc-title title25 font-600">
                                    <?php if (!empty($content_title1)) echo esc_html($content_title1); ?>
                                </div>
                                <div class="wcc-desc title25">
                                    <?php if (!empty($content_des1)) echo esc_html($content_des1); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title title25 font-600">
                                    <?php if (!empty($content_title2)) echo esc_html($content_title2); ?>
                                </div>
                                <div class="wcc-desc title25">
                                    <?php if (!empty($content_des2)) echo esc_html($content_des2); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title title25 font-600">
                                    <?php if (!empty($content_title3)) echo esc_html($content_title3); ?>
                                </div>
                                <div class="wcc-desc title25">
                                    <?php if (!empty($content_des3)) echo esc_html($content_des3); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-sx-4 col-wcc-2">
                            <div class="img-wrap">
                                <?php if (!empty($why_choose_img) && is_array($why_choose_img)) {
                                    echo '<img src="' . wp_get_attachment_url($why_choose_img["ID"]) . '"/>';
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-sx-4 col-wcc-3 text-right">
                            <div class="wcc-wrap">
                                <div class="wcc-title title25 font-600">
                                    <?php if (!empty($content_title4)) echo esc_html($content_title4); ?>
                                </div>
                                <div class="wcc-desc title25">
                                    <?php if (!empty($content_des4)) echo esc_html($content_des4); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title title25 font-600">
                                    <?php if (!empty($content_title5)) echo esc_html($content_title5); ?>
                                </div>
                                <div class="wcc-desc title25">
                                    <?php if (!empty($content_des5)) echo esc_html($content_des5); ?>
                                </div>
                            </div>
                            <div class="wcc-wrap">
                                <div class="wcc-title title25 font-600">
                                    <?php if (!empty($content_title6)) echo esc_html($content_title6); ?>
                                </div>
                                <div class="wcc-desc title25">
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
