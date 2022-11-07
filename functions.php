<?php
	if ( ! isset ( $content_width) )
		$content_width = 800;

	// Theme styles and scripts
	if (!function_exists('ism_styles_and_scripts')) {
		function ism_styles_and_scripts() {
			// Enqueue stylesheet generated with Tailwind CSS
			wp_enqueue_style('style', get_stylesheet_uri());

//			wp_enqueue_script('mouse-trap', get_template_directory_uri() . '/assets/js/mousetrap.min.js', array(), '1', true);

			// Enqueue general scripts in footer
			wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.0', true);

			// Enqueue FontAwesome v6 icons
			wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/318bbb0cc7.js', array(), '6.2.0', false);

			// Enqueue scripts for comments reply (if enabled)
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
	}

	// Theme supports
	if (!function_exists('ism_supports')) {
		function ism_supports() {
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Support for custom logo
			add_theme_support('custom-logo');

			// Support for custom background color
			/* add_theme_support(
				'custom-background',
				array(
					'default-color' => 'f5efe0',
				)
			); */

			// Let Wordpress manage <title> tag
			add_theme_support( 'title-tag' );

			// Add support for featured thumbnails
			add_theme_support('post-thumbnails');

			// Set translation available
			load_theme_textdomain('ism', get_template_directory());

			// Support for post formats
			$post_formats = array('aside', 'gallery', 'quote', 'image', 'video');
			add_theme_support( 'post-formats', $post_formats);
		}
	}

	// Headers
	/*if (!function_exists('ism_headers')) {
		function ism_headers() {
			require 'template_parts/header.php';

		}
	}*/

	// Navigation menus
	if (!function_exists('ism_menus')) {
		function ism_menus() {
			require_once('classes/class-ism-navwalker.php');
			require_once('classes/class-ism-social-footer-navwalker.php');
			$locations = array(
				'primary' => __('Primary menu', 'ism'),
				'secondary' => __('Secondary menu', 'ism'),
				'sidebar' => __('Sidebar menu', 'ism'),
				'footer' => __('Footer menu', 'ism'),
				'social_header' => __('Social Header Menu', 'ism'),
				'social_footer' => __('Social Footer Menu', 'ism')
			);
			register_nav_menus($locations);
		}
	}

	// Widget areas
	if (!function_exists('ism_widgets')) {
		function ism_widgets() {
			// Sidebar area
			register_sidebar(array(
				'name' => esc_html__('Sidebar', 'ism'),
				'id' => 'sidebar',
				'description' => esc_html__('Add widgets to show in the sidebar area', 'ism'),
				'before_widget' => '',
				'after_widget' => ''
			));

			// Footer site info
			register_sidebar(array(
				'name' => esc_html__('Footer Site Info', 'ism'),
				'id' => 'footer-info',
				'description' => esc_html__('Add widgets to show under the site info in footer.', 'ism'),
				'before_widget' => '',
				'after_widget' => '',
			));

			// Footer 1
			register_sidebar(array(
				'name' => esc_html__('Footer 1', 'ism'),
				'id' => 'footer-1',
				'description' => esc_html__('Add widgets here.', 'ism'),
				'before_widget' => '<section class="footer_widget">',
				'after_widget' => '</section>',
			));

			// Footer 2
			register_sidebar(array(
				'name' => esc_html__('Footer 2', 'ism'),
				'id' => 'footer-2',
				'description' => esc_html__('Add widgets here.', 'ism'),
				'before_widget' => '<section class="footer_widget">',
				'after_widget' => '</section>',
			));

			// Footer 3
			register_sidebar(array(
				'name' => esc_html__('Footer 3', 'ism'),
				'id' => 'footer-3',
				'description' => esc_html__('Add widgets here.', 'ism'),
				'before_widget' => '<section class="footer_widget">',
				'after_widget' => '</section>',
			));

		}
	}

	// Function to initialize theme setup
	if (!function_exists('ism_setup')) {
		function ism_setup() {
			ism_supports();
//			ism_headers();
			ism_menus();
			add_action('widgets_init', 'ism_widgets');
		}

	}

	// ADD REQUIRED FILES
	require get_template_directory() . '/inc/template-tags.php';
	require get_template_directory() . '/classes/class-ism-walker-comment.php';

	// Setup theme
	add_action('after_setup_theme', 'ism_setup');

	add_action('wp_enqueue_scripts', 'ism_styles_and_scripts');
?>
