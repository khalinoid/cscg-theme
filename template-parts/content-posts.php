<article id="cscg-theme-post-<?php the_ID(); ?>" <?php post_class('custom-post'); ?>>
    <header class="cscg-theme-entry-header">
        <div class="cscg-theme-post-thumbnail">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', ['class' => 'thumbnail-image']); ?>
                </a>
            <?php endif; ?>
        </div>

        <h2 class="cscg-theme-entry-title">
            <a href="<?php the_permalink(); ?>" class="cscg-theme-post-title"><?php the_title(); ?></a>
        </h2>
    </header>

    <div class="cscg-theme-entry-content">
        <p><?php the_excerpt(); ?></p>
    </div>

    <footer class="cscg-theme-entry-footer">
        <a href="<?php the_permalink(); ?>" class="cscg-theme-read-more"><?php _e('Read More', 'cardano-ui'); ?></a>
    </footer>
</article>
