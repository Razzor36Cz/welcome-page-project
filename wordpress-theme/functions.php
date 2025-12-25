<?php
/**
 * Jaganos AI Block Theme Functions
 *
 * @package Jaganos_AI_Block_Theme
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'JAGANOS_VERSION', '2.0.0' );
define( 'JAGANOS_DIR', get_template_directory() );
define( 'JAGANOS_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function jaganos_setup() {
    // Translations - default Czech
    load_theme_textdomain( 'jaganos-ai', JAGANOS_DIR . '/languages' );

    // Block theme support
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array( 'style', 'script', 'search-form', 'gallery', 'caption' ) );

    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Image sizes
    add_image_size( 'jaganos-hero', 1920, 1080, true );
    add_image_size( 'jaganos-card', 600, 400, true );
    add_image_size( 'jaganos-video-thumb', 640, 360, true );
}
add_action( 'after_setup_theme', 'jaganos_setup' );

/**
 * Set default locale to Czech
 */
function jaganos_default_locale( $locale ) {
    if ( ! get_option( 'WPLANG' ) ) {
        return 'cs_CZ';
    }
    return $locale;
}
add_filter( 'locale', 'jaganos_default_locale' );

/**
 * Enqueue frontend assets
 */
function jaganos_enqueue_assets() {
    // Main theme script
    wp_enqueue_script(
        'jaganos-script',
        JAGANOS_URI . '/assets/js/main.js',
        array(),
        JAGANOS_VERSION,
        true
    );

    // Localize translations
    wp_localize_script( 'jaganos-script', 'jaganosData', array(
        'ajaxurl'      => admin_url( 'admin-ajax.php' ),
        'nonce'        => wp_create_nonce( 'jaganos_nonce' ),
        'homeUrl'      => home_url( '/' ),
        'translations' => jaganos_get_translations(),
        'currentLang'  => jaganos_get_current_language(),
    ) );
}
add_action( 'wp_enqueue_scripts', 'jaganos_enqueue_assets' );

/**
 * Enqueue block editor assets
 */
function jaganos_editor_assets() {
    wp_enqueue_style(
        'jaganos-editor',
        JAGANOS_URI . '/assets/css/editor.css',
        array(),
        JAGANOS_VERSION
    );
}
add_action( 'enqueue_block_editor_assets', 'jaganos_editor_assets' );

/**
 * Get translations array
 */
