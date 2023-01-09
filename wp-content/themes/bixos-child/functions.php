<?php
if ( ! function_exists( 'bixos_child_enqueue_child_styles' ) ) {
	function bixos_child_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'bixos-theme-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'bixos-theme-style' );
	    // loading child style
	    wp_register_style(
	      'bixos-child-theme-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'bixos-child-theme-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'bixos_child_enqueue_child_styles' );

add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
