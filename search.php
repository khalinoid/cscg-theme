<?php get_header(); ?>

<main id="content" class="site-content">
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
        echo '<p>' . __('No content found', 'cardano-ui') . '</p>';
    endif;
    ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
