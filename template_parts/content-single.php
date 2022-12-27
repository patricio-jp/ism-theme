<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <header class="post-header">
        <?php the_title('<h2 class="entry-title">', '</h2>') ?>
    </header>
	<section class="entry-content">
    <?php
        the_content();

        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'ism' ) . '">',
                'after'    => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__( 'Page %', 'ism' ),
            )
        );
    ?>
    </section>
</article>
<hr class="section-divider">
<?php
ism_related_posts();
?>
<hr class="section-divider">
<?php
    $commentsEnabled = comments_open();
    if ($commentsEnabled || get_comments_number()) {
        comments_template();
    } else if (!$commentsEnabled) { ?>
        <section id="comments"><p class="no-comments"><i class="fa-solid fa-circle-info mr-4"></i><?php esc_html_e('Comments are closed.', 'ism'); ?></p></section>
    <?php }

    $nextPost = is_rtl() ? '<i class="fa-solid fa-arrow-left mr-2"></i>' : '<i class="fas fa-arrow-right ml-2"></i>';
    $prevPost = is_rtl() ? '<i class="fa-solid fa-arrow-right ml-2"></i>' : '<i class="fas fa-arrow-left mr-2"></i>';

    $nextPostLabel = esc_html__('Next post', 'ism');
    $prevPostLabel = esc_html__('Previous post', 'ism');

    the_post_navigation(
	    array(
		    'next_text' => '<p class="meta-nav">' . $nextPostLabel . $nextPost . '</p><p class="post-title">%title</p>',
		    'prev_text' => '<p class="meta-nav">' . $prevPost . $prevPostLabel . '</p><p class="post-title">%title</p>',
	    )
    );
?>
