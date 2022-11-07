<section class="no-results not-found">
    <?php
    if (is_home()) { ?>
        <h2 class="page-title"><?php esc_html_e('No content found', 'ism'); ?> <span class="italic"><?php echo $s; ?></span></h2>
        <?php
        if (current_user_can('publish_posts')) {
            printf(
                '<p>' . wp_kses(
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>', 'ism'),
                    array(
                        'a' => array(
                            'href' => array()
                        )
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        }
    } else if (is_search()) { ?>
        <h2 class="page-title"><?php esc_html_e('Nothing found for', 'ism'); ?> <span class="italic"><?php echo $s; ?></span></h2>
        <p class="mb-4"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ism'); ?></p>
        <?php
        get_search_form();
    } else {

    }
    ?>
</section>