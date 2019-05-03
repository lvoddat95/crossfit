<?php
/**
 * Crossfit.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Pages
 *
 * @package Crossfit
 * @author  MaiTemcrossfit    
 */

// Forces full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Runs the Genesis loop.
genesis();
