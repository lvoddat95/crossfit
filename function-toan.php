<?php
/**
 * Created by PhpStorm.
 * User: toanngo92
 * Date: 5/1/2019
 * Time: 11:09 AM
 */
add_action('wp_enqueue_scripts', 'func_crossfit_enqueue_scripts_styles_2');
function func_crossfit_enqueue_scripts_styles_2()
{
    wp_enqueue_style('toan-css', get_stylesheet_directory_uri() . '/assets/css/toan-css.css');
    wp_enqueue_style('toan-response-css', get_stylesheet_directory_uri() . '/assets/css/toan-response.css');
    wp_enqueue_style('responsive-css', get_stylesheet_directory_uri() . '/assets/css/responsive.css');
}

add_action( 'phpmailer_init', function( $phpmailer ) {
    if ( !is_object( $phpmailer ) )
        $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = 'nvtoan0592@gmail.com';
    $phpmailer->Password   = 'kajyfswfrlynzxjl';
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = 'nvtoan0592@gmail.com';
    $phpmailer->FromName   = 'Crossfit';
});



add_action('wpcf7_mail_sent', function ($cf7) {
    // Run code after the email has been sent
    $wpcf = WPCF7_ContactForm::get_current();
    $wpccfid = $wpcf->id;
    // if you wanna check the ID of the Form $wpcf->id
     // Change 123 to the ID of the form
        echo '
    <div class="modal fade in formids" id="myModal2" role="dialog" style="display:block;" tabindex="-1">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content no_pad text-center">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-header heading">
          <h3 class="modal-title">Message Sent!</b></h3>
        </div>
        <div class="modal-body">

            <div class="thanku_outer  text-right define_float">
                <h3 class="thanku-title text-right">Thank You For Contacting Us!</h3>
                <div class="thanku-content text-right">
                    We’ ve Received Your Message And 
                    We’ll Get Back To You Within 24 Hours
                </div>
                <div class="thanku-foot">See You In CrossFit Pompano Beach!</div>
            </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>

    </div>
    </div>
    ';

});

