<?php

function enqueue()
{
	if ( !is_admin() ) {
	    // libs
	    wpbp_enqueue_lib(array( 'modernizr', 'jquery', 'wpbp', 'fontawesome' ));
		// scripts
		wp_enqueue_script('theme', THEME_URI . '/js/scripts.js', array( 'jquery' ), '2.0');
		// styles
		wp_enqueue_style('theme', THEME_URI . '/css/master.css', array( 'wpbp' ), time());
	}
}
add_action('init', 'enqueue');

function convert_init()
{
	load_theme_textdomain('convert', THEME_DIRECTORY . '/lang');
}
add_action('init', 'convert_init');

function convert_sidebars_init()
{
	wpbp_register_sidebars(array( "Footer" ));
}
add_action('widgets_init', 'convert_sidebars_init');

function convert_compile_lesscss()
{
	require_once THEME_DIRECTORY . '/inc/lessphp/lessc.inc.php';

	$default_options = convert_default_options();

	try {

		$less = new lessc;

		$variables = array(
			'baseFontFamily'     => $default_options['base_font_family'],
			'hFontFamily'        => $default_options['heading_font_family'],
			'primaryColor'       => $default_options['primary_color'],
			'complimentaryColor' => $default_options['complimentary_color'],
			'contrastColor'      => $default_options['contrast_color'],
			'textColor'          => $default_options['text_color'],
			'headingsColor'      => $default_options['headings_color'],
			'contrastTextColor'  => $default_options['contrast_text_color']
		);

		if ( function_exists('of_get_option') ) {
			$variables = array_merge($variables, array_filter(array(
				'baseFontFamily'     => of_get_option('base_font_family') ? of_get_option('base_font_family') : null,
				'hFontFamily'        => of_get_option('heading_font_family') ? of_get_option('heading_font_family') : null,
				'primaryColor'       => of_get_option('primary_color') ? of_get_option('primary_color') : null,
				'complimentaryColor' => of_get_option('complimentary_color') ? of_get_option('complimentary_color') : null,
				'contrastColor'      => of_get_option('contrast_color') ? of_get_option('contrast_color') : null,
				'textColor'          => of_get_option('text_color') ? of_get_option('text_color') : null,
				'headingsColor'      => of_get_option('headings_color') ? of_get_option('headings_color') : null,
				'contrastTextColor'  => of_get_option('contrast_text_color') ? of_get_option('contrast_text_color') : null
			)));
		}

		$less->setVariables($variables);

		$input  = THEME_DIRECTORY . '/css/master.less';
		$output = THEME_DIRECTORY . '/css/master.css';

		$less->compileFile($input, $output);

	} catch ( Exception $e ) {
		echo $e;
	}
}

if ( isset($_GET['recompile_css']) || is_user_logged_in() ) {
	add_action('init', 'convert_compile_lesscss');
}

function convert_default_options()
{
	return array(
		'base_font_family'    => "'Karla', sans-serif",
		'heading_font_family' => "'Arvo', serif",
		'primary_color'       => "#746aca",
		'complimentary_color' => "#3c3769",
		'contrast_color'      => "#fde428",
		'text_color'          => "#646464",
		'headings_color'      => "#444444",
		'contrast_text_color' => "#000000"
	);
}