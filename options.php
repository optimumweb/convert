<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

    // This gets the theme name from the stylesheet (lowercase and without spaces)
    $themename = get_option('stylesheet');
    $themename = preg_replace("/\W/", "_", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);

    // echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options()
{
    $default_options = convert_default_options();

    $options = array();

    $options[] = array(
        'name' => __("Basic Settings", 'convert'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __("Business Name", 'convert'),
        'id'   => 'business_name',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __("Logo", 'convert'),
        'desc' => __("We recommend an image that is 370px by 96px", 'convert'),
        'id'   => 'logo',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __("Hero Cover", 'convert'),
        'id'   => 'hero_cover',
        'type' => 'upload'
    );

    $options[] = array(
        'name' => __("Phone Number", 'convert'),
        'id'   => 'tel',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __("Front Page Hero", 'convert'),
        'id'   => 'front_page_hero',
        'type' => 'editor'
    );

    $options[] = array(
        'name' => __("Social Media Settings", 'convert'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __("Twitter", 'convert'),
        'id'   => 'twitter_url',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __("Facebook", 'convert'),
        'id'   => 'facebook_url',
        'type' => 'text'
    );

    $options[] = array(
        'name' => __("Color Settings", 'convert'),
        'type' => 'heading'
    );

    $options[] = array(
        'name' => __("Primary Color", 'convert'),
        'id'   => 'primary_color',
        'type' => 'color',
        'std'  => $default_options['primary_color']
    );

    $options[] = array(
        'name' => __("Complimentary Color", 'convert'),
        'id'   => 'complimentary_color',
        'type' => 'color',
        'std'  => $default_options['complimentary_color']
    );

    $options[] = array(
        'name' => __("Contrast Color", 'convert'),
        'id'   => 'contrast_color',
        'type' => 'color',
        'std'  => $default_options['contrast_color']
    );

    $options[] = array(
        'name' => __("Text Color", 'convert'),
        'id'   => 'text_color',
        'type' => 'color',
        'std'  => $default_options['text_color']
    );

    $options[] = array(
        'name' => __("Headings Color", 'convert'),
        'id'   => 'headings_color',
        'type' => 'color',
        'std'  => $default_options['headings_color']
    );

    return $options;
}
