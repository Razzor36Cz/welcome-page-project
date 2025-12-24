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
    // Make theme available for translation - default to Czech
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
        'default-color' => '080808',
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
    add_image_size( 'jaganos-video-thumb', 640, 360, true );
}
add_action( 'after_setup_theme', 'jaganos_theme_setup' );

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

    // Localize script for AJAX and translations
    wp_localize_script( 'jaganos-script', 'jaganosData', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'jaganos_nonce' ),
        'homeUrl' => home_url( '/' ),
        'translations' => jaganos_get_translations(),
        'currentLang' => jaganos_get_current_language(),
    ) );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'jaganos_enqueue_assets' );

/**
 * Get all translations for JavaScript
 */
function jaganos_get_translations() {
    return array(
        'EN' => array(
            'enter' => 'Enter',
            'welcome' => 'Welcome to the Experience',
            'aboutMe' => 'About Me',
            'videoGallery' => 'Video Gallery',
            'music' => 'Music',
            'prompt' => 'Prompt',
            'biography' => 'Biography',
            'biographyText' => 'A creative professional passionate about video production, music, and digital art. With years of experience in crafting visual and audio experiences, I bring unique perspectives to every project.',
            'skills' => 'Skills',
            'contact' => 'Contact',
            'latestWorks' => 'Latest Works',
            'featuredTracks' => 'Featured Tracks',
            'creativePrompts' => 'Creative Prompts',
            'logout' => 'Logout',
            'copied' => 'Copied!',
            'promptCopied' => 'Prompt copied to clipboard',
        ),
        'CZ' => array(
            'enter' => 'Vstoupit',
            'welcome' => 'Vítejte v zážitku',
            'aboutMe' => 'O mně',
            'videoGallery' => 'Video galerie',
            'music' => 'Hudba',
            'prompt' => 'Prompt',
            'biography' => 'Biografie',
            'biographyText' => 'Kreativní profesionál s vášní pro video produkci, hudbu a digitální umění. S mnohaletými zkušenostmi v tvorbě vizuálních a zvukových zážitků přináším jedinečný pohled do každého projektu.',
            'skills' => 'Dovednosti',
            'contact' => 'Kontakt',
            'latestWorks' => 'Nejnovější práce',
            'featuredTracks' => 'Vybrané skladby',
            'creativePrompts' => 'Kreativní prompty',
            'logout' => 'Odhlásit',
            'copied' => 'Zkopírováno!',
            'promptCopied' => 'Prompt zkopírován do schránky',
        ),
        'DE' => array(
            'enter' => 'Eintreten',
            'welcome' => 'Willkommen zum Erlebnis',
            'aboutMe' => 'Über mich',
            'videoGallery' => 'Videogalerie',
            'music' => 'Musik',
            'prompt' => 'Prompt',
            'biography' => 'Biografie',
            'biographyText' => 'Ein kreativer Profi mit Leidenschaft für Videoproduktion, Musik und digitale Kunst. Mit jahrelanger Erfahrung in der Gestaltung visueller und akustischer Erlebnisse bringe ich einzigartige Perspektiven in jedes Projekt.',
            'skills' => 'Fähigkeiten',
            'contact' => 'Kontakt',
            'latestWorks' => 'Neueste Arbeiten',
            'featuredTracks' => 'Ausgewählte Titel',
            'creativePrompts' => 'Kreative Prompts',
            'logout' => 'Abmelden',
            'copied' => 'Kopiert!',
            'promptCopied' => 'Prompt in die Zwischenablage kopiert',
        ),
        'FR' => array(
            'enter' => 'Entrer',
            'welcome' => 'Bienvenue dans l\'expérience',
            'aboutMe' => 'À propos',
            'videoGallery' => 'Galerie vidéo',
            'music' => 'Musique',
            'prompt' => 'Prompt',
            'biography' => 'Biographie',
            'biographyText' => 'Un professionnel créatif passionné par la production vidéo, la musique et l\'art numérique. Avec des années d\'expérience dans la création d\'expériences visuelles et sonores, j\'apporte des perspectives uniques à chaque projet.',
            'skills' => 'Compétences',
            'contact' => 'Contact',
            'latestWorks' => 'Dernières œuvres',
            'featuredTracks' => 'Titres en vedette',
            'creativePrompts' => 'Prompts créatifs',
            'logout' => 'Déconnexion',
            'copied' => 'Copié!',
            'promptCopied' => 'Prompt copié dans le presse-papiers',
        ),
        'PL' => array(
            'enter' => 'Wejdź',
            'welcome' => 'Witamy w doświadczeniu',
            'aboutMe' => 'O mnie',
            'videoGallery' => 'Galeria wideo',
            'music' => 'Muzyka',
            'prompt' => 'Prompt',
            'biography' => 'Biografia',
            'biographyText' => 'Kreatywny profesjonalista z pasją do produkcji wideo, muzyki i sztuki cyfrowej. Z wieloletnim doświadczeniem w tworzeniu wizualnych i dźwiękowych doświadczeń, wnoszę unikalne perspektywy do każdego projektu.',
            'skills' => 'Umiejętności',
            'contact' => 'Kontakt',
            'latestWorks' => 'Najnowsze prace',
            'featuredTracks' => 'Polecane utwory',
            'creativePrompts' => 'Kreatywne prompty',
            'logout' => 'Wyloguj',
            'copied' => 'Skopiowano!',
            'promptCopied' => 'Prompt skopiowany do schowka',
        ),
    );
}

