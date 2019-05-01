<?php
/**
 * Created by PhpStorm.
 * User: toanngo92
 * Date: 5/1/2019
 * Time: 11:09 AM
 */
wp_enqueue_style('toan-css',get_stylesheet_directory_uri().'/assets/css/toan-css.css');

if(!function_exists('mtb_get_meta')){
    function mtb_get_meta($field_id){
        $obj = rwmb_meta( $field_id);
        return $obj;
    }
}
if(!function_exists('mtb_get_meta_args')){
    function mtb_get_meta_args($field_id,$args,$post_id){
        $obj = rwmb_meta( $field_id,$args,$post_id);
        return $obj;
    }
}