<?php
if ( ! class_exists( 'Custom_Comment_Walker' ) ) :

class Custom_Comment_Walker extends Walker_Comment {
    protected function html5_comment( $comment, $depth, $args ) {
        error_log('Custom Comment Walker is being used'); // Add this line for logging
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <?php
                        if ( 0 != $args['avatar_size'] ) {
                            echo get_avatar( $comment, $args['avatar_size'] );
                        }
                        ?>
                        <?php
                        printf(
                            '<b class="fn"><a href="%s" class="custom-comment-author-link hello-world">%s</a></b>',
                            esc_url( get_comment_author_link( $comment ) ),
                            get_comment_author( $comment )
                        );
                        ?>
                    </div><!-- .comment-author -->

                    <div class="comment-metadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php
                                printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
                                ?>
                            </time>
                        </a>
                        <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .comment-metadata -->

                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                    <?php endif; ?>
                </footer><!-- .comment-meta -->

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->

                <div class="reply">
                    <?php
                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<div class="reply-link">',
                                'after'     => '</div>',
                            )
                        )
                    );
                    ?>
                </div><!-- .reply -->
            </article><!-- .comment-body -->
        <?php
    }
}

endif;
?>
