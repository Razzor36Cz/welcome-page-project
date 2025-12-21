<?php
/**
 * Template part for displaying posts in archive/loop
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card post-card' ); ?>>
    
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="card-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'jaganos-card', array( 'class' => 'post-thumbnail' ) ); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="card-content">
        <header class="entry-header">
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title aluminum-text">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
            endif;
            ?>
            
            <div class="entry-meta">
                <?php
                jaganos_posted_on();
                echo ' &bull; ';
                jaganos_posted_by();
                ?>
            </div>
        </header>
        
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                <?php esc_html_e( 'Read More', 'jaganos-ai' ); ?>
            </a>
        </footer>
    </div>
    
</article>
