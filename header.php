<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class('bg-white dark:bg-gray-900 text-black dark:text-white'); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <div>
            <?php
                ism_site_logo();
            ?>
            <button class="fixed bottom-5 right-5 rounded-full flex items-center bg-blue-600 text-black px-4 py-2" onClick="toggleDarkMode()"><i class="fa-solid fa-moon"></i></button>
            <button id="navBarToggle"><i class="fa-solid fa-bars w-4 h-4"></i></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => false,
                    // 'menu_class' => 'test',
                    'fallback_cb' => '__return false',
                    'items_wrap' => '<nav id="navbar" class="hidden"><ul class="navbar-nav %2$s">%3$s</ul></nav>',
                    'depth' => 2,
                    'walker' => new ism_navmenu_walker()
                )
            );
            ?>
        </div>
    </header>