<?php
/**
 * Template Name: Default template without page title & background
 */
get_header();
?>
<main id="content">
<?php
while (have_posts()) {
    the_post();

    get_template_part('template_parts/content-page-without-title-bg');
}
?>
</main>
<?php
get_footer();
?>
