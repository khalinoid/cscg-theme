<?php get_header(); ?>

<main id="content" class="site-content">
    <?php
    while (have_posts()) : the_post();
        get_template_part('template-parts/content-posts', get_post_format());
        // If comments are open or there is at least one comment, load the comment template
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
    endwhile;
    ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