function jaganos_get_translations() {
    return array(
        'EN' => array(
            'enter'           => 'Enter',
            'welcome'         => 'Welcome to the Experience',
            'aboutMe'         => 'About Me',
            'videoGallery'    => 'Video Gallery',
            'music'           => 'Music',
            'prompt'          => 'Prompt',
            'biography'       => 'Biography',
            'biographyText'   => 'A creative professional passionate about video production, music, and digital art.',
            'skills'          => 'Skills',
            'contact'         => 'Contact',
            'latestWorks'     => 'Latest Works',
            'featuredTracks'  => 'Featured Tracks',
            'creativePrompts' => 'Creative Prompts',
            'copied'          => 'Copied!',
            'promptCopied'    => 'Prompt copied to clipboard',
        ),
        'CZ' => array(
            'enter'           => 'Vstoupit',
            'welcome'         => 'Vítejte v zážitku',
            'aboutMe'         => 'O mně',
            'videoGallery'    => 'Video galerie',
            'music'           => 'Hudba',
            'prompt'          => 'Prompt',
            'biography'       => 'Biografie',
            'biographyText'   => 'Kreativní profesionál s vášní pro video produkci, hudbu a digitální umění.',
            'skills'          => 'Dovednosti',
            'contact'         => 'Kontakt',
            'latestWorks'     => 'Nejnovější práce',
            'featuredTracks'  => 'Vybrané skladby',
            'creativePrompts' => 'Kreativní prompty',
            'copied'          => 'Zkopírováno!',
            'promptCopied'    => 'Prompt zkopírován do schránky',
        ),
        'DE' => array(
            'enter'           => 'Eintreten',
            'welcome'         => 'Willkommen zum Erlebnis',
            'aboutMe'         => 'Über mich',
            'videoGallery'    => 'Videogalerie',
            'music'           => 'Musik',
            'prompt'          => 'Prompt',
            'biography'       => 'Biografie',
            'biographyText'   => 'Ein kreativer Profi mit Leidenschaft für Videoproduktion, Musik und digitale Kunst.',
            'skills'          => 'Fähigkeiten',
            'contact'         => 'Kontakt',
            'latestWorks'     => 'Neueste Arbeiten',
            'featuredTracks'  => 'Ausgewählte Titel',
            'creativePrompts' => 'Kreative Prompts',
            'copied'          => 'Kopiert!',
            'promptCopied'    => 'Prompt in die Zwischenablage kopiert',
        ),
        'FR' => array(
            'enter'           => 'Entrer',
            'welcome'         => 'Bienvenue',
            'aboutMe'         => 'À propos',
            'videoGallery'    => 'Galerie vidéo',
            'music'           => 'Musique',
            'prompt'          => 'Prompt',
            'biography'       => 'Biographie',
            'biographyText'   => 'Un professionnel créatif passionné par la production vidéo, la musique et l\'art numérique.',
            'skills'          => 'Compétences',
            'contact'         => 'Contact',
            'latestWorks'     => 'Dernières œuvres',
            'featuredTracks'  => 'Titres en vedette',
            'creativePrompts' => 'Prompts créatifs',
            'copied'          => 'Copié!',
            'promptCopied'    => 'Prompt copié dans le presse-papiers',
        ),
        'PL' => array(
            'enter'           => 'Wejdź',
            'welcome'         => 'Witamy',
            'aboutMe'         => 'O mnie',
            'videoGallery'    => 'Galeria wideo',
            'music'           => 'Muzyka',
            'prompt'          => 'Prompt',
            'biography'       => 'Biografia',
            'biographyText'   => 'Kreatywny profesjonalista z pasją do produkcji wideo, muzyki i sztuki cyfrowej.',
            'skills'          => 'Umiejętności',
            'contact'         => 'Kontakt',
            'latestWorks'     => 'Najnowsze prace',
            'featuredTracks'  => 'Polecane utwory',
            'creativePrompts' => 'Kreatywne prompty',
            'copied'          => 'Skopiowano!',
            'promptCopied'    => 'Prompt skopiowany do schowka',
        ),
    );
}

/**
 * Get current language
 */
function jaganos_get_current_language() {
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        return strtoupper( ICL_LANGUAGE_CODE );
    }
    if ( function_exists( 'pll_current_language' ) ) {
        return strtoupper( pll_current_language() );
    }
    if ( isset( $_COOKIE['jaganos_lang'] ) ) {
        return sanitize_text_field( $_COOKIE['jaganos_lang'] );
    }
    return 'CZ';
}

/**
 * Register Custom Post Types
 */
