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

add_action('genesis_entry_content', 'crf_entry_content_event_name', 12);
function crf_entry_content_event_name()
{

    $section_event = get_field('section_event');
    extract($section_event);

    if (empty($size))
        $size = array(689, 498);

    ?>
    <div class="_ev-section-event">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="sec1-row1-wrap">
                        <div class="img-wrap event-img1 flex-wrap justify-content-center">
                            <?php if (!empty($event_img1)) echo wp_get_attachment_image($event_img1, array(522,522), false); ?>
                        </div>
                        <div class="content-wrap title30 event-content1">
                            <?php if (!empty($event_content1)) echo apply_filters('crossfit-output-content', $event_content1); ?>
                        </div>
                        <h2 class="font-600 event-title no-margin color title45"><?php if (!empty($event_title)) echo esc_html($event_title); ?></h2>
                    </div>
                    <div class="row sec1-row2-wrap">
                        <div class="col-lg-6 col-md-6 col-sm-6 col1-content">
                            <h2 class="event-sec1-row2-title color text-uppercase font-600 title45 no-margin"><?php if (!empty($event_row_1_title)) echo esc_html($event_row_1_title); ?></h2>
                            <div class="event-sec1-row2-desc">
                                <?php
                                if (!empty($event_row_1_group) && is_array($event_row_1_group)) {
                                    foreach ($event_row_1_group as $key => $value) {
                                        extract($value);
                                        ?>
                                        <h3 class="event-row-2-desc-title font-600 title30 no-margin">
                                            <?php if (!empty($event_row_1_title)) echo esc_html($event_row_1_title); ?>
                                        </h3>
                                        <div class="event-row-2-desc-content title25">
                                            <?php if (!empty($event_row_1_desciption)) echo apply_filters('crossfit-output-content', $event_row_1_desciption); ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col2-img">
                            <div class="img-wrap event-img2">
                                <?php if (!empty($event_row_1_image)) echo wp_get_attachment_image($event_row_1_image, $size, false); ?>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12 last-row2">
                            <h3 class="font-600 color title30 no-margin"><?php if (!empty($event_last_row_1_text)) echo esc_html($event_last_row_1_text); ?></h3>
                        </div>
                    </div>
                    <div class="row sec1-row3-wrap">
                        <div class="col-lg-12 col-md-12">
                            <h2 class="no-margin event-title-row-3 color text-uppercase font-600 title45"><?php if (!empty($event_title_row_2)) echo esc_html($event_title_row_2); ?></h2>
                            <?php
                            if (!empty($event_row_2_group) && is_array($event_row_2_group)) {
                                foreach ($event_row_2_group as $key => $value) {
                                    extract($value);
                                    ?>
                                    <div class="event-row-3-desc title25">
                                        <h3 class="event-row-3-desc-title no-margin font-600 title30"><?php if (!empty($event_row_2_title)) echo esc_html($event_row_2_title); ?></h3>
                                        <div class="event-row-3-desc-content">
                                            <?php if (!empty($event_row_2_desciption)) echo apply_filters('crossfit-output-content', $event_row_2_desciption); ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row sec1-row4-wrap">
                        <div class="col-md-6 col-lg-6 col-xs-6">
                            <div class="img-wrap event-img-row-4">
                                <?php if (!empty($event_img_row_3)) echo wp_get_attachment_image($event_img_row_3, $size, false); ?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-6">
                                <h2 class="event-row-4-title  color text-uppercase font-600 title45 no-margin">
                                    <?php if (!empty($event_title_row_3)) echo esc_html($event_title_row_3) ?>
                                </h2>
                                <div class="event-row-4-content title30">
                                    <?php if (!empty($event_content_right_row3)) echo apply_filters('crossfit-output-content',$event_content_right_row3); ?>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 sec1-row-last title25">
                            <?php if (!empty($event_content_last_row_3)) echo apply_filters('crossfit-output-content',$event_content_last_row_3); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center event-button">
                            <?php if (!empty($event_button_text)): ?>
                                <a class="btn-crossfit"
                                   href="<?php if(!empty($event_button_url)) echo esc_html($event_button_url); ?>"><?php echo esc_html($event_button_text); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>


                </div>


            </div>
        </div>


    </div>


    <?php
}

genesis();