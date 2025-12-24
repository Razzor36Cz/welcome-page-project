<?php
/**
 * Music Archive Template
 * @package Jaganos_AI_Theme
 */

get_header();
?>

<main id="main-content" class="site-main page-content">
    <div class="container" style="max-width: 800px;">
        <header class="page-header fade-in-up">
            <h1 class="aluminum-text" data-translate="music"><?php echo esc_html( jaganos_translate( 'music' ) ); ?></h1>
            <p data-translate="featuredTracks"><?php echo esc_html( jaganos_translate( 'featuredTracks' ) ); ?></p>
            <div class="header-divider"></div>
        </header>

        <div class="music-list">
            <?php
            $i = 0;
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    $audio_url = get_post_meta( get_the_ID(), '_jaganos_audio_url', true );
                    $artist = get_post_meta( get_the_ID(), '_jaganos_artist', true ) ?: 'Jaganos AI';
                    $duration = get_post_meta( get_the_ID(), '_jaganos_duration', true );
                    $i++;
            ?>
                <div class="music-track aluminum-surface fade-in delay-<?php echo $i; ?>" data-audio="<?php echo esc_url( $audio_url ); ?>">
                    <button class="music-play-btn">
                        <svg class="play-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                        <svg class="pause-icon" style="display:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
                    </button>
                    <div class="music-info">
                        <h3><?php the_title(); ?></h3>
                        <p class="artist"><?php echo esc_html( $artist ); ?></p>
                    </div>
                    <?php if ( $duration ) : ?>
                        <span class="music-duration"><?php echo esc_html( $duration ); ?></span>
                    <?php endif; ?>
                    <div class="music-progress"><div class="music-progress-bar"></div></div>
                </div>
            <?php
                endwhile;
            else :
            ?>
                <p><?php esc_html_e( 'No tracks found.', 'jaganos-ai' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
