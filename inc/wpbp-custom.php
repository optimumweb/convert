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

		if ( function_exists('of_get_option') ) {
			$less->setVariables(array(
				'primaryColor'       => of_get_option('primary_color') ? '#' . of_get_option('primary_color') : null,
				'complimentaryColor' => of_get_option('complimentary_color') ? '#' . of_get_option('complimentary_color') : null,
				'contrastColor'      => of_get_option('contrast_color') ? '#' . of_get_option('contrast_color') : null
			));
		}

		$input  = THEME_DIRECTORY . '/css/master.less';
		$output = THEME_DIRECTORY . '/css/master.css';

		$less->compileFile($input, $output);

	} catch ( Exception $e ) {
		if ( is_user_logged_in() ) {
			echo $e;
		}
	}
}

if ( isset($_GET['recompile_css']) ) {
	add_action('init', 'convert_compile_lesscss');
}

add_action('optionsframework_after_validate', 'convert_compile_lesscss');
