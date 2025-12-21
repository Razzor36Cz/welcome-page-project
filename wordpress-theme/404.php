<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <section class="error-404 not-found">
        <div class="container">
            
            <div class="error-content">
                <h1 class="error-title aluminum-text">404</h1>
                <h2 class="error-subtitle"><?php esc_html_e( 'Page Not Found', 'jaganos-ai' ); ?></h2>
                <p class="error-message">
                    <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'jaganos-ai' ); ?>
                </p>
                
                <div class="error-actions">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                        <?php esc_html_e( 'Go Home', 'jaganos-ai' ); ?>
                    </a>
                </div>
                
                <div class="error-search">
                    <h3><?php esc_html_e( 'Or try searching:', 'jaganos-ai' ); ?></h3>
                    <?php get_search_form(); ?>
                </div>
            </div>
            
        </div>
    </section>
</main>

<?php
get_footer();
