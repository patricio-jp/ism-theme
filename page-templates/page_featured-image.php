<?php
/**
 * Template Name: Page with featured image
 */
get_header();
?>
	<main id="content" class="page-featured-image">
		<?php
		while (have_posts()) {
			the_post();
			?>
        <article>
            <header class="page-header" style="background-image: url(<?php echo ism_post_thumbnail_url(); ?>)">
				<div class="bg-overlay"></div>
				<?php
                // ism_post_thumbnail();
				the_title('<div><h2 class="entry-title">', '</h2></div>');
				?>
            </header>
            <section class="entry-content">
                <?php
                the_content();
                ?>
            </section>
        </article>
		<?php }
		?>
	</main>
<?php
get_footer();
?>