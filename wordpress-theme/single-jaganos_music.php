<?php
/**
 * Template for displaying single music tracks
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        
        <?php while ( have_posts() ) : the_post(); ?>
            
            <?php get_template_part( 'template-parts/content', 'music' ); ?>
            
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
