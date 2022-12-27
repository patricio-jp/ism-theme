<?php

get_header();

if (is_active_sidebar('sidebar')) { ?>
	<section class="body-container">
		<main id="content">
			<?php
			if (have_posts()) { ?>
				<h2 class="page-title">
				<?php
                printf(esc_html__('Search results for: %s', 'ism'), '<span class="text-gray-800 dark:text-gray-200 italic">' . get_search_query() . '</span>');
				?>
                </h2>
				<section class="posts-container">
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
	<main id="content">
		<?php
		if (have_posts()) { ?>
			<h2 class="page-title">
				<?php
                printf(esc_html__('Search results for: %s', 'ism'), '<span class="text-gray-800 dark:text-gray-200">' . get_search_query() . '</span>');
				?>
            </h2>
            <?php
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
