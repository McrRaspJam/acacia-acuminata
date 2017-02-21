<?php if (!is_page()): ?>
        <nav id="prevnext">
                <?php if (is_singular('post')): ?>
                        <?php previous_post_link(); ?>
                        <span id="prevnextspacer"></span>
                        <?php next_post_link(); ?>
                <?php else: ?>
                        <?php previous_posts_link(); ?>
                        <span id="prevnextspacer"></span>
                        <?php next_posts_link(); ?>
                <?php endif; ?>
        </nav>
<?php endif; ?>
