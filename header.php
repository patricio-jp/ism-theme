<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a href="#content" class="skip-to-content"><?php _e('Skip to content', 'ism'); ?></a>
    <a href="#navbar" class="skip-to-menu"><?php _e('Skip to menu', 'ism'); ?></a>
    <header class="site-header">
        <div>
            <?php
                ism_site_logo();
            ?>
            <button class="fixed bottom-5 right-5 rounded-lg flex items-center bg-red-primary-500 text-black px-4 py-2 z-50" onClick="toggleDarkMode()"><i class="fa-solid fa-moon"></i></button>
            <button id="navBarToggle"><i class="fa-solid fa-bars w-4 h-4"></i></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => false,
                    // 'menu_class' => 'test',
                    'fallback_cb' => '__return false',
                    'items_wrap' => '<nav id="navbar" class="hidden"><ul class="navbar-nav %2$s">%3$s</ul></nav>',
                    'depth' => 3,
                    'walker' => new ism_navmenu_walker()
                )
            );
            ?>
        </div>
    </header>