/**
 * Get current language (default: CZ)
 */
function jaganos_get_current_language() {
    // Check for WPML
    if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
        return strtoupper( ICL_LANGUAGE_CODE );
    }
    
    // Check for Polylang
    if ( function_exists( 'pll_current_language' ) ) {
        return strtoupper( pll_current_language() );
    }
    
    // Check session/cookie
    if ( isset( $_COOKIE['jaganos_lang'] ) ) {
        return sanitize_text_field( $_COOKIE['jaganos_lang'] );
    }
    
    // Default to Czech
    return 'CZ';
}

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
        'show_in_rest'  => true,
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
        'show_in_rest'  => true,
    ) );

    // Prompts Post Type
    register_post_type( 'jaganos_prompt', array(
        'labels' => array(
            'name'               => esc_html__( 'Prompts', 'jaganos-ai' ),
            'singular_name'      => esc_html__( 'Prompt', 'jaganos-ai' ),
            'add_new'            => esc_html__( 'Add New Prompt', 'jaganos-ai' ),
            'add_new_item'       => esc_html__( 'Add New Prompt', 'jaganos-ai' ),
            'edit_item'          => esc_html__( 'Edit Prompt', 'jaganos-ai' ),
            'view_item'          => esc_html__( 'View Prompt', 'jaganos-ai' ),
            'all_items'          => esc_html__( 'All Prompts', 'jaganos-ai' ),
            'search_items'       => esc_html__( 'Search Prompts', 'jaganos-ai' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-lightbulb',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'rewrite'       => array( 'slug' => 'prompts' ),
        'show_in_rest'  => true,
    ) );
}
add_action( 'init', 'jaganos_register_post_types' );

/**
 * Register Custom Taxonomies
 */
function jaganos_register_taxonomies() {
    // Prompt Categories
    register_taxonomy( 'prompt_category', 'jaganos_prompt', array(
        'labels' => array(
            'name'          => esc_html__( 'Prompt Categories', 'jaganos-ai' ),
            'singular_name' => esc_html__( 'Category', 'jaganos-ai' ),
        ),
        'hierarchical'  => true,
        'public'        => true,
        'rewrite'       => array( 'slug' => 'prompt-category' ),
        'show_in_rest'  => true,
    ) );
}
add_action( 'init', 'jaganos_register_taxonomies' );

/**
 * Add Meta Boxes
 */
function jaganos_add_meta_boxes() {
    // Video URL meta box
    add_meta_box(
        'jaganos_video_details',
        esc_html__( 'Video Details', 'jaganos-ai' ),
        'jaganos_video_meta_callback',
        'jaganos_video',
        'normal',
        'high'
    );

    // Music meta box
    add_meta_box(
        'jaganos_music_details',
        esc_html__( 'Track Details', 'jaganos-ai' ),
        'jaganos_music_meta_callback',
        'jaganos_music',
        'normal',
        'high'
    );

    // Prompt meta box
    add_meta_box(
        'jaganos_prompt_details',
        esc_html__( 'Prompt Details', 'jaganos-ai' ),
        'jaganos_prompt_meta_callback',
        'jaganos_prompt',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'jaganos_add_meta_boxes' );

/**
 * Video Meta Box Callback
 */
function jaganos_video_meta_callback( $post ) {
    wp_nonce_field( 'jaganos_video_meta', 'jaganos_video_meta_nonce' );
    
    $video_url = get_post_meta( $post->ID, '_jaganos_video_url', true );
    $video_duration = get_post_meta( $post->ID, '_jaganos_video_duration', true );
    ?>
    <p>
        <label for="jaganos_video_url"><strong><?php esc_html_e( 'Video URL (YouTube, Vimeo, or direct)', 'jaganos-ai' ); ?></strong></label><br>
        <input type="url" id="jaganos_video_url" name="jaganos_video_url" value="<?php echo esc_attr( $video_url ); ?>" style="width: 100%;" />
    </p>
    <p>
        <label for="jaganos_video_duration"><strong><?php esc_html_e( 'Duration (e.g., 3:45)', 'jaganos-ai' ); ?></strong></label><br>
        <input type="text" id="jaganos_video_duration" name="jaganos_video_duration" value="<?php echo esc_attr( $video_duration ); ?>" placeholder="0:00" />
    </p>
    <?php
}

/**
 * Music Meta Box Callback
 */
function jaganos_music_meta_callback( $post ) {
    wp_nonce_field( 'jaganos_music_meta', 'jaganos_music_meta_nonce' );
    
    $audio_url = get_post_meta( $post->ID, '_jaganos_audio_url', true );
    $artist = get_post_meta( $post->ID, '_jaganos_artist', true );
    $duration = get_post_meta( $post->ID, '_jaganos_duration', true );
    ?>
    <p>
        <label for="jaganos_audio_url"><strong><?php esc_html_e( 'Audio File URL or Upload', 'jaganos-ai' ); ?></strong></label><br>
        <input type="url" id="jaganos_audio_url" name="jaganos_audio_url" value="<?php echo esc_attr( $audio_url ); ?>" style="width: 80%;" />
        <button type="button" class="button jaganos-upload-audio"><?php esc_html_e( 'Upload', 'jaganos-ai' ); ?></button>
    </p>
    <p>
        <label for="jaganos_artist"><strong><?php esc_html_e( 'Artist Name', 'jaganos-ai' ); ?></strong></label><br>
        <input type="text" id="jaganos_artist" name="jaganos_artist" value="<?php echo esc_attr( $artist ); ?>" placeholder="Jaganos AI" />
    </p>
    <p>
        <label for="jaganos_duration"><strong><?php esc_html_e( 'Duration (e.g., 3:45)', 'jaganos-ai' ); ?></strong></label><br>
        <input type="text" id="jaganos_duration" name="jaganos_duration" value="<?php echo esc_attr( $duration ); ?>" placeholder="0:00" />
    </p>
    <?php
}

/**
 * Prompt Meta Box Callback
 */
function jaganos_prompt_meta_callback( $post ) {
    wp_nonce_field( 'jaganos_prompt_meta', 'jaganos_prompt_meta_nonce' );
    
    $category = get_post_meta( $post->ID, '_jaganos_prompt_category', true );
    ?>
    <p>
        <label for="jaganos_prompt_category"><strong><?php esc_html_e( 'Category (e.g., Video, Image, Audio, Photo)', 'jaganos-ai' ); ?></strong></label><br>
        <select id="jaganos_prompt_category" name="jaganos_prompt_category">
            <option value="Video" <?php selected( $category, 'Video' ); ?>>Video</option>
            <option value="Image" <?php selected( $category, 'Image' ); ?>>Image</option>
            <option value="Audio" <?php selected( $category, 'Audio' ); ?>>Audio</option>
            <option value="Photo" <?php selected( $category, 'Photo' ); ?>>Photo</option>
        </select>
    </p>
    <p class="description"><?php esc_html_e( 'The prompt content should be added in the main editor above.', 'jaganos-ai' ); ?></p>
    <?php
}

/**
 * Save Meta Box Data
 */
function jaganos_save_meta_boxes( $post_id ) {
    // Video meta
    if ( isset( $_POST['jaganos_video_meta_nonce'] ) && wp_verify_nonce( $_POST['jaganos_video_meta_nonce'], 'jaganos_video_meta' ) ) {
        if ( isset( $_POST['jaganos_video_url'] ) ) {
            update_post_meta( $post_id, '_jaganos_video_url', esc_url_raw( $_POST['jaganos_video_url'] ) );
        }
        if ( isset( $_POST['jaganos_video_duration'] ) ) {
            update_post_meta( $post_id, '_jaganos_video_duration', sanitize_text_field( $_POST['jaganos_video_duration'] ) );
        }
    }

    // Music meta
    if ( isset( $_POST['jaganos_music_meta_nonce'] ) && wp_verify_nonce( $_POST['jaganos_music_meta_nonce'], 'jaganos_music_meta' ) ) {
        if ( isset( $_POST['jaganos_audio_url'] ) ) {
            update_post_meta( $post_id, '_jaganos_audio_url', esc_url_raw( $_POST['jaganos_audio_url'] ) );
        }
        if ( isset( $_POST['jaganos_artist'] ) ) {
            update_post_meta( $post_id, '_jaganos_artist', sanitize_text_field( $_POST['jaganos_artist'] ) );
        }
        if ( isset( $_POST['jaganos_duration'] ) ) {
            update_post_meta( $post_id, '_jaganos_duration', sanitize_text_field( $_POST['jaganos_duration'] ) );
        }
    }

    // Prompt meta
    if ( isset( $_POST['jaganos_prompt_meta_nonce'] ) && wp_verify_nonce( $_POST['jaganos_prompt_meta_nonce'], 'jaganos_prompt_meta' ) ) {
        if ( isset( $_POST['jaganos_prompt_category'] ) ) {
            update_post_meta( $post_id, '_jaganos_prompt_category', sanitize_text_field( $_POST['jaganos_prompt_category'] ) );
        }
    }
}
add_action( 'save_post', 'jaganos_save_meta_boxes' );

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
 * Get translation for current language
 */
function jaganos_translate( $key ) {
    $translations = jaganos_get_translations();
    $lang = jaganos_get_current_language();
    
    if ( isset( $translations[ $lang ][ $key ] ) ) {
        return $translations[ $lang ][ $key ];
    }
    
    // Fallback to English
    if ( isset( $translations['EN'][ $key ] ) ) {
        return $translations['EN'][ $key ];
    }
    
    return $key;
}

/**
 * AJAX handler for language change
 */
function jaganos_set_language() {
    check_ajax_referer( 'jaganos_nonce', 'nonce' );
    
    if ( isset( $_POST['language'] ) ) {
        $lang = sanitize_text_field( $_POST['language'] );
        setcookie( 'jaganos_lang', $lang, time() + ( 365 * 24 * 60 * 60 ), COOKIEPATH, COOKIE_DOMAIN );
        wp_send_json_success( array( 'language' => $lang ) );
    }
    
    wp_send_json_error();
}
add_action( 'wp_ajax_jaganos_set_language', 'jaganos_set_language' );
add_action( 'wp_ajax_nopriv_jaganos_set_language', 'jaganos_set_language' );

/**
 * Admin scripts for media uploader
 */
function jaganos_admin_scripts( $hook ) {
    if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
        return;
    }
    
    wp_enqueue_media();
    wp_enqueue_script(
        'jaganos-admin',
        JAGANOS_URI . '/assets/js/admin.js',
        array( 'jquery' ),
        JAGANOS_VERSION,
        true
    );
}
add_action( 'admin_enqueue_scripts', 'jaganos_admin_scripts' );

/**
 * Get social links from customizer
 */
function jaganos_get_social_links() {
    return array(
        array(
            'name'  => 'youtube',
            'url'   => get_theme_mod( 'jaganos_youtube_url', 'https://www.youtube.com/@martinjakoubek116' ),
            'label' => 'YouTube',
        ),
        array(
            'name'  => 'instagram',
            'url'   => get_theme_mod( 'jaganos_instagram_url', 'https://www.instagram.com/jaga_nos?igsh=MW1wcHZ4bnRwaTZxdQ==' ),
            'label' => 'Instagram',
        ),
        array(
            'name'  => 'facebook',
            'url'   => get_theme_mod( 'jaganos_facebook_url', 'https://www.facebook.com/profile.php?id=61582613908107' ),
            'label' => 'Facebook',
        ),
    );
}

/**
 * Custom excerpt length
 */
function jaganos_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'jaganos_excerpt_length' );

/**
 * Custom excerpt more
 */
function jaganos_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'jaganos_excerpt_more' );
