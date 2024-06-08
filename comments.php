<?php
if (post_password_required()) {
    return;
}
?>

<div id="cscg-theme-comments" class="cscg-theme-comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="cscg-theme-comments-title">
            <?php
            printf(
                _nx('One comment', '%1$s comments', get_comments_number(), 'comments title', 'cardano-ui'),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>
        <ul class="cscg-theme-comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 50,
                'callback' => 'custom_comments_callback',
            ));
            ?>
        </ul>
    <?php endif; ?>

    <?php if (!comments_open()) : ?>
        <p class="cscg-theme-no-comments"><?php _e('Comments are closed.', 'cardano-ui'); ?></p>
    <?php endif; ?>

    <?php
        $custom_args = array(
            'fields' => apply_filters('comment_form_default_fields', custom_comment_form_fields(array())),
            'comment_field' => '<div class="comment-form-comment"><label for="comment">' . _x('Comment', 'noun') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></div>',
            'class_submit' => 'submit',
            'label_submit' => __('Post Comment', 'cardano-ui'),
            'title_reply' => __('Leave a Comment', 'cardano-ui'),
        );
        comment_form($custom_args);
    ?>

</div>
