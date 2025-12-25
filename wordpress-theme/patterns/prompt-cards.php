<?php
/**
 * Title: Prompt Cards
 * Slug: jaganos-ai/prompt-cards
 * Categories: jaganos
 * Keywords: prompts, ai, creative
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:6rem;padding-bottom:6rem">

    <!-- wp:heading {"textAlign":"center","level":2,"className":"aluminum-text","style":{"spacing":{"margin":{"bottom":"3rem"}}}} -->
    <h2 class="wp-block-heading has-text-align-center aluminum-text" style="margin-bottom:3rem"><?php esc_html_e( 'Creative Prompts', 'jaganos-ai' ); ?></h2>
    <!-- /wp:heading -->
    
    <!-- wp:query {"queryId":12,"query":{"perPage":6,"postType":"jaganos_prompt","order":"desc","orderBy":"date"}} -->
    <div class="wp-block-query">
        <!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
        
        <!-- wp:group {"className":"prompt-card card-hover","style":{"border":{"radius":"0.5rem","width":"1px","color":"var:preset|color|border"},"spacing":{"padding":{"top":"1.5rem","right":"1.5rem","bottom":"1.5rem","left":"1.5rem"}}},"backgroundColor":"card"} -->
        <div class="wp-block-group prompt-card card-hover has-border-color has-card-background-color has-background" style="border-color:var(--wp--preset--color--border);border-width:1px;border-radius:0.5rem;padding:1.5rem">
            
            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
            <div class="wp-block-group">
                <!-- wp:post-title {"style":{"typography":{"fontSize":"1rem"}}} /-->
                <!-- wp:html -->
                <button class="copy-btn" data-copy="">Copy</button>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group -->
            
            <!-- wp:post-content {"className":"prompt-content","style":{"typography":{"fontSize":"0.875rem"},"color":{"text":"var:preset|color|muted-foreground"},"spacing":{"margin":{"top":"1rem"}}}} /-->
            
        </div>
        <!-- /wp:group -->
        
        <!-- /wp:post-template -->
    </div>
    <!-- /wp:query -->

</div>
<!-- /wp:group -->
