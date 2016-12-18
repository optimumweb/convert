<?php

// ENQUEUE
function enqueue() {
	if ( !is_admin() ) {
	    // libs
	    wpbp_enqueue_lib(array( 'modernizr', 'jquery', 'wpbp', 'fontawesome' ));
		// scripts
		wp_enqueue_script('theme', THEME_URI . '/js/scripts.js', array( 'jquery' ));
		// styles
		wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Arvo:400,700|Karla:400,700');
		wp_enqueue_style('theme', THEME_URI . '/css/master.css', array( 'wpbp' ), time());
	}
}
add_action('init', 'enqueue');

function convert_init()
{
	load_theme_textdomain('convert', THEME_DIRECTORY . '/lang');

	register_nav_menus(array(
		'social_navigation' => __("Social Navigation", 'convert')
	));

	wpbp_register_sidebars(array( "Hero", "Footer" ));
}
add_action('init', 'convert_init');

function convert_compile_lesscss()
{
	require_once THEME_DIRECTORY . '/inc/lessphp/lessc.inc.php';

	try {

		$less = new lessc;

		$less->setVariables(array(
			'primaryColor' => '#ff0000'
		));

		$less->compileFile(THEME_DIRECTORY . '/css/master.less');

	} catch ( Exception $e ) {}
}
add_action('init', 'convert_compile_lesscss');
