<?php
/**
 * Theme Customizer Settings
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add Customizer Settings
 */
function jaganos_customize_register( $wp_customize ) {

    // =========================================
    // Site Identity Panel (extend default)
    // =========================================
    
    $wp_customize->add_setting( 'jaganos_site_title', array(
        'default'           => 'JAGANOS AI',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_site_title', array(
        'label'    => __( 'Site Title Text', 'jaganos-ai' ),
        'section'  => 'title_tagline',
        'type'     => 'text',
        'priority' => 5,
    ) );

    // =========================================
    // Hero Section Panel
    // =========================================
    
    $wp_customize->add_panel( 'jaganos_hero_panel', array(
        'title'       => __( 'Hero Section', 'jaganos-ai' ),
        'description' => __( 'Customize the hero section on the front page.', 'jaganos-ai' ),
        'priority'    => 30,
    ) );

    // Hero Content Section
    $wp_customize->add_section( 'jaganos_hero_content', array(
        'title'    => __( 'Hero Content', 'jaganos-ai' ),
        'panel'    => 'jaganos_hero_panel',
        'priority' => 10,
    ) );

    // Hero Title
    $wp_customize->add_setting( 'jaganos_hero_title', array(
        'default'           => 'JAGANOS AI',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_hero_title', array(
        'label'   => __( 'Hero Title', 'jaganos-ai' ),
        'section' => 'jaganos_hero_content',
        'type'    => 'text',
    ) );

    // Hero Subtitle
    $wp_customize->add_setting( 'jaganos_hero_subtitle', array(
        'default'           => 'Luxury AI Portfolio',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_hero_subtitle', array(
        'label'   => __( 'Hero Subtitle', 'jaganos-ai' ),
        'section' => 'jaganos_hero_content',
        'type'    => 'textarea',
    ) );

    // Hero Button Text
    $wp_customize->add_setting( 'jaganos_hero_button_text', array(
        'default'           => 'Enter',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_hero_button_text', array(
        'label'   => __( 'Button Text', 'jaganos-ai' ),
        'section' => 'jaganos_hero_content',
        'type'    => 'text',
    ) );

    // Hero Button URL
    $wp_customize->add_setting( 'jaganos_hero_button_url', array(
        'default'           => '#about',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_hero_button_url', array(
        'label'   => __( 'Button URL', 'jaganos-ai' ),
        'section' => 'jaganos_hero_content',
        'type'    => 'url',
    ) );

    // Hero Background Section
    $wp_customize->add_section( 'jaganos_hero_background', array(
        'title'    => __( 'Hero Background', 'jaganos-ai' ),
        'panel'    => 'jaganos_hero_panel',
        'priority' => 20,
    ) );

    // Hero Background Image
    $wp_customize->add_setting( 'jaganos_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'jaganos_hero_image', array(
        'label'    => __( 'Background Image', 'jaganos-ai' ),
        'section'  => 'jaganos_hero_background',
        'settings' => 'jaganos_hero_image',
    ) ) );

    // Hero Background Video
    $wp_customize->add_setting( 'jaganos_hero_video', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'jaganos_hero_video', array(
        'label'    => __( 'Background Video (MP4)', 'jaganos-ai' ),
        'section'  => 'jaganos_hero_background',
        'settings' => 'jaganos_hero_video',
        'mime_type' => 'video',
    ) ) );

    // =========================================
    // Colors Section
    // =========================================
    
    $wp_customize->add_section( 'jaganos_colors', array(
        'title'    => __( 'Theme Colors', 'jaganos-ai' ),
        'priority' => 40,
    ) );

    // Primary Color (Aluminum)
    $wp_customize->add_setting( 'jaganos_primary_color', array(
        'default'           => '#c7c7c7',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jaganos_primary_color', array(
        'label'   => __( 'Primary Color (Aluminum)', 'jaganos-ai' ),
        'section' => 'jaganos_colors',
    ) ) );

    // Background Color
    $wp_customize->add_setting( 'jaganos_background_color', array(
        'default'           => '#0d0d0d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jaganos_background_color', array(
        'label'   => __( 'Background Color', 'jaganos-ai' ),
        'section' => 'jaganos_colors',
    ) ) );

    // Accent Color
    $wp_customize->add_setting( 'jaganos_accent_color', array(
        'default'           => '#404040',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jaganos_accent_color', array(
        'label'   => __( 'Accent Color', 'jaganos-ai' ),
        'section' => 'jaganos_colors',
    ) ) );

    // =========================================
    // Social Links Section
    // =========================================
    
    $wp_customize->add_section( 'jaganos_social', array(
        'title'    => __( 'Social Links', 'jaganos-ai' ),
        'priority' => 50,
    ) );

    // Twitter
    $wp_customize->add_setting( 'jaganos_social_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_social_twitter', array(
        'label'   => __( 'Twitter URL', 'jaganos-ai' ),
        'section' => 'jaganos_social',
        'type'    => 'url',
    ) );

    // Instagram
    $wp_customize->add_setting( 'jaganos_social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_social_instagram', array(
        'label'   => __( 'Instagram URL', 'jaganos-ai' ),
        'section' => 'jaganos_social',
        'type'    => 'url',
    ) );

    // YouTube
    $wp_customize->add_setting( 'jaganos_social_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_social_youtube', array(
        'label'   => __( 'YouTube URL', 'jaganos-ai' ),
        'section' => 'jaganos_social',
        'type'    => 'url',
    ) );

    // =========================================
    // Footer Section
    // =========================================
    
    $wp_customize->add_section( 'jaganos_footer', array(
        'title'    => __( 'Footer Settings', 'jaganos-ai' ),
        'priority' => 60,
    ) );

    // Footer Description
    $wp_customize->add_setting( 'jaganos_footer_description', array(
        'default'           => 'Luxury AI Portfolio',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_footer_description', array(
        'label'   => __( 'Footer Description', 'jaganos-ai' ),
        'section' => 'jaganos_footer',
        'type'    => 'textarea',
    ) );

    // Contact Email
    $wp_customize->add_setting( 'jaganos_contact_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_contact_email', array(
        'label'   => __( 'Contact Email', 'jaganos-ai' ),
        'section' => 'jaganos_footer',
        'type'    => 'email',
    ) );

    // Show Theme Credits
    $wp_customize->add_setting( 'jaganos_footer_credits', array(
        'default'           => true,
        'sanitize_callback' => 'jaganos_sanitize_checkbox',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'jaganos_footer_credits', array(
        'label'   => __( 'Show Theme Credits', 'jaganos-ai' ),
        'section' => 'jaganos_footer',
        'type'    => 'checkbox',
    ) );

}
add_action( 'customize_register', 'jaganos_customize_register' );

