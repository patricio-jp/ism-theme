<?php
if (!class_exists('ISM_Walker_Comment')) {
	class ISM_Walker_Comment extends Walker_Comment {
		protected function html5_comment( $comment, $depth, $args ) {
			$tag = ($args['style'] === 'div') ? 'div' : 'li';
			?>
			<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : ''); ?>>
				<article class="comment-body">
					<footer class="comment-meta">
						<div class="comment-author">
							<?php
							$authorURL = get_comment_author_url($comment);
							$author = get_comment_author($comment);
							$authorAvatar = get_avatar($comment, $args['avatar_size']);
                            $isPostAuthor = ism_is_comment_by_author($comment);

                            $commentTimeStamp = sprintf('%1$s', get_comment_date('', $comment));

							if ($args['avatar_size'] !== 0) {
                                if (empty($authorURL)) {
                                    echo wp_kses_post($authorAvatar);
                                    printf('<div>');
                                } else {
                                    echo wp_kses_post($authorAvatar);
                                    printf('<div><a href="%s" class="comment-author-name" rel="external nofollow">', $authorURL);
                                }
							}

							printf('<cite>%1$s</cite>', esc_html($author));

                            if (!empty($authorURL)) echo '</a>';

                            printf('<a href="%s" class="comment-date"><time datetime="%s" title="%s">%s</time></a></div>', esc_url(get_comment_link($comment, $args)), get_comment_time(), esc_attr($commentTimeStamp), esc_html($commentTimeStamp));

							?>
						</div>
                        <div class="comment-badges">
                            <?php
                            if ($comment->comment_approved === '0') { ?>
                                <span class="comment-awaiting-moderation"><?php _e('Pending for moderation', 'ism'); ?></span>
                            <?php }
                            if ($isPostAuthor) {
                                echo '<span class="by-post-author">' . __('Post Author', 'ism') . '</span>';
                            }
                            ?>
                        </div>
					</footer>
                    <section class="comment-content">
                        <?php
                        comment_text();
                        ?>
                    </section>
                    <section class="comment-reply-container">
                        <?php
                        $commentReplyLink = get_comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'add_below' => 'comment-body',
                                    'depth' => $depth,
                                    'max-depth' => $args['max_depth'],
                                    'before' => '<i class="mr-1.5 fa-regular fa-comment-dots"></i>'
                                )
                            )
                        );
                        if ($commentReplyLink) {
                            echo $commentReplyLink;
                        }
                        ?>
                    </section>
				</article>
<?php
		}
	}
}
?>