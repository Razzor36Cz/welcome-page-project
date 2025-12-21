<?php
/**
 * The template for displaying archive pages
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        
        <header class="archive-header">
            <?php
            the_archive_title( '<h1 class="archive-title aluminum-text">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header>
        
        <?php if ( have_posts() ) : ?>
            
            <div class="posts-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card archive-card' ); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="card-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'jaganos-card' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-content">
                            <header class="entry-header">
                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                            </header>
                            
                            <div class="entry-meta">
                                <?php
                                jaganos_posted_on();
                                ?>
                            </div>
                            
                            <div class="entry-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                                <?php esc_html_e( 'Read More', 'jaganos-ai' ); ?>
                            </a>
                        </div>
                        
                    </article>
                    
                <?php endwhile; ?>
            </div>
            
            <?php the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '&larr; ' . esc_html__( 'Previous', 'jaganos-ai' ),
                'next_text' => esc_html__( 'Next', 'jaganos-ai' ) . ' &rarr;',
            ) ); ?>
            
        <?php else : ?>
            
            <div class="no-results">
                <h2><?php esc_html_e( 'Nothing Found', 'jaganos-ai' ); ?></h2>
                <p><?php esc_html_e( 'Sorry, but nothing matched your criteria.', 'jaganos-ai' ); ?></p>
            </div>
            
        <?php endif; ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer();
