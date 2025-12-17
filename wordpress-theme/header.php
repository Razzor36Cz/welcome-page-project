<?php
/**
 * The header template
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main-content">
        <?php esc_html_e( 'Skip to content', 'jaganos-ai' ); ?>
    </a>

    <header id="masthead" class="site-header">
        <div class="container">
            
            <!-- Site Branding -->
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php echo esc_html( get_theme_mod( 'jaganos_site_title', 'JAGANOS AI' ) ); ?>
                        </a>
                    </h1>
                <?php endif; ?>
            </div>

            <!-- Main Navigation -->
            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'jaganos-ai' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'jaganos_fallback_menu',
                ) );
                ?>
            </nav>

            <!-- Language Switcher -->
            <?php jaganos_language_switcher(); ?>

            <!-- Mobile Menu Toggle -->
            <button type="button" class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'jaganos-ai' ); ?></span>
                <span class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

        </div>
    </header>

<?php
/**
 * Fallback menu if no menu is assigned
 */
function jaganos_fallback_menu() {
    ?>
    <ul id="primary-menu" class="menu">
        <li><a href="#hero"><?php esc_html_e( 'Home', 'jaganos-ai' ); ?></a></li>
        <li><a href="#about"><?php esc_html_e( 'About Me', 'jaganos-ai' ); ?></a></li>
        <li><a href="#videos"><?php esc_html_e( 'Video Gallery', 'jaganos-ai' ); ?></a></li>
        <li><a href="#music"><?php esc_html_e( 'Music', 'jaganos-ai' ); ?></a></li>
        <li><a href="#prompt"><?php esc_html_e( 'Prompt', 'jaganos-ai' ); ?></a></li>
    </ul>
    <?php
}
