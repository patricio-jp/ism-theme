<?php
function ism_site_logo($args = array(), $display = true) {
	$site_title = get_bloginfo('name');

	$customLogoID = get_theme_mod('custom_logo');
	$customLogoHTML = '<a href="%1$s" class="flex items-center lg:w-3/5"><img src="%2$s" alt="%3$s" class="max-w-[5rem] md:max-w-[8rem] mr-4"><h1 class="site-title">%3$s</h1></a>';
	$customLogo = sprintf($customLogoHTML, esc_url(home_url('/')), esc_url(wp_get_attachment_image_url($customLogoID, 'full')), esc_html($site_title));


	$logo = apply_filters('get_custom_logo', $customLogo);
	$contents = '';
	$className = '';

	$defaults = array(
		'logo'        => '%1$s',
		'logo_class'  => '',
		'title'       => '<h1 class="site-title"><a href="%1$s">%2$s</a></h1>',
		'title_class' => '',
		'home_wrap'   => '%1$s',
		'single_wrap' => '%1$s',
		'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
	);

	$args = wp_parse_args( $args, $defaults );

	$args = apply_filters( 'ism_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo );
		$classname = $args['logo_class'];
	} else {
		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
		$classname = $args['title_class'];
	}

	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

	$html = sprintf( $args[ $wrap ], $contents );

	$html = apply_filters( 'ism_site_logo', $html, $args, $classname, $contents );

	if ( ! $display ) {
		return $html;
	}

	echo $html;
}

function ism_footer_logo($args = array(), $display = true) {
	$site_title = get_bloginfo('name');

	$customLogoID = get_theme_mod('custom_logo');
	$customLogoHTML = '<a href="%1$s" class="footer-site-link"><img src="%2$s" alt="%3$s" class="footer-site-logo"><h2 class="footer-site-title">%3$s</h2></a>';
	$customLogo = sprintf($customLogoHTML, esc_url(home_url('/')), esc_url(wp_get_attachment_image_url($customLogoID, 'full')), esc_html($site_title));

	$logo = apply_filters('get_custom_logo', $customLogo);
	$contents = '';
	$className = '';

	$defaults = array(
		'logo'        => '%1$s',
		'logo_class'  => '',
		'title'       => '<h2 class="footer-site-title"><a href="%1$s">%2$s</a></h2>',
		'title_class' => '',
	);

	$args = wp_parse_args( $args, $defaults );

	$args = apply_filters( 'ism_footer_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo );
		$classname = $args['logo_class'];
	} else {
		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
		$classname = $args['title_class'];
	}

	$html = $contents;

	$html = apply_filters( 'ism_footer_logo', $html, $args, $classname, $contents );

	if ( ! $display ) {
		return $html;
	}

	echo $html;
}

function ism_is_comment_by_author($comment = null): bool {
	if (is_object($comment) && $comment->user_id > 0) {
		$user = get_userdata($comment->user_id);
		$post = get_post($comment->comment_post_ID);
		if (!empty($user) && !empty($post)) {
			return $comment->user_id === $post->post_author;
		}
	}
	return false;
}

function ism_post_thumbnail() {
	if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
		return;
	}
	the_post_thumbnail('full');
}

function ism_post_thumbnail_url() {
	if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
		return;
	}
	return get_the_post_thumbnail_url(get_the_ID(), 'full');
}
