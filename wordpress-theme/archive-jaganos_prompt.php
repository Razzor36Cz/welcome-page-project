<?php
/**
 * Prompts Archive Template
 * @package Jaganos_AI_Theme
 */

get_header();
?>

<main id="main-content" class="site-main page-content">
    <div class="container" style="max-width: 800px;">
        <header class="page-header fade-in-up">
            <h1 class="aluminum-text" data-translate="prompt"><?php echo esc_html( jaganos_translate( 'prompt' ) ); ?></h1>
            <p data-translate="creativePrompts"><?php echo esc_html( jaganos_translate( 'creativePrompts' ) ); ?></p>
            <div class="header-divider"></div>
        </header>

        <div class="prompts-list">
            <?php
            $i = 0;
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    $category = get_post_meta( get_the_ID(), '_jaganos_prompt_category', true ) ?: 'Image';
                    $content = get_the_content();
                    $i++;
            ?>
                <div class="prompt-card aluminum-surface fade-in delay-<?php echo $i; ?>">
                    <div class="prompt-header">
                        <div class="prompt-title-section">
                            <div class="prompt-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                            </div>
                            <div class="prompt-title-text">
                                <h3><?php the_title(); ?></h3>
                                <span class="category"><?php echo esc_html( $category ); ?></span>
                            </div>
                        </div>
                        <div class="prompt-actions">
                            <button class="btn-icon copy-prompt" data-content="<?php echo esc_attr( wp_strip_all_tags( $content ) ); ?>" title="Copy">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                            </button>
                        </div>
                    </div>
                    <p class="prompt-content"><?php echo esc_html( wp_strip_all_tags( $content ) ); ?></p>
                </div>
            <?php
                endwhile;
            else :
            ?>
                <p><?php esc_html_e( 'No prompts found.', 'jaganos-ai' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
