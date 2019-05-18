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
                            data-zoom="18" 
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
                            <?php if( $social_list ) : $url = get_stylesheet_directory_uri() . '/assets/images/social.png'; ?>
                                    
                               <div class="footer-sc-list">
                                   <?php if( $social_list['ft_fb_url'] ) : ?>
                                       <a href="<?php echo $social_list['ft_fb_url']?>">
                                            <div class="footer-sc footer-sc-fb" style="background-image: url(<?php echo $url; ?>);">
                                                <span class=hidden>Crossfit Facebook</span>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                   <?php if( $social_list['ft_yt_url'] ) : ?>
                                        <a href="<?php echo $social_list['ft_yt_url']?>">
                                            <div class="footer-sc footer-sc-yt" style="background-image: url(<?php echo $url; ?>);">
                                                <span class=hidden>Crossfit Youtube</span>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <?php if( $social_list['ft_gg_url'] ) : ?>
                                        <a href="<?php echo $social_list['ft_gg_url']?>">
                                            <div class="footer-sc footer-sc-gg" style="background-image: url(<?php echo $url; ?>);">
                                                <span class=hidden>Crossfit Google</span>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                    <?php if( $social_list['ft_pt_url'] ) : ?>
                                        <a href="<?php echo $social_list['ft_pt_url']?>">
                                            <div class="footer-sc footer-sc-pt" style="background-image: url(<?php echo $url; ?>);">
                                                <span class=hidden>Crossfit Pinterest</span>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <?php if( $social_list['ft_tw_url'] ) : ?>
                                        <a href="<?php echo $social_list['ft_tw_url']?>">
                                            <div class="footer-sc footer-sc-tw" style="background-image: url(<?php echo $url; ?>);">
                                                <span class=hidden>Crossfit Twitter</span>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                               </div>

                            <?php endif; ?>

                        </div>
                        <div class="phone-ft text-center">
                            <h3 class="title-sc title-pn"><?php if ($phone_tilte) echo esc_html($phone_tilte); ?></h3>
                            <?php $nbp = preg_replace("/[^0-9]/", "", $phone_number); ?>
                            <a class="phone-num" href="tel:<?php echo esc_url($nbp); ?>"><?php if ($phone_number) echo esc_html($phone_number); ?></a>
                        </div>
                        <div class="ft-content left text-center">
                            <?php if(!empty($ft_content_edit_right)) echo apply_filters('crf_output_content',$ft_content_edit_right); ?>
                        </div> 
                    </div>
                </div>
                <div class="col-md-4 footer-center-wrap">
                    <div class="footer-center">
                        <div class="ft-logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php if ($ft_logo) echo '<img alt="Pompano Beach Crossfit" class="logo-footer" src="' . wp_get_attachment_url( $ft_logo ) . '"/>'; ?>
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
                                            <?php if ($image['partner_url']): ?><a href="<?php echo $image['partner_url']?>"><?php endif ?>
                                            <?php echo wp_get_attachment_image( $image['partner_logo']['ID'], 'full' ); ?>
                                            <?php if ($image['partner_url']): ?></a><?php endif ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ft-content right text-center">
                            <?php if(!empty($ft_content_edit_right)) echo apply_filters('crf_output_content',$ft_content_edit_right); ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

<?php
}
