<article id="cscg-theme-post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="cscg-theme-entry-header">
        <?php the_title('<h1 class="cscg-theme-entry-title">', '</h1>'); ?>
    </header>
    <div class="cscg-theme-entry-content">
        <?php the_content(); ?>
    </div>
</article>
