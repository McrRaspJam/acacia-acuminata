<?php
$args = array(
    'post_type' => 'supporters',
    'orderby' => 'rand',
    'posts_per_page' => 100,
);

$friends = new WP_Query($args);
?>

<h3>Supporters of Manchester Raspberry Jam</h3>
<p>The following organisations are currently or have previously helped support Manchester Raspberry Jam.</p>

<div id="associates">
        <?php while ($friends->have_posts()):
                $friends->the_post();
                $thumbnail_args = array('title' => get_the_title()); ?>
                <div class="associate supporter">
                        <a href="<?php the_field('url'); ?>" target="_blank"><?php the_post_thumbnail('friend_thumb', $thumbnail_args); ?></a>
                        <?php the_excerpt(); ?>
                </div>
        <?php endwhile; ?>
</div>
