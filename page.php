<?php
/**
 * The template for displaying all pages by default
 */
get_header();
?>
<main id="content">
<?php
while (have_posts()) {
    the_post();

    get_template_part('template_parts/content-page');
}
?>
</main>
<?php
get_footer();
?>
