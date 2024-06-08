<?php
function cardano_ui_setup() {
    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cardano-ui'),
    ));

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add support for title tag
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'cardano_ui_setup');

// Enqueue styles and scripts
function cardano_ui_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cardano_ui_scripts');

function cardano_ui_enqueue_styles() {
    wp_enqueue_style( 'cardano-ui-basic-style', get_template_directory_uri() . '/css/basic-style.css' );
    wp_enqueue_style( 'cardano-ui-header-style', get_template_directory_uri() . '/css/header.css' );
    wp_enqueue_style( 'cardano-ui-main-content-style', get_template_directory_uri() . '/css/main-content.css' );
    wp_enqueue_style( 'cardano-ui-footer-style', get_template_directory_uri() . '/css/footer.css' );
    wp_enqueue_style( 'cardano-ui-responsive-design', get_template_directory_uri() . '/css/responsive-design.css' );
    wp_enqueue_style( 'cardano-ui-front-page', get_template_directory_uri() . '/css/front-page.css' );
    wp_enqueue_style('cardano-ui-comments-style', get_template_directory_uri() . '/css/comments.css');
    wp_enqueue_style('cardano-ui-content-posts-style', get_template_directory_uri() . '/css/content-posts.css');

}
add_action( 'wp_enqueue_scripts', 'cardano_ui_enqueue_styles' );

function custom_comments_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="cscg-theme-li-comment-<?php comment_ID(); ?>">
        <article id="cscg-theme-comment-<?php comment_ID(); ?>" class="cscg-theme-comment-body">
            <footer class="cscg-theme-comment-meta">
                <div class="cscg-theme-comment-author vcard">
                    <?php echo get_avatar($comment, 50); ?>
                    <div class="cscg-theme-comment-author-details">
                        <?php printf('<b class="fn">%s</b>', get_comment_author_link()); ?>
                        <?php if ($comment->user_id) {
                            $user_info = get_userdata($comment->user_id);
                            echo '<span class="user-role">' . implode(', ', $user_info->roles) . '</span>';
                        } ?>
                    </div>
                </div><!-- .comment-author -->

                <div class="cscg-theme-comment-metadata">
                    <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                        <time datetime="<?php comment_time('c'); ?>">
                            <?php printf(__('%1$s at %2$s', 'cardano-ui'), get_comment_date(), get_comment_time()); ?>
                        </time>
                    </a>
                    <?php edit_comment_link(__('Edit', 'cardano-ui'), '<span class="edit-link">', '</span>'); ?>
                </div><!-- .comment-metadata -->
            </footer><!-- .comment-meta -->

            <div class="cscg-theme-comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <div class="cscg-theme-comment-extra">
                <?php if (function_exists('show_comment_rating')) { show_comment_rating($comment->comment_ID); } ?>
            </div><!-- .comment-extra -->

            <div class="cscg-theme-reply">
                <?php
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply <span>&darr;</span>', 'cardano-ui'),
                    'depth' => $depth,
                    'max_depth' => $args['max_depth']
                )));
                ?>
            </div><!-- .reply -->
        </article><!-- .comment-body -->
    </li>
<?php }

function show_comment_rating($comment_id) {
    $rating = get_comment_meta($comment_id, 'rating', true);
    if ($rating) {
        echo '<div class="cscg-theme-comment-rating">Rating: ' . esc_html($rating) . ' / 5</div>';
    }
}

function custom_comment_form_fields($fields) {
    $commenter = wp_get_current_commenter();

    $fields['author'] = '<div class="cscg-theme-comment-form-author">
                            <label for="author">' . __('Name', 'cardano-ui') . '</label>
                            <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" required />
                         </div>';

    $fields['email'] = '<div class="cscg-theme-comment-form-email">
                            <label for="email">' . __('Email', 'cardano-ui') . '</label>
                            <input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" required />
                        </div>';

    $fields['url'] = '<div class="cscg-theme-comment-form-url">
                          <label for="url">' . __('Website', 'cardano-ui') . '</label>
                          <input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" />
                      </div>';

    $fields['rating'] = '<div class="cscg-theme-comment-form-rating">
                            <label for="rating">' . __('Rating', 'cardano-ui') . '</label>
                            <select name="rating" id="rating" required>
                                <option value="">' . __('Rate...', 'cardano-ui') . '</option>
                                <option value="5">' . __('5 Stars', 'cardano-ui') . '</option>
                                <option value="4">' . __('4 Stars', 'cardano-ui') . '</option>
                                <option value="3">' . __('3 Stars', 'cardano-ui') . '</option>
                                <option value="2">' . __('2 Stars', 'cardano-ui') . '</option>
                                <option value="1">' . __('1 Star', 'cardano-ui') . '</option>
                            </select>
                        </div>';

    return $fields;
}
add_filter('comment_form_default_fields', 'custom_comment_form_fields');

function custom_comment_form($args) {
    $args['comment_field'] = '<div class="cscg-theme-comment-form-comment">
                                <label for="comment">' . _x('Comment', 'noun', 'cardano-ui') . '</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea>
                              </div>';
    $args['class_submit'] = 'submit';
    $args['label_submit'] = __('Post Comment', 'cardano-ui');
    $args['title_reply'] = __('Leave a Comment', 'cardano-ui');
    return $args;
}
add_filter('comment_form_defaults', 'custom_comment_form');

function save_comment_meta_data($comment_id) {
    if (isset($_POST['rating'])) {
        $rating = intval($_POST['rating']);
        add_comment_meta($comment_id, 'rating', $rating);
    }
}
add_action('comment_post', 'save_comment_meta_data');





