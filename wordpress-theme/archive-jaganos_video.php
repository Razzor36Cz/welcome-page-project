<?php
/**
 * Video Archive Template
 * @package Jaganos_AI_Theme
 */

get_header();
?>

<main id="main-content" class="site-main page-content">
    <div class="container" style="max-width: 1200px;">
        <header class="page-header fade-in-up">
            <h1 class="aluminum-text" data-translate="videoGallery"><?php echo esc_html( jaganos_translate( 'videoGallery' ) ); ?></h1>
            <p data-translate="latestWorks"><?php echo esc_html( jaganos_translate( 'latestWorks' ) ); ?></p>
            <div class="header-divider"></div>
        </header>

        <div class="video-grid">
            <?php
            $i = 0;
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    $video_url = get_post_meta( get_the_ID(), '_jaganos_video_url', true );
                    $duration = get_post_meta( get_the_ID(), '_jaganos_video_duration', true );
                    $i++;
            ?>
                <div class="video-card aluminum-surface fade-in delay-<?php echo $i; ?>" data-video="<?php echo esc_url( $video_url ); ?>">
                    <div class="video-thumbnail">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'jaganos-video-thumb' ); ?>
                        <?php endif; ?>
                        <div class="video-thumbnail-overlay"></div>
                        <div class="video-play-btn">
                            <div class="play-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                            </div>
                        </div>
                        <?php if ( $duration ) : ?>
                            <span class="video-duration"><?php echo esc_html( $duration ); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="video-info">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>
            <?php
                endwhile;
            else :
            ?>
                <p><?php esc_html_e( 'No videos found.', 'jaganos-ai' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