/**
 * Sanitize Checkbox
 */
function jaganos_sanitize_checkbox( $checked ) {
    return ( isset( $checked ) && true === $checked ) ? true : false;
}

/**
 * Output Custom CSS from Customizer Settings
 */
function jaganos_customizer_css() {
    $primary_color    = get_theme_mod( 'jaganos_primary_color', '#c7c7c7' );
    $background_color = get_theme_mod( 'jaganos_background_color', '#0d0d0d' );
    $accent_color     = get_theme_mod( 'jaganos_accent_color', '#404040' );
    
    ?>
    <style type="text/css">
        :root {
            --color-primary: <?php echo esc_attr( $primary_color ); ?>;
            --color-background: <?php echo esc_attr( $background_color ); ?>;
            --color-accent: <?php echo esc_attr( $accent_color ); ?>;
            --aluminum: <?php echo esc_attr( $primary_color ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'jaganos_customizer_css' );

/**
 * Enqueue Customizer Preview Script
 */
function jaganos_customize_preview_js() {
    wp_enqueue_script(
        'jaganos-customizer',
        JAGANOS_URI . '/assets/js/customizer.js',
        array( 'customize-preview' ),
        JAGANOS_VERSION,
        true
    );
}
add_action( 'customize_preview_init', 'jaganos_customize_preview_js' );
