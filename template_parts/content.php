<article id="post-<?php the_ID(); ?>" <?php post_class('post') ?>>
    <header class="post-header">
        <?php
        ism_category_badges();
        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
        echo '<time class="post-date">' . get_the_date() . '</time>';
//        the_date('', '<time class="text-sm text-gray-600 dark:text-gray-400">', '</time>');
        if (is_sticky()) {
            echo '<i class="sticky-icon fa-solid fa-thumbtack"></i>';
        }
        ?>
    </header>
    <section class="entry-content">
        <?php the_excerpt(); ?><a class="read_more_link" href="<?php the_permalink(); ?>"><?php _e('Read More »', 'ism'); ?><!--<i class="fa-solid fa-angle-right"></i>--></a>
    </section>
</article>