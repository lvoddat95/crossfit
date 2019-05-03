<?php
/**
 * Created by PhpStorm.
 * User: toanngo92
 * Date: 5/1/2019
 * Time: 11:09 AM
 */
add_action( 'wp_enqueue_scripts', 'func_crossfit_enqueue_scripts_styles_2' );
function func_crossfit_enqueue_scripts_styles_2() {
	wp_enqueue_style('toan-css',get_stylesheet_directory_uri().'/assets/css/toan-css.css');
}

if(!function_exists('crf_get_meta')){
    function crf_get_meta($field_id){
        $obj = rwmb_meta( $field_id);
        return $obj;
    }
}
if(!function_exists('crf_get_meta_args')){
    function crf_get_meta_args($field_id,$args,$post_id){
        $obj = rwmb_meta( $field_id,$args,$post_id);
        return $obj;
    }
}