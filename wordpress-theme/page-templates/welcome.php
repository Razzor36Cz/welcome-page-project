<?php
/**
 * Template Name: Welcome Page
 * @package Jaganos_AI_Theme
 */

get_header();
$video_url = get_theme_mod( 'jaganos_welcome_video', get_template_directory_uri() . '/assets/videos/welcome.mp4' );
?>

<div class="welcome-page">
    <!-- Language Selector -->
    <div class="welcome-language">
        <div class="language-switcher" id="language-switcher">
            <button type="button" class="language-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                <span id="current-lang"><?php echo esc_html( jaganos_get_current_language() ); ?></span>
            </button>
            <div class="language-dropdown">
                <button type="button" data-lang="EN">EN</button>
                <button type="button" data-lang="CZ" class="active">CZ</button>
                <button type="button" data-lang="DE">DE</button>
                <button type="button" data-lang="FR">FR</button>
                <button type="button" data-lang="PL">PL</button>
            </div>
        </div>
    </div>

    <!-- Video Background -->
    <video class="welcome-video" autoplay muted playsinline>
        <source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
    </video>

    <!-- Overlay -->
    <div class="welcome-overlay"></div>

    <!-- Enter Content -->
    <div class="welcome-content">
        <div class="welcome-line"></div>
        <button class="btn-enter" data-href="<?php echo esc_url( home_url( '/music/' ) ); ?>">
            <span data-translate="enter"><?php echo esc_html( jaganos_translate( 'enter' ) ); ?></span>
        </button>
        <p class="welcome-hint" data-translate="welcome"><?php echo esc_html( jaganos_translate( 'welcome' ) ); ?></p>
    </div>

    <!-- Skip Button -->
    <button class="skip-btn">Skip →</button>
</div>

<?php get_footer(); ?>
