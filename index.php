<?php

get_header();

if (is_active_sidebar('sidebar')) { ?>
<section class="body-container">
	<main class="px-6">
		<?php
		if (have_posts()) {
			the_archive_title('<h2 class="page-title">', '</h2>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		<section class="postsContainer">
		<?php while (have_posts()) {
				
				the_post();

				get_template_part('template_parts/content', get_post_type());
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
<main class="px-6 my-6">
	<?php
	if (have_posts()) {
		the_archive_title('<h2 class="page-title">', '</h2>');
		the_archive_description('<div class="archive-description">', '</div>');
		while (have_posts()) {
			the_post();
			
			get_template_part('template_parts/content', get_post_type());
		}
	} else {
		get_template_part('template_parts/content-none');
	}
	?>
</main>
<?php }
get_footer();
?>
