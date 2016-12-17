<?php

// ENQUEUE
function enqueue() {
	if ( !is_admin() ) {
	    // libs
	    wpbp_enqueue_lib(array( 'modernizr', 'jquery', 'wpbp' ));
		// scripts
		wp_enqueue_script('theme', THEME_URI . '/js/scripts.js', array( 'jquery' ));
		// styles
		wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:400,700');
		wp_enqueue_style('theme', THEME_URI . '/css/master.css', array( 'wpbp' ));
	}
}
add_action('init', 'enqueue');

function convert_init()
{
	register_nav_menus(array(
		'social_navigation' => __("Social Navigation", 'convert')
	));

	load_theme_textdomain('convert', THEME_DIRECTORY . '/lang');
}
add_action('init', 'convert_init');