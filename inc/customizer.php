<?php
/**
 * Theme Customizer
 *
 * @package FashionStore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function fashion_store_customize_register($wp_customize) {
    // Colors Section
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'       => __('Primary Color', 'fashion-store'),
        'description' => __('Default: #000000 (Black)', 'fashion-store'),
        'section'     => 'colors',
        'settings'    => 'primary_color',
    )));

    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'       => __('Secondary Color', 'fashion-store'),
        'description' => __('Default: #FFFFFF (White)', 'fashion-store'),
        'section'     => 'colors',
        'settings'    => 'secondary_color',
    )));

    $wp_customize->add_setting('accent_color', array(
        'default'           => '#ff3333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'       => __('Accent Color', 'fashion-store'),
        'description' => __('Default: #FF3333 (Red)', 'fashion-store'),
        'section'     => 'colors',
        'settings'    => 'accent_color',
    )));

    // Typography Section
    $wp_customize->add_section('typography', array(
        'title'    => __('Typography', 'fashion-store'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('font_family', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('font_family', array(
        'label'       => __('Font Family', 'fashion-store'),
        'description' => __('Default: Inter', 'fashion-store'),
        'section'     => 'typography',
        'type'        => 'select',
        'choices'     => array(
            'Inter'    => 'Inter',
            'Poppins'  => 'Poppins',
            'Roboto'   => 'Roboto',
            'Open Sans' => 'Open Sans',
        ),
    ));

    // Layout Section
    $wp_customize->add_section('layout', array(
        'title'    => __('Layout', 'fashion-store'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('container_width', array(
        'default'           => 375,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('container_width', array(
        'label'       => __('Container Width (px)', 'fashion-store'),
        'description' => __('Default: 375px (Mobile)', 'fashion-store'),
        'section'     => 'layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 320,
            'max'  => 500,
            'step' => 1,
        ),
    ));

    // Header Section
    $wp_customize->add_section('header_options', array(
        'title'    => __('Header Options', 'fashion-store'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('sticky_header', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('sticky_header', array(
        'label'       => __('Enable Sticky Header', 'fashion-store'),
        'section'     => 'header_options',
        'type'        => 'checkbox',
    ));

    $wp_customize->add_setting('show_search_icon', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_search_icon', array(
        'label'       => __('Show Search Icon', 'fashion-store'),
        'section'     => 'header_options',
        'type'        => 'checkbox',
    ));

    // Homepage Sections
    $wp_customize->add_section('homepage_sections', array(
        'title'    => __('Homepage Sections', 'fashion-store'),
        'priority' => 45,
    ));

    $wp_customize->add_setting('show_announcement_bar', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_announcement_bar', array(
        'label'       => __('Show Announcement Bar', 'fashion-store'),
        'section'     => 'homepage_sections',
        'type'        => 'checkbox',
    ));

    $wp_customize->add_setting('show_hero_section', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_hero_section', array(
        'label'       => __('Show Hero Section', 'fashion-store'),
        'section'     => 'homepage_sections',
        'type'        => 'checkbox',
    ));

    $wp_customize->add_setting('show_brand_bar', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_brand_bar', array(
        'label'       => __('Show Brand Logos', 'fashion-store'),
        'section'     => 'homepage_sections',
        'type'        => 'checkbox',
    ));

    $wp_customize->add_setting('show_new_arrivals', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_new_arrivals', array(
        'label'       => __('Show New Arrivals', 'fashion-store'),
        'section'     => 'homepage_sections',
        'type'        => 'checkbox',
    ));

    // Product Settings
    $wp_customize->add_section('product_settings', array(
        'title'    => __('Product Settings', 'fashion-store'),
        'priority' => 50,
    ));

    $wp_customize->add_setting('products_per_row', array(
        'default'           => 2,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('products_per_row', array(
        'label'       => __('Products Per Row', 'fashion-store'),
        'section'     => 'product_settings',
        'type'        => 'select',
        'choices'     => array(
            1 => '1',
            2 => '2',
            3 => '3',
        ),
    ));

    $wp_customize->add_setting('show_product_badges', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('show_product_badges', array(
        'label'       => __('Show Discount Badges', 'fashion-store'),
        'section'     => 'product_settings',
        'type'        => 'checkbox',
    ));

    // Footer Section
    $wp_customize->add_section('footer_settings', array(
        'title'    => __('Footer Settings', 'fashion-store'),
        'priority' => 55,
    ));

    $wp_customize->add_setting('copyright_text', array(
        'default'           => 'All rights reserved.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('copyright_text', array(
        'label'       => __('Copyright Text', 'fashion-store'),
        'section'     => 'footer_settings',
        'type'        => 'textarea',
    ));

    // Add partial refresh for selective refresh
    if (isset($wp_customize->selective_refresh)) {
        // Site title
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.logo__text',
            'render_callback' => function() {
                bloginfo('name');
            },
        ));

        // Copyright text
        $wp_customize->selective_refresh->add_partial('copyright_text', array(
            'selector'        => '.site-footer__copyright',
            'render_callback' => function() {
                return get_theme_mod('copyright_text', 'All rights reserved.');
            },
        ));
    }
}
add_action('customize_register', 'fashion_store_customize_register');

/**
 * Render the site title for the selective refresh partial.
 */
function fashion_store_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fashion_store_customize_preview_js() {
    wp_enqueue_script('fashion-store-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '1.0.0', true);
}
add_action('customize_preview_init', 'fashion_store_customize_preview_js');

/**
 * Generate dynamic CSS based on Customizer settings
 */
function fashion_store_dynamic_css() {
    $primary_color   = get_theme_mod('primary_color', '#000000');
    $secondary_color = get_theme_mod('secondary_color', '#ffffff');
    $accent_color    = get_theme_mod('accent_color', '#ff3333');
    $font_family     = get_theme_mod('font_family', 'Inter');
    $container_width = get_theme_mod('container_width', 375);

    $css = "
        :root {
            --color-primary: {$primary_color};
            --color-secondary: {$secondary_color};
            --color-accent: {$accent_color};
            --font-primary: '{$font_family}', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --max-width-mobile: {$container_width}px;
        }
    ";

    wp_add_inline_style('fashion-store-main', $css);
}
add_action('wp_enqueue_scripts', 'fashion_store_dynamic_css', 20);