<?php
get_header();
?>
<main class="px-6 my-6">
<?php
while (have_posts()) {
    the_post();
    
    get_template_part('template_parts/content-single', get_post_type());
    
} ?>

</main>
<?php
get_footer();
?>
