<article id="post-<?php the_ID(); ?>" class="mx-auto mb-6 p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <header class="post-header">
        <?php
        if (is_singular()) {
            the_title('<h1 class="entry-title">', '</h1>');
            the_date('d/m/Y', '<p class="text-sm text-gray-600 dark:text-gray-400">', '</p>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
            the_date('d/m/Y', '<p class="text-sm text-gray-600 dark:text-gray-400">', '</p>');
        }
        ?>
    </header>
    <section class="entry-content">
        <?php the_excerpt(); ?><a class="read_more_link" href="<?php the_permalink(); ?>"><?php _e('Read More', 'ism'); ?><i class="fa-solid fa-angle-right"></i></a>
    </section>
</article>