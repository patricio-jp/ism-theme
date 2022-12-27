<article class="page-container">
    <header class="page-header">
        <?php
        if (is_search()) {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
        } else {
            the_title('<h2 class="entry-title">', '</h2>');
        }
        ?>
    </header>
	<section class="entry-content">
        <?php
        if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
            the_excerpt();
            echo '<a class="read_more_link" href="' . get_permalink() . '">' . __('Read More', 'ism') . '<i class="fa-solid fa-angle-right"></i></a>';
        } else {
            the_content(__('Continue reading', 'ism'));
        }
        ?>
    </section>
</article>
<?php
    if (comments_open() || get_comments_number()) {
        echo '<hr class="section-divider">';
        comments_template();
    }
?>
