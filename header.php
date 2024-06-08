<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="cscg-theme-main-header">
    <div class="cscg-theme-main-nav">
        <div id="cscg-theme-nav-container">
            <nav>
                <div class="cscg-theme-logo">
                    <h3><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h3>
                    <button id="nav-toggle" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                    </button>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary', 
                    'container' => false, 
                    'menu_class' => 'menu', // Add a custom class for styling
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('nav-toggle');
    const navMenu = document.querySelector('.cscg-theme-main-nav ul');

    toggleButton.addEventListener('click', function() {
        navMenu.classList.toggle('show');
    });
});
</script>

