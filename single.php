<?php
get_header();
if (is_active_sidebar('sidebar')) { ?>
    <section class="body-container">
        <main id="content">
            <?php
            if (have_posts()) {
                ?>
                <section class="posts-container">
                    <?php while (have_posts()) {

                        the_post();

                        get_template_part('template_parts/content-single');
                    } ?>
                </section>
            <?php } else {
                get_template_part('template_parts/content-none');
            }
            ?>
        </main>
        <?php get_sidebar(); ?>
    </section>
<?php } else { ?>
    <main id="content">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();

                get_template_part('template_parts/content-single');
            }
        } else {
            get_template_part('template_parts/content-none');
        }
        ?>
    </main>
<?php }
get_footer();
?>
