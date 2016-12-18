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
	$input  = THEME_DIRECTORY . '/css/master.less';
	$output = THEME_DIRECTORY . '/css/master.css';

	$old_css_md5 = get_option('convert_css_md5');

	if ( file_exists($output) ) {
		$new_css_md5 = md5(file_get_contents($output));
	} else {
		$new_css_md5 = null;
	}

	if ( $new_css_md5 != $old_css_md5 || $new_css_md5 === null ) {

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

			$less->compileFile($input, $output);

			$new_css_md5 = md5(file_get_contents($output));

			update_option('convert_css_md5', $new_css_md5);

		} catch ( Exception $e ) {
			if ( is_user_logged_in() ) {
				echo $e;
			}
		}

	}
}
add_action('init', 'convert_compile_lesscss');
