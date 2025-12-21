<?php
/**
 * Jaganos AI Theme Functions
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Constants
 */
define( 'JAGANOS_VERSION', '1.0.0' );
define( 'JAGANOS_DIR', get_template_directory() );
define( 'JAGANOS_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function jaganos_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'jaganos-ai', JAGANOS_DIR . '/languages' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Custom logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Custom background support
    add_theme_support( 'custom-background', array(
        'default-color' => '0d0d0d',
    ) );

    // HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'jaganos-ai' ),
        'footer'  => esc_html__( 'Footer Menu', 'jaganos-ai' ),
    ) );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Custom image sizes
    add_image_size( 'jaganos-hero', 1920, 1080, true );
    add_image_size( 'jaganos-card', 600, 400, true );
}
add_action( 'after_setup_theme', 'jaganos_theme_setup' );

/**
 * Enqueue Scripts and Styles
 */
function jaganos_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'jaganos-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main Stylesheet
    wp_enqueue_style(
        'jaganos-style',
        get_stylesheet_uri(),
        array( 'jaganos-google-fonts' ),
        JAGANOS_VERSION
    );

    // Theme JavaScript
    wp_enqueue_script(
        'jaganos-script',
        JAGANOS_URI . '/assets/js/main.js',
        array(),
        JAGANOS_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script( 'jaganos-script', 'jaganosAjax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'jaganos_nonce' ),
    ) );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'jaganos_enqueue_assets' );

/**
 * Register Custom Post Types
 */
function jaganos_register_post_types() {
    // Videos Post Type
    register_post_type( 'jaganos_video', array(
        'labels' => array(
            'name'               => esc_html__( 'Videos', 'jaganos-ai' ),
            'singular_name'      => esc_html__( 'Video', 'jaganos-ai' ),
            'add_new'            => esc_html__( 'Add New Video', 'jaganos-ai' ),
            'add_new_item'       => esc_html__( 'Add New Video', 'jaganos-ai' ),
            'edit_item'          => esc_html__( 'Edit Video', 'jaganos-ai' ),
            'view_item'          => esc_html__( 'View Video', 'jaganos-ai' ),
            'all_items'          => esc_html__( 'All Videos', 'jaganos-ai' ),
            'search_items'       => esc_html__( 'Search Videos', 'jaganos-ai' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-video-alt3',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite'       => array( 'slug' => 'videos' ),
    ) );

    // Music Post Type
    register_post_type( 'jaganos_music', array(
        'labels' => array(
            'name'               => esc_html__( 'Music', 'jaganos-ai' ),
            'singular_name'      => esc_html__( 'Track', 'jaganos-ai' ),
            'add_new'            => esc_html__( 'Add New Track', 'jaganos-ai' ),
            'add_new_item'       => esc_html__( 'Add New Track', 'jaganos-ai' ),
            'edit_item'          => esc_html__( 'Edit Track', 'jaganos-ai' ),
            'view_item'          => esc_html__( 'View Track', 'jaganos-ai' ),
            'all_items'          => esc_html__( 'All Tracks', 'jaganos-ai' ),
            'search_items'       => esc_html__( 'Search Tracks', 'jaganos-ai' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-format-audio',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite'       => array( 'slug' => 'music' ),
    ) );
}
add_action( 'init', 'jaganos_register_post_types' );

/**
 * Register Widget Areas
 */
function jaganos_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'jaganos-ai' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here for blog sidebar.', 'jaganos-ai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'jaganos-ai' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'First footer widget area', 'jaganos-ai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'jaganos-ai' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Second footer widget area', 'jaganos-ai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'jaganos-ai' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Third footer widget area', 'jaganos-ai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'jaganos_widgets_init' );

/**
 * Include Customizer Settings
 */
require_once JAGANOS_DIR . '/inc/customizer.php';

/**
 * Custom Template Tags
 */
if ( ! function_exists( 'jaganos_posted_on' ) ) {
    function jaganos_posted_on() {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        
        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );

        echo '<span class="posted-on">' . $time_string . '</span>';
    }
}

if ( ! function_exists( 'jaganos_posted_by' ) ) {
    function jaganos_posted_by() {
        echo '<span class="byline">';
        echo '<span class="author vcard">';
        echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">';
        echo esc_html( get_the_author() );
        echo '</a></span></span>';
    }
}

/**
 * Language Switcher Helper (for multi-language plugins)
 */
function jaganos_language_switcher() {
    // Works with WPML, Polylang, or custom implementation
    if ( function_exists( 'pll_the_languages' ) ) {
        // Polylang
        pll_the_languages( array( 'show_flags' => 0, 'show_names' => 1 ) );
    } elseif ( function_exists( 'icl_get_languages' ) ) {
        // WPML
        $languages = icl_get_languages( 'skip_missing=0' );
        if ( ! empty( $languages ) ) {
            echo '<div class="language-switcher">';
            foreach ( $languages as $lang ) {
                $active = $lang['active'] ? ' active' : '';
                echo '<a href="' . esc_url( $lang['url'] ) . '" class="lang-item' . $active . '">';
                echo esc_html( strtoupper( $lang['language_code'] ) );
                echo '</a>';
            }
            echo '</div>';
        }
    } else {
        // Default supported languages (for custom implementation)
        $languages = array( 'EN', 'FR', 'DE', 'CZ', 'PL' );
        echo '<div class="language-switcher">';
        foreach ( $languages as $lang ) {
            echo '<button type="button" class="lang-btn" data-lang="' . esc_attr( strtolower( $lang ) ) . '">';
            echo esc_html( $lang );
            echo '</button>';
        }
        echo '</div>';
    }
}
