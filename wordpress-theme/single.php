<?php
/**
 * The template for displaying single posts
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
                
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title aluminum-text">', '</h1>' ); ?>
                    
                    <div class="entry-meta">
                        <?php
                        jaganos_posted_on();
                        echo ' &bull; ';
                        jaganos_posted_by();
                        ?>
                    </div>
                </header>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail( 'jaganos-hero', array( 'class' => 'featured-image' ) ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Post title */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'jaganos-ai' ),
                                array( 'span' => array( 'class' => array() ) )
                            ),
                            get_the_title()
                        )
                    );
                    
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jaganos-ai' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
                
                <footer class="entry-footer">
                    <?php
                    // Categories
                    $categories_list = get_the_category_list( ', ' );
                    if ( $categories_list ) {
                        printf( '<span class="cat-links">' . esc_html__( 'Posted in: %s', 'jaganos-ai' ) . '</span>', $categories_list );
                    }
                    
                    // Tags
                    $tags_list = get_the_tag_list( '', ', ' );
                    if ( $tags_list ) {
                        printf( '<span class="tags-links">' . esc_html__( 'Tagged: %s', 'jaganos-ai' ) . '</span>', $tags_list );
                    }
                    
                    // Edit link
                    edit_post_link(
                        sprintf(
                            wp_kses(
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
                
            </article>
            
            <!-- Post Navigation -->
            <nav class="post-navigation">
                <div class="nav-links">
                    <?php
                    previous_post_link( '<div class="nav-previous">%link</div>', '&larr; %title' );
                    next_post_link( '<div class="nav-next">%link</div>', '%title &rarr;' );
                    ?>
                </div>
            </nav>
            
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
get_sidebar();
get_footer();
