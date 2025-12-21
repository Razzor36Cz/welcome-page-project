<?php
/**
 * The template for displaying comments
 *
 * @package Jaganos_AI_Theme
 * @version 1.0.0
 */

// Don't load if the current post is protected by a password and the visitor has not yet entered the password
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    
    <?php if ( have_comments() ) : ?>
        
        <h2 class="comments-title aluminum-text">
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf(
                    /* translators: 1: title. */
                    esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'jaganos-ai' ),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'jaganos-ai' ) ),
                    number_format_i18n( $comment_count ),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>
        
        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 60,
            ) );
            ?>
        </ol>
        
        <?php
        the_comments_navigation();
        
        // If comments are closed and there are comments, show a notice
        if ( ! comments_open() ) :
        ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jaganos-ai' ); ?></p>
        <?php endif; ?>
        
    <?php endif; ?>
    
    <?php
    comment_form( array(
        'class_form'           => 'comment-form',
        'class_submit'         => 'btn btn-primary',
        'title_reply'          => esc_html__( 'Leave a Comment', 'jaganos-ai' ),
        'title_reply_to'       => esc_html__( 'Reply to %s', 'jaganos-ai' ),
        'cancel_reply_link'    => esc_html__( 'Cancel', 'jaganos-ai' ),
        'label_submit'         => esc_html__( 'Post Comment', 'jaganos-ai' ),
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
    ) );
    ?>
    
</div>
