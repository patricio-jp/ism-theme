<?php

if (post_password_required()) {
    return;
}

$commentsCount = get_comments_number();

?>

<section id="comments">
    <h3 class="comments-title">
        <?php if ('1' === $commentsCount) : ?>
            <?php esc_html_e('1 comment', 'ism'); ?>
        <?php else : ?>
            <?php
            printf(
                /* translators: %s: Comment count number. */
                esc_html(_nx('%s comment', '%s comments', $commentsCount, 'Comments title', 'ism')),
                esc_html(number_format_i18n($commentsCount))
            );
            ?>
        <?php endif; ?>
    </h3><!-- .comments-title -->

    <ol class="comment-list">
        <?php
        wp_list_comments(
            array(
                'walker' => new ISM_Walker_Comment(),
                'format' => 'html5',
                'avatar_size' => 60,
                'style' => 'ol'
            )
        );
        ?>
    </ol><!-- .comment-list -->

    <?php
    the_comments_pagination(
        array(
            'before_page_number' => esc_html__('Page', 'ism') . ' ',
            'mid_size'           => 0,
            'prev_text'          => sprintf(
                '%s <span class="nav-prev-text">%s</span>',
                is_rtl() ? '<i class="fa-solid fa-arrow-right"></i>' : '<i class="fa-solid fa-arrow-left"></i>',
                esc_html__('Older comments', 'ism')
            ),
            'next_text'          => sprintf(
                '<span class="nav-next-text">%s</span> %s',
                esc_html__('Newer comments', 'ism'),
                is_rtl() ? '<i class="fa-solid fa-arrow-left"></i>' : '<i class="fa-solid fa-arrow-right"></i>'
            ),
        )
    );
    ?>

    <?php
    comment_form(
        array(
            'title_reply' => esc_html__('Leave a comment', 'ism'),
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h3>',
            'format' => 'html5'
        )
    );
    ?>
</section>