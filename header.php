<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="main-header">
        <div class="main-nav">
            <div id="nav-container">
                <nav>
                    <div class="logo">
                        <h3><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h3>
                    </div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary', 
                        'container' => false, // Remove the container <ul>
                        'menu_class' => 'menu', // Add a custom class for styling
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>

