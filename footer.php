<footer class="site-footer">
    <div>
        <section class="topFooter">
            <section class="site-info">
                <?php ism_footer_logo(); ?>
                <p class="site-description"><?php bloginfo('description'); ?></p>
                <?php is_active_sidebar('footer-info') ? dynamic_sidebar('footer-info') : ''; ?>
            </section>
            <?php
            dynamic_sidebar('footer-1');
            dynamic_sidebar('footer-2');
            dynamic_sidebar('footer-3');
            ?>
        </section>
    </div>
    <div>
        <section class="bottomFooter <?php echo(has_nav_menu('social_footer') ? 'justify-between' : 'justify-center');?>">
            <div>
                <p class="copyright">&copy <?php echo(date('Y')); ?> - <?php echo(get_bloginfo('name')); ?></p>
            </div>
            <?php
            if (has_nav_menu('social_footer')) {
                wp_nav_menu(array(
                    'theme_location' => 'social_footer',
                    'walker' => new ism_social_footer_navmenu_walker(),
                    'container' => 'nav',
                    'container_class' => 'socialMenu',
                    'depth' => 1,
                    'fallback_cb' => '',
                ));
            }
            ?>
        </section>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>