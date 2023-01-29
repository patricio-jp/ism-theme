<article class="page-container no-bg">
    <!-- <header class="page-header"> -->
        <?php
        // the_title('<h2 class="entry-title">', '</h2>');
        ?>
    <!-- </header> -->
	<section class="entry-content">
        <?php
        if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
            the_excerpt();
        } else {
            the_content(__('Continue reading', 'ism'));
        }
        ?>
    </section>
</article>
