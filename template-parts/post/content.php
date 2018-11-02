<article>
        <time datetime="<?php the_date( 'Y-m-d' ); ?>" class="pretitle"><?php echo get_the_date(); ?></time>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <?php the_content(); ?>

        <?php if (!is_page()): ?>
                <nav class="tags">
                        <?php show_tag_list(get_the_ID(), ', ', 'Tags: '); ?>
                </nav>
        <?php endif; ?>
</article>
