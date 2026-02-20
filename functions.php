<?php
/**
 * Fashion Theme Functions
 */

// Theme setup
function fashion_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    
    // WooCommerce support
    add_theme_support('woocommerce');
    
    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'fashion-theme'),
        'footer' => __('Footer Menu', 'fashion-theme'),
    ));
}
add_action('after_setup_theme', 'fashion_theme_setup');

// Enqueue styles and scripts
function fashion_theme_scripts() {
    // Main CSS
    wp_enqueue_style('fashion-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'fashion_theme_scripts');

// ACF Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}
?>