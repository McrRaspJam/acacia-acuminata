<article>
        <time datetime="<?php the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>
        <aside class="tags">
                <?php if (!is_page()) {
                        show_tag_list(get_the_ID(), ', ', 'Tags: ');
                } ?>
        </aside>
</article>
