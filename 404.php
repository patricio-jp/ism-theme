<?php
get_header();
?>
<main class="page404" id="content">
    <section>
        <h1 class="page404__title"><?php esc_html_e('404', 'ism'); ?></h1>
        <h2 class="page404__subtitle"><?php esc_html_e('Page not found', 'ism'); ?></h2>
        <p class="page404__text"><?php esc_html_e('Sorry, but the page you are looking for does not exist.', 'ism'); ?></p>
        <a class="page404__link" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go to the main page', 'ism'); ?></a>
    </section>
</main>
<?php
get_footer();
?>