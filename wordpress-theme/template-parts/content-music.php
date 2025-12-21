<?php
/**
 * Template part for displaying single music tracks
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'music-single' ); ?>>
    
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title aluminum-text">', '</h1>' ); ?>
    </header>
    
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="music-cover-large">
            <?php the_post_thumbnail( 'large', array( 'class' => 'album-cover' ) ); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-content music-content">
        <?php
        the_content();
        
        // Audio embed if using custom field
        $audio_url = get_post_meta( get_the_ID(), 'jaganos_audio_url', true );
        if ( $audio_url ) :
        ?>
            <div class="audio-player">
                <?php echo wp_audio_shortcode( array( 'src' => $audio_url ) ); ?>
            </div>
        <?php endif; ?>
        
        <?php
        // Spotify/SoundCloud embed
        $embed_url = get_post_meta( get_the_ID(), 'jaganos_music_embed', true );
        if ( $embed_url ) :
        ?>
            <div class="music-embed">
                <?php echo wp_oembed_get( $embed_url ); ?>
            </div>
        <?php endif; ?>
    </div>
    
    <footer class="entry-footer">
        <?php
        edit_post_link(
            esc_html__( 'Edit Track', 'jaganos-ai' ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer>
    
</article>
