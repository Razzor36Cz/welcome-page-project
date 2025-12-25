<?php
/**
 * Title: Video Grid
 * Slug: jaganos-ai/video-grid
 * Categories: jaganos
 * Keywords: video, gallery, grid
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:6rem;padding-bottom:6rem">

    <!-- wp:heading {"textAlign":"center","level":2,"className":"aluminum-text","style":{"spacing":{"margin":{"bottom":"3rem"}}}} -->
    <h2 class="wp-block-heading has-text-align-center aluminum-text" style="margin-bottom:3rem"><?php esc_html_e( 'Video Gallery', 'jaganos-ai' ); ?></h2>
    <!-- /wp:heading -->
    
    <!-- wp:query {"queryId":10,"query":{"perPage":6,"postType":"jaganos_video","order":"desc","orderBy":"date"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
        
        <!-- wp:group {"className":"video-card card-hover","style":{"border":{"radius":"0.5rem"}},"backgroundColor":"card"} -->
        <div class="wp-block-group video-card card-hover has-card-background-color has-background" style="border-radius:0.5rem">
            <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"0.5rem 0.5rem 0 0"}}} /-->
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"1rem","right":"1rem","bottom":"1rem","left":"1rem"}}}} -->
            <div class="wp-block-group" style="padding:1rem">
                <!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"1rem"}}} /-->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
        
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->

</div>
<!-- /wp:group -->
