<?php
/**
 * Template Name: About Page
 * @package Jaganos_AI_Theme
 */

get_header();
$email = get_theme_mod( 'jaganos_contact_email', 'contact@jaganosai.com' );
$skills = array( 'Video Production', 'Motion Graphics', 'Sound Design', 'Color Grading', 'Photography', 'Digital Art' );
?>

<main id="main-content" class="site-main page-content">
    <div class="container" style="max-width: 800px;">
        <header class="page-header fade-in-up">
            <h1 class="aluminum-text" data-translate="aboutMe"><?php echo esc_html( jaganos_translate( 'aboutMe' ) ); ?></h1>
            <div class="header-divider"></div>
        </header>

        <!-- Biography -->
        <div class="about-section aluminum-surface fade-in" style="padding: 2rem 3rem; margin-bottom: 2rem;">
            <div class="about-section-content">
                <div class="icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <div class="about-section-text">
                    <h2 data-translate="biography"><?php echo esc_html( jaganos_translate( 'biography' ) ); ?></h2>
                    <p data-translate="biographyText"><?php echo esc_html( jaganos_translate( 'biographyText' ) ); ?></p>
                </div>
            </div>
        </div>

        <!-- Skills -->
        <div class="about-section aluminum-surface fade-in-delayed" style="padding: 2rem 3rem; margin-bottom: 2rem;">
            <div class="about-section-content">
                <div class="icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
                </div>
                <div class="about-section-text" style="flex:1;">
                    <h2 data-translate="skills"><?php echo esc_html( jaganos_translate( 'skills' ) ); ?></h2>
                    <div class="skills-list">
                        <?php foreach ( $skills as $skill ) : ?>
                            <span class="skill-tag"><?php echo esc_html( $skill ); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div class="about-section aluminum-surface fade-in-delayed" style="padding: 2rem 3rem;">
            <div class="about-section-content">
                <div class="icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                </div>
                <div class="about-section-text">
                    <h2 data-translate="contact"><?php echo esc_html( jaganos_translate( 'contact' ) ); ?></h2>
                    <p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
