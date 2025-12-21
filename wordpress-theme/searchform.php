<?php
/**
 * Search form template
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text" for="search-field">
        <?php esc_html_e( 'Search for:', 'jaganos-ai' ); ?>
    </label>
    <input 
        type="search" 
        id="search-field" 
        class="search-field" 
        placeholder="<?php esc_attr_e( 'Search...', 'jaganos-ai' ); ?>" 
        value="<?php echo get_search_query(); ?>" 
        name="s" 
    />
    <button type="submit" class="search-submit btn btn-primary">
        <span class="screen-reader-text"><?php esc_html_e( 'Search', 'jaganos-ai' ); ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
        </svg>
    </button>
</form>
