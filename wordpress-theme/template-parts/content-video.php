<?php
/**
 * Template part for displaying single videos
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'video-single' ); ?>>
    
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title aluminum-text">', '</h1>' ); ?>
    </header>
    
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="video-featured">
            <?php the_post_thumbnail( 'jaganos-hero', array( 'class' => 'featured-video-image' ) ); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-content video-content">
        <?php
        the_content();
        
        // Video embed if using custom field
        $video_url = get_post_meta( get_the_ID(), 'jaganos_video_url', true );
        if ( $video_url ) :
        ?>
            <div class="video-embed">
                <?php echo wp_oembed_get( $video_url ); ?>
            </div>
        <?php endif; ?>
    </div>
    
    <footer class="entry-footer">
        <?php
        edit_post_link(
            esc_html__( 'Edit Video', 'jaganos-ai' ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer>
    
</article>
