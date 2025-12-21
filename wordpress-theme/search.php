<?php
/**
 * The template for displaying search results
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        
        <header class="search-header">
            <h1 class="search-title aluminum-text">
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results for: %s', 'jaganos-ai' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h1>
        </header>
        
        <?php if ( have_posts() ) : ?>
            
            <div class="search-results-count">
                <?php
                global $wp_query;
                printf(
                    esc_html( _n( '%d result found', '%d results found', $wp_query->found_posts, 'jaganos-ai' ) ),
                    $wp_query->found_posts
                );
                ?>
            </div>
            
            <div class="posts-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card search-result-card' ); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="card-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'jaganos-card' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-content">
                            <header class="entry-header">
                                <span class="post-type-label">
                                    <?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?>
                                </span>
                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                            </header>
                            
                            <div class="entry-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                                <?php esc_html_e( 'View', 'jaganos-ai' ); ?>
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
                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'jaganos-ai' ); ?></p>
                
                <div class="search-again">
                    <?php get_search_form(); ?>
                </div>
            </div>
            
        <?php endif; ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer();
