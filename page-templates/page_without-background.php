<?php
/**
 * Template Name: Default template without background
 */
get_header();
?>
<main class="px-6 my-6">
<?php
while (have_posts()) {
    the_post();

    get_template_part('template_parts/content-page-without-bg');
}
?>
</main>
<?php
get_footer();
?>
