<article id="post-<?php the_ID(); ?>" <?php post_class('custom-post'); ?>>
    <header class="entry-header">
        <div class="post-thumbnail">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', ['class' => 'thumbnail-image']); ?>
                </a>
            <?php endif; ?>
        </div>

        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
        </h2>
    </header>

    <div class="entry-content">
        <p><?php the_excerpt(); ?></p>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'cardano-ui'); ?></a>
    </footer>
</article>
