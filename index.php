<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main id="content" class="site-content">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content-posts', get_post_format());
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

    <?php wp_footer(); ?>
</body>
</html>
