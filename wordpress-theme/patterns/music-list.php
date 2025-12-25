<?php
/**
 * Title: Music List
 * Slug: jaganos-ai/music-list
 * Categories: jaganos
 * Keywords: music, audio, tracks
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"backgroundColor":"card","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-card-background-color has-background" style="padding-top:6rem;padding-bottom:6rem">

    <!-- wp:heading {"textAlign":"center","level":2,"className":"aluminum-text","style":{"spacing":{"margin":{"bottom":"3rem"}}}} -->
    <h2 class="wp-block-heading has-text-align-center aluminum-text" style="margin-bottom:3rem"><?php esc_html_e( 'Featured Tracks', 'jaganos-ai' ); ?></h2>
    <!-- /wp:heading -->
    
    <!-- wp:query {"queryId":11,"query":{"perPage":6,"postType":"jaganos_music","order":"desc","orderBy":"date"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
        
        <!-- wp:group {"className":"music-player card-hover","style":{"border":{"radius":"0.5rem"},"spacing":{"padding":{"top":"1.5rem","right":"1.5rem","bottom":"1.5rem","left":"1.5rem"}}}} -->
        <div class="wp-block-group music-player card-hover" style="border-radius:0.5rem;padding:1.5rem">
            <!-- wp:columns {"verticalAlignment":"center"} -->
            <div class="wp-block-columns are-vertically-aligned-center">
                <!-- wp:column {"verticalAlignment":"center","width":"60px"} -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60px">
                    <!-- wp:post-featured-image {"width":"60px","height":"60px","style":{"border":{"radius":"0.5rem"}}} /-->
                </div>
                <!-- /wp:column -->
                <!-- wp:column {"verticalAlignment":"center"} -->
                <div class="wp-block-column is-vertically-aligned-center">
                    <!-- wp:post-title {"style":{"typography":{"fontSize":"1rem"}}} /-->
                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"var:preset|color|muted-foreground"}}} -->
                    <p style="color:var(--wp--preset--color--muted-foreground);font-size:0.875rem">Jaganos AI</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->
            </div>
            <!-- /wp:columns -->
        </div>
        <!-- /wp:group -->
        
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->

</div>
<!-- /wp:group -->
