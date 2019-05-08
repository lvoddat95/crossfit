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
    wp_enqueue_style('toan-response-css',get_stylesheet_directory_uri().'/assets/css/toan-response.css');
}