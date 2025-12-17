<?php
/**
 * The main template file
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    
    <?php if ( is_front_page() ) : ?>
        
        <!-- Hero Section -->
        <section id="hero" class="hero-section">
            <?php 
            $hero_video = get_theme_mod( 'jaganos_hero_video' );
            $hero_image = get_theme_mod( 'jaganos_hero_image' );
            ?>
            
            <div class="hero-background">
                <?php if ( $hero_video ) : ?>
                    <video autoplay muted loop playsinline>
                        <source src="<?php echo esc_url( $hero_video ); ?>" type="video/mp4">
                    </video>
                <?php elseif ( $hero_image ) : ?>
                    <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php esc_attr_e( 'Hero background', 'jaganos-ai' ); ?>">
                <?php endif; ?>
                <div class="hero-overlay"></div>
            </div>
            
            <div class="hero-content fade-in-up">
                <h1 class="hero-title aluminum-text">
                    <?php echo esc_html( get_theme_mod( 'jaganos_hero_title', __( 'JAGANOS AI', 'jaganos-ai' ) ) ); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo esc_html( get_theme_mod( 'jaganos_hero_subtitle', __( 'Luxury AI Portfolio', 'jaganos-ai' ) ) ); ?>
                </p>
                <?php if ( get_theme_mod( 'jaganos_hero_button_text' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'jaganos_hero_button_url', '#about' ) ); ?>" class="btn btn-primary">
                        <?php echo esc_html( get_theme_mod( 'jaganos_hero_button_text', __( 'Enter', 'jaganos-ai' ) ) ); ?>
                    </a>
                <?php endif; ?>
            </div>
        </section>
        
        <!-- About Section -->
        <section id="about" class="section">
            <div class="container">
                <h2 class="aluminum-text"><?php esc_html_e( 'About Me', 'jaganos-ai' ); ?></h2>
                <div class="about-content">
                    <?php 
                    $about_page = get_page_by_path( 'about' );
                    if ( $about_page ) {
                        echo apply_filters( 'the_content', $about_page->post_content );
                    }
                    ?>
                </div>
            </div>
        </section>
        
        <!-- Video Gallery Section -->
        <section id="videos" class="section">
            <div class="container">
                <h2 class="aluminum-text"><?php esc_html_e( 'Video Gallery', 'jaganos-ai' ); ?></h2>
                <div class="video-grid">
                    <?php
                    $videos = new WP_Query( array(
                        'post_type'      => 'jaganos_video',
                        'posts_per_page' => 6,
                    ) );
                    
                    if ( $videos->have_posts() ) :
                        while ( $videos->have_posts() ) : $videos->the_post();
                    ?>
                        <div class="card video-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="video-thumbnail">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>' . esc_html__( 'No videos found.', 'jaganos-ai' ) . '</p>';
                    endif;
                    ?>
                </div>
            </div>
        </section>
        
        <!-- Music Section -->
        <section id="music" class="section">
            <div class="container">
                <h2 class="aluminum-text"><?php esc_html_e( 'Music', 'jaganos-ai' ); ?></h2>
                <div class="music-grid">
                    <?php
                    $music = new WP_Query( array(
                        'post_type'      => 'jaganos_music',
                        'posts_per_page' => 6,
                    ) );
                    
                    if ( $music->have_posts() ) :
                        while ( $music->have_posts() ) : $music->the_post();
                    ?>
                        <div class="card music-card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="music-cover">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt(); ?>
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>' . esc_html__( 'No music found.', 'jaganos-ai' ) . '</p>';
                    endif;
                    ?>
                </div>
            </div>
        </section>
        
        <!-- Prompt Section -->
        <section id="prompt" class="section">
            <div class="container">
                <h2 class="aluminum-text"><?php esc_html_e( 'Prompt', 'jaganos-ai' ); ?></h2>
                <div class="prompt-content">
                    <?php 
                    $prompt_page = get_page_by_path( 'prompt' );
                    if ( $prompt_page ) {
                        echo apply_filters( 'the_content', $prompt_page->post_content );
                    }
                    ?>
                </div>
            </div>
        </section>
        
    <?php else : ?>
        
        <!-- Standard Loop for other pages -->
        <div class="container">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title aluminum-text">', '</h1>' ); ?>
                    </header>
                    
                    <div class="entry-content">
                        <?php
                        the_content();
                        
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jaganos-ai' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>
                </article>
            <?php
                endwhile;
                
                the_posts_navigation();
            else :
            ?>
                <p><?php esc_html_e( 'No content found.', 'jaganos-ai' ); ?></p>
            <?php
            endif;
            ?>
        </div>
        
    <?php endif; ?>
    
</main>

<?php
get_footer();
