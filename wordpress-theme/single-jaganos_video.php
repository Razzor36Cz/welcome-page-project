<?php
/**
 * Template for displaying single custom post types (videos/music)
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <?php
            $post_type = get_post_type();
            
            if ( 'jaganos_video' === $post_type ) :
                get_template_part( 'template-parts/content', 'video' );
            elseif ( 'jaganos_music' === $post_type ) :
                get_template_part( 'template-parts/content', 'music' );
            else :
                get_template_part( 'template-parts/content', get_post_type() );
            endif;
            ?>
            
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
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
            
        <?php endwhile; ?>
        
    </div>
</main>

<?php
get_footer();
