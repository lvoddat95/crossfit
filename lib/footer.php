<?php
/*
Name: Footer
Description: Footer Template
*/

add_action( 'genesis_footer', 'crf_template_gg_ctf_footer');
function crf_template_gg_ctf_footer() { 
    $before_footer = get_field('before_footer','option');
    if ($before_footer) extract($before_footer);
    ?>

    <div class="hm-section-6">
        <div class="container">
            <div class="row contact-us-wrap">
                <div class="col-map col-md-6 col-sm-12 col-xs-12">
                    <div class="google-maps">
                        <?php 
                            $id = 'sv-map-'.uniqid(); 
                            $gg_address = $google_map['ggm_marker_title'];
                            $lat = $google_map['ggm_location']['lat'];
                            $lng = $google_map['ggm_location']['lng'];
                            $ggm_loc = $lat.','.$lng;
                        ?>
                        <div id="<?php echo $id; ?>" class="sv-ggmaps "
                            data-location="|<?php echo esc_html($ggm_loc); ?>,,<?php if (!empty($gg_address)) echo esc_html($gg_address) ?>," 
                            data-market="<?php echo wp_get_attachment_image_src( $google_map['ggm_marker'])[0];?>" 
                            data-zoom="19" 
                            data-style="light" 
                            data-control="yes" 
                            data-scrollwheel="no" 
                            data-disable_ui="no" 
                            data-draggable="yes" >
                        </div>


                    </div>
                </div>
                <div class="col-contact col-md-6 col-sm-12 col-xs-12">
                    <?php if (!empty($ft_cf7)) echo do_shortcode($ft_cf7) ?>
                </div>
            </div>
        </div>
    </div><!-- end-hm-section-6 -->

    <?php
}



add_action( 'genesis_footer', 'crf_template_before_footer');
function crf_template_before_footer() { 
    $before_footer = get_field('before_footer','option');
    if ($before_footer) extract($before_footer);

    $footer_left = get_field('footer_left','option');
    if ($footer_left) extract($footer_left);


    $footer_center = get_field('footer_center','option');
    if ($footer_center) extract($footer_center);

    $footer_right = get_field('footer_right','option');
    if ($footer_right) extract($footer_right);
    ?>

    <div class="footer-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-left-wrap">
                    <div class="footer-left">
                        <div class="social-ft">
                            <h3 class="title-sc"><?php if ($ft_left_title) echo esc_html($ft_left_title); ?></h3>
                            <?php if( $social_list ) : ?>
                                <ul class="list-inline-block">
                                <?php foreach ($social_list as $key => $value) : ?>
                                    <li>
                                        <?php if( $value['link'] ) echo '<a href="'.$value['link'].'">'?>
                                            <img src="<?php echo wp_get_attachment_url($value["image"]); ?>"/>
                                        <?php if( $value['link'] ) echo '</a>'; ?>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                        </div>
                        <div class="phone-ft text-center">
                            <h3 class="title-sc title-pn"><?php if ($phone_tilte) echo esc_html($phone_tilte); ?></h3>
                            <?php $nbp = preg_replace("/[^0-9]/", "", $phone_number); ?>
                            <a class="phone-num" href="tel:<?php echo esc_url($nbp); ?>"><?php if ($phone_number) echo esc_html($phone_number); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-center-wrap">
                    <div class="footer-center">
                        <div class="ft-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php if ($ft_logo) echo '<img class="logo-footer" src="' . wp_get_attachment_url( $ft_logo ) . '"/>'; ?>
                            </a>
                        </div>
                        <div class="ft-btn">
                            <?php if ($ft_btn_title) : ?>
                            <a href="<?php echo esc_html($ft_btn_url); ?>" class="btn-crossfit"><?php echo esc_html($ft_btn_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-right-wrap">
                    <div class="footer-right">
                        <div class="ft-add">
                            <h3 class="title-sc"><?php if ($address['ft_add_title']) echo esc_html($address['ft_add_title']); ?></h3>
                            <div class="add-info">
                                <?php if(!empty($address['ft_add_info'])) echo apply_filters('crf_output_content',$address['ft_add_info']); ?>
                            </div>
                        </div>
                        <div class="ft-part">
                            <h3 class="title-sc"><?php if ($ft_pn['ft_pn_title']) echo esc_html($ft_pn['ft_pn_title']); ?></h3>
                            <div class="list-img">
                                <?php 
                                if( $ft_pn['ft_pn_list'] ): ?>
                                    <ul class="list-inline">
                                        <?php foreach( $ft_pn['ft_pn_list']  as $image ): ?>
                                            <li>
                                                <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

<?php
}
