<?php
/**
 * The footer template
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

?>

    <footer id="colophon" class="site-footer">
        <div class="container">
            
            <div class="footer-content">
                
                <!-- Footer Widget Area 1 -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    <?php else : ?>
                        <h4><?php echo esc_html( get_theme_mod( 'jaganos_site_title', 'JAGANOS AI' ) ); ?></h4>
                        <p><?php echo esc_html( get_theme_mod( 'jaganos_footer_description', __( 'Luxury AI Portfolio', 'jaganos-ai' ) ) ); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 2 -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Quick Links', 'jaganos-ai' ); ?></h4>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => 'jaganos_footer_fallback_menu',
                        ) );
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Footer Widget Area 3 -->
                <div class="footer-section">
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    <?php else : ?>
                        <h4><?php esc_html_e( 'Contact', 'jaganos-ai' ); ?></h4>
                        <ul>
                            <?php if ( get_theme_mod( 'jaganos_contact_email' ) ) : ?>
                                <li>
                                    <a href="mailto:<?php echo esc_attr( get_theme_mod( 'jaganos_contact_email' ) ); ?>">
                                        <?php echo esc_html( get_theme_mod( 'jaganos_contact_email' ) ); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ( get_theme_mod( 'jaganos_social_twitter' ) ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'jaganos_social_twitter' ) ); ?>" target="_blank" rel="noopener">
                                        Twitter
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ( get_theme_mod( 'jaganos_social_instagram' ) ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'jaganos_social_instagram' ) ); ?>" target="_blank" rel="noopener">
                                        Instagram
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ( get_theme_mod( 'jaganos_social_youtube' ) ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'jaganos_social_youtube' ) ); ?>" target="_blank" rel="noopener">
                                        YouTube
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>
                    &copy; <?php echo date( 'Y' ); ?> 
                    <?php echo esc_html( get_theme_mod( 'jaganos_site_title', 'JAGANOS AI' ) ); ?>. 
                    <?php esc_html_e( 'All rights reserved.', 'jaganos-ai' ); ?>
                </p>
                <?php if ( get_theme_mod( 'jaganos_footer_credits', true ) ) : ?>
                    <p class="theme-credit">
                        <?php
                        printf(
                            /* translators: %s: Theme name */
                            esc_html__( 'Theme: %s', 'jaganos-ai' ),
                            'Jaganos AI Theme'
                        );
                        ?>
                    </p>
                <?php endif; ?>
            </div>

        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Footer fallback menu
 */
function jaganos_footer_fallback_menu() {
    ?>
    <ul id="footer-menu" class="menu">
        <li><a href="#about"><?php esc_html_e( 'About', 'jaganos-ai' ); ?></a></li>
        <li><a href="#videos"><?php esc_html_e( 'Videos', 'jaganos-ai' ); ?></a></li>
        <li><a href="#music"><?php esc_html_e( 'Music', 'jaganos-ai' ); ?></a></li>
        <li><a href="#prompt"><?php esc_html_e( 'Prompt', 'jaganos-ai' ); ?></a></li>
    </ul>
    <?php
}
