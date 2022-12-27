<?php
function ism_site_logo($args = array(), $display = true) {
	$site_title = get_bloginfo('name');

	$customLogoID = get_theme_mod('custom_logo');
	$customLogoHTML = '<a href="%1$s" class="site-logo-container"><img src="%2$s" alt="%3$s" class="site-logo"><h1 class="site-title">%3$s</h1></a>';
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

function ism_category_badges() {
	if (get_post_type() === 'post') {
		echo '<div class="category-badges">';
		$categoriesList = '';
		$i = 0;
		foreach (get_the_category() as $category) {
			if ($i > 0) $categoriesList .= ' ';
			$categoriesList .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-badge">' . esc_html($category->name) . '</a>';
			$i++;
		}
		echo $categoriesList;
		echo '</div>';
	}
}

function ism_related_posts() {
    global $post;
    $categories = wp_get_object_terms(
        $post->ID,
        'category',
        array(
            'fields' => 'ids'
        )
    );
    $args = array(
        'posts_per_page' => 3,
        'cat' => $categories,
        'orderby' => 'date',
        'post__not_in' => array($post->ID)
    );
    $allowed_html = array(
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'i' => array(
            'class' => array()
        ),
        'span' => array()
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) { ?>
        <section class="related-posts">
            <h3><?php _e('Related posts', 'ism'); ?></h3>
            <div class="related-posts-container">
                <?php
                while ($loop->have_posts()) {
                    $loop->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('related-post')?>>
                        <header class="post-header">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="post-image">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                            <h4 class="entry-title">
                                <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                                    <?php echo wp_kses(force_balance_tags(get_the_title()), $allowed_html); ?>
                                </a>
                            </h4>
                        </header>
                        <section class="entry-content">
                            <p><?php echo wp_kses_post(get_the_excerpt()); ?></p>
                        </section>
                    </article>
                <?php }
                wp_reset_postdata();
                ?>
            </div>
        </section>
    <?php }
}
