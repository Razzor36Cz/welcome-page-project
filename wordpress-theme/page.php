<?php
/**
 * The template for displaying pages
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
                
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title aluminum-text">', '</h1>' ); ?>
                </header>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail( 'jaganos-hero', array( 'class' => 'featured-image' ) ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php
                    the_content();
                    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jaganos-ai' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
                
                <?php if ( get_edit_post_link() ) : ?>
                    <footer class="entry-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: Page title */
                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'jaganos-ai' ),
                                    array( 'span' => array( 'class' => array() ) )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer>
                <?php endif; ?>
                
            </article>
            
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
            
        <?php endwhile; ?>
        
    </div>
</main>

<?php
get_footer();
