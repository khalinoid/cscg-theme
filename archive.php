<?php get_header(); ?>

<main id="cscg-theme-content" class="cscg-theme-site-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', get_post_format());
        endwhile;
        the_posts_pagination(array(
            'prev_text' => __('Previous', 'cardano-ui'),
            'next_text' => __('Next', 'cardano-ui'),
        ));
    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
