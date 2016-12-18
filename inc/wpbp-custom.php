<?php

function enqueue()
{
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

	$default_options = convert_default_options();

	try {

		$less = new lessc;

		if ( function_exists('of_get_option') ) {
			$less->setVariables(array(
				'primaryColor'       => of_get_option('primary_color', $default_options['primary_color']),
				'complimentaryColor' => of_get_option('complimentary_color', $default_options['complimentary_color']),
				'contrastColor'      => of_get_option('contrast_color', $default_options['contrast_color']),
				'textColor'          => of_get_option('text_color', $default_options['text_color']),
				'headingsColor'      => of_get_option('headings_color', $default_options['headings_color'])
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
add_action('update_option_optionsframework', 'convert_compile_lesscss');

if ( isset($_GET['recompile_css']) ) {
	add_action('init', 'convert_compile_lesscss');
}

function convert_default_options()
{
	return array(
		'primary_color'       => '#746aca',
		'complimentary_color' => '#3c3769',
		'contrast_color'      => '#fde428',
		'text_color'          => '#646464',
		'headings_color'      => '#444444'
	);
}