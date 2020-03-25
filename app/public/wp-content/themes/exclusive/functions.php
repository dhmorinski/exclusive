<?php

// Load scripts in HTML
function exclusive_files()
{
    // Styles.
    wp_enqueue_style('bootstrap-grid-style', get_theme_file_uri('assets/css/bootstrap-grid.css'));
    wp_enqueue_style('aos-style', get_theme_file_uri('assets/vendor/aos-2.3.1/css/aos.css'));
    wp_enqueue_style('exclusive-style', get_theme_file_uri('assets/css/style.css'));
    wp_enqueue_style('exclusive-style-responsive', get_theme_file_uri('assets/css/responsive.css'));
    wp_enqueue_style('exclusive_main_styles', get_stylesheet_uri(), null, microtime());
    // Scripts.
    wp_enqueue_script("jquery");
    wp_enqueue_script('aos-js', get_theme_file_uri('assets/vendor/aos-2.3.1/js/aos.js'), NULL, microtime(), true);
    wp_enqueue_script('exclusive-js', get_theme_file_uri('assets/js/exclusive.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'exclusive_files');

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '../inc/template-tags.php';


/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function exclusive_menus()
{

    $locations = array(
        'primary' => __('Glavni izbornik', 'exclusive'),
        'social' => __('Društvene mreže', 'exclusive'),
        'contact' => __('Kontakt', 'exclusive'),
    );

    register_nav_menus($locations);
}

add_action('init', 'exclusive_menus');


// Web page theme functionality.
function exclusive_features()
{
    // HTML head title tag.
    add_theme_support('title-tag');
    // SET NEW LOGO SIZE IN CHILD
    add_theme_support('custom-logo', array(
        'height' => 336,
        'width' => 500,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));

}

add_action('after_setup_theme', 'exclusive_features');

function exclusive_customizer_setting($wp_customize)
{
// add a setting
    $wp_customize->add_setting('exclusive_transparent_logo');
// Add a control to upload the image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'exclusive_transparent_logo', array(
        'label' => 'Transparentni logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'exclusive_transparent_logo',
        'priority' => 8, // show it just below the custom-logo
        'height' => 336,
        'width' => 500,
        'flex-height' => false,
        'flex-width' => false,
    )));

    // add a setting
    $wp_customize->add_setting('exclusive_transparent_neg_logo');
// Add a control to upload the image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'exclusive_transparent_neg_logo', array(
        'label' => 'Transparentni negativ logo',
        'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
        'settings' => 'exclusive_transparent_neg_logo',
        'priority' => 9,// show it just below the custom-logo
        'height' => 336,
        'width' => 500,
        'flex-height' => false,
        'flex-width' => false,
    )));
}

add_action('customize_register', 'exclusive_customizer_setting');

// CUSTOM IMAGE SIZES
//1920px (this covers FullHD screens and up)
add_image_size('img-xxl', 1920, 1920, true);
//1600px (this will cover 1600px desktops and several tablets in portrait mode, for example iPads at 768px width, which will request a 2x image of 1536px and above)
add_image_size('img-xl', 1600, 1600, true);
//1366px (it is the most widespread desktop resolution)
add_image_size('img-l', 1366, 1366, true);
//1024px (1024x768 screens, excluding iPads which are hi-density anyway, are rarer, but I think you need some image size in between, not to leave too big a gap between pixel sizes, in case the market changes)
add_image_size('img-m', 1024, 1024, true);
//768px (useful for 2x 375px mobile screens, as well as any device that actually requests something close to 768px)
add_image_size('img-s', 768, 768, true);
//640px (for smartphones)
add_image_size('img-xs', 640, 640, true);
//640px (for small smartphones)
add_image_size('img-xxs', 450, 450, true);

add_post_type_support('page', 'excerpt');