function jaganos_register_post_types() {
    // Videos
    register_post_type( 'jaganos_video', array(
        'labels' => array(
            'name'          => __( 'Videos', 'jaganos-ai' ),
            'singular_name' => __( 'Video', 'jaganos-ai' ),
            'add_new'       => __( 'Add New Video', 'jaganos-ai' ),
            'add_new_item'  => __( 'Add New Video', 'jaganos-ai' ),
            'edit_item'     => __( 'Edit Video', 'jaganos-ai' ),
            'all_items'     => __( 'All Videos', 'jaganos-ai' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-video-alt3',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'      => array( 'slug' => 'videos' ),
        'show_in_rest' => true,
    ) );

    // Music
    register_post_type( 'jaganos_music', array(
        'labels' => array(
            'name'          => __( 'Music', 'jaganos-ai' ),
            'singular_name' => __( 'Track', 'jaganos-ai' ),
            'add_new'       => __( 'Add New Track', 'jaganos-ai' ),
            'add_new_item'  => __( 'Add New Track', 'jaganos-ai' ),
            'edit_item'     => __( 'Edit Track', 'jaganos-ai' ),
            'all_items'     => __( 'All Tracks', 'jaganos-ai' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-format-audio',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'      => array( 'slug' => 'music' ),
        'show_in_rest' => true,
    ) );

    // Prompts
    register_post_type( 'jaganos_prompt', array(
        'labels' => array(
            'name'          => __( 'Prompts', 'jaganos-ai' ),
            'singular_name' => __( 'Prompt', 'jaganos-ai' ),
            'add_new'       => __( 'Add New Prompt', 'jaganos-ai' ),
            'add_new_item'  => __( 'Add New Prompt', 'jaganos-ai' ),
            'edit_item'     => __( 'Edit Prompt', 'jaganos-ai' ),
            'all_items'     => __( 'All Prompts', 'jaganos-ai' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-lightbulb',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'rewrite'      => array( 'slug' => 'prompts' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'jaganos_register_post_types' );

/**
 * Register custom meta fields for block editor
 */
function jaganos_register_meta() {
    // Video meta
    register_post_meta( 'jaganos_video', 'video_url', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
    ) );
    register_post_meta( 'jaganos_video', 'video_duration', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
    ) );

    // Music meta
    register_post_meta( 'jaganos_music', 'audio_url', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
    ) );
    register_post_meta( 'jaganos_music', 'artist_name', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
        'default'      => 'Jaganos AI',
    ) );
    register_post_meta( 'jaganos_music', 'track_duration', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
    ) );

    // Prompt meta
    register_post_meta( 'jaganos_prompt', 'prompt_category', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
        'default'      => 'Image',
    ) );
}
add_action( 'init', 'jaganos_register_meta' );

/**
 * Register block patterns
 */
function jaganos_register_patterns() {
    register_block_pattern_category( 'jaganos', array(
        'label' => __( 'Jaganos AI', 'jaganos-ai' ),
    ) );
}
add_action( 'init', 'jaganos_register_patterns' );

/**
 * AJAX: Set language cookie
 */
function jaganos_set_language() {
    check_ajax_referer( 'jaganos_nonce', 'nonce' );
    
    if ( isset( $_POST['lang'] ) ) {
        $lang = sanitize_text_field( $_POST['lang'] );
        setcookie( 'jaganos_lang', $lang, time() + YEAR_IN_SECONDS, '/' );
        wp_send_json_success( array( 'lang' => $lang ) );
    }
    
    wp_send_json_error();
}
add_action( 'wp_ajax_jaganos_set_language', 'jaganos_set_language' );
add_action( 'wp_ajax_nopriv_jaganos_set_language', 'jaganos_set_language' );

/**
 * Add social links shortcode for use in patterns
 */
function jaganos_social_links_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'youtube'   => '',
        'instagram' => '',
        'facebook'  => '',
        'tiktok'    => '',
        'spotify'   => '',
    ), $atts );

    ob_start();
    ?>
    <div class="jaganos-social-bar glass-effect" style="position: fixed; bottom: 2rem; left: 50%; transform: translateX(-50%); z-index: 50; display: flex; gap: 2rem; padding: 1rem 2rem;">
        <?php if ( $atts['youtube'] ) : ?>
            <a href="<?php echo esc_url( $atts['youtube'] ); ?>" target="_blank" rel="noopener" class="social-youtube" style="color: hsl(0 0% 55%); transition: color 0.3s;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </a>
        <?php endif; ?>
        <?php if ( $atts['instagram'] ) : ?>
            <a href="<?php echo esc_url( $atts['instagram'] ); ?>" target="_blank" rel="noopener" class="social-instagram" style="color: hsl(0 0% 55%); transition: color 0.3s;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
        <?php endif; ?>
        <?php if ( $atts['facebook'] ) : ?>
            <a href="<?php echo esc_url( $atts['facebook'] ); ?>" target="_blank" rel="noopener" class="social-facebook" style="color: hsl(0 0% 55%); transition: color 0.3s;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
        <?php endif; ?>
        <?php if ( $atts['tiktok'] ) : ?>
            <a href="<?php echo esc_url( $atts['tiktok'] ); ?>" target="_blank" rel="noopener" class="social-tiktok" style="color: hsl(0 0% 55%); transition: color 0.3s;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
            </a>
        <?php endif; ?>
        <?php if ( $atts['spotify'] ) : ?>
            <a href="<?php echo esc_url( $atts['spotify'] ); ?>" target="_blank" rel="noopener" class="social-spotify" style="color: hsl(0 0% 55%); transition: color 0.3s;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>
            </a>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'jaganos_social', 'jaganos_social_links_shortcode' );
