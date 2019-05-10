<?php
/**
 * Crossfit
 *
 * This file adds theme specific functions to the Crossfit Theme.
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;
	
}

add_action( 'widgets_init', 'crf_do_shortcode_widget' );
function crf_do_shortcode_widget() {
	register_widget( 'do_shortcode_widget' );		
}
class do_shortcode_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			false,
			esc_html__('Crossfit - Shortcode Widget', ' crossfit'),
			array( 'description' => 
				esc_html__( 'Display shortcode to page.', 'crossfit' ), 
			)
		);

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['shortcode'] = strip_tags($new_instance['shortcode']);
        return $instance;

	}


	public function form( $instance ) {
		$default = array(
            'title' => '',
            'shortcode' => ''
        ); 
        $instance = wp_parse_args( (array) $instance, $default );
        $title = esc_attr($instance['title']);
        $shortcode = esc_attr($instance['shortcode']);
        echo '<p>Title <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
        echo '<p>Shortcode <input type="text" class="widefat" name="'.$this->get_field_name('shortcode').'" value="'.$shortcode.'"/></p>';
	}

	public function widget( $args, $instance ) {
		extract($args);
        $shortcode = $instance['shortcode'];

		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];

		if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];
		echo do_shortcode($shortcode);

		echo $args['after_widget'];

	}

	

}