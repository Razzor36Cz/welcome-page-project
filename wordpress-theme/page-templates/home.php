<?php
/**
 * Template Name: Home Page
 * @package Jaganos_AI_Theme
 */

get_header();
?>

<main id="main-content" class="site-main page-content">
    <!-- Hero Section -->
    <section class="hero-section container">
        <h1 class="hero-title aluminum-text fade-in-up"><?php echo esc_html( get_theme_mod( 'jaganos_hero_title', 'Creative Portfolio' ) ); ?></h1>
        <p class="hero-subtitle fade-in-delayed">Video • Music • Digital Art</p>
    </section>

    <!-- Featured Sections Grid -->
    <section class="container">
        <div class="sections-grid">
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="section-card aluminum-surface fade-in delay-1">
                <div class="section-card-inner">
                    <div>
                        <h2 data-translate="aboutMe"><?php echo esc_html( jaganos_translate( 'aboutMe' ) ); ?></h2>
                        <p>Discover my story and journey</p>
                    </div>
                    <svg class="section-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url( home_url( '/videos/' ) ); ?>" class="section-card aluminum-surface fade-in delay-2">
                <div class="section-card-inner">
                    <div>
                        <h2 data-translate="videoGallery"><?php echo esc_html( jaganos_translate( 'videoGallery' ) ); ?></h2>
                        <p>Watch my latest creations</p>
                    </div>
                    <svg class="section-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url( home_url( '/music/' ) ); ?>" class="section-card aluminum-surface fade-in delay-3">
                <div class="section-card-inner">
                    <div>
                        <h2 data-translate="music"><?php echo esc_html( jaganos_translate( 'music' ) ); ?></h2>
                        <p>Listen to featured tracks</p>
                    </div>
                    <svg class="section-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </div>
            </a>
            <a href="<?php echo esc_url( home_url( '/prompts/' ) ); ?>" class="section-card aluminum-surface fade-in delay-4">
                <div class="section-card-inner">
                    <div>
                        <h2 data-translate="prompt"><?php echo esc_html( jaganos_translate( 'prompt' ) ); ?></h2>
                        <p>Explore creative prompts</p>
                    </div>
                    <svg class="section-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </div>
            </a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
