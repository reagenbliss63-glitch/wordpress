<?php
/**
 * The template for displaying comments
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    if ( have_comments() ) :
        ?>
        <h2 class="comments-title">
            <?php
            $anipulse_comment_count = get_comments_number();
            if ( '1' === $anipulse_comment_count ) {
                printf(
                    /* translators: 1: title. */
                    esc_html__( '1 response to &ldquo;%1$s&rdquo;', 'anipulse' ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            } else {
                printf( 
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', $anipulse_comment_count, 'comments title', 'anipulse' ) ),
                    number_format_i18n( $anipulse_comment_count ),
                    '<span>' . wp_kses_post( get_the_title() ) . '</span>'
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 60,
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'anipulse' ); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().

    comment_form( array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
        'class_submit'       => 'submit read-more',
    ) );
    ?>

</div><!-- #comments -->
