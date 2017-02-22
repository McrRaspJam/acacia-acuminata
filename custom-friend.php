<?php
$args = array(
    'post_type' => 'friends',
    'orderby' => 'rand',
    'posts_per_page' => 100,
);

$friends = new WP_Query($args);
?>

<h3>Community Links</h3>
<p>Below are some organisations that share our goal to teach and share the excitement of Computing.</p>

<div id="associates">
        <?php while ($friends->have_posts()):
                $friends->the_post();
                $thumbnail_args = array('title' => get_the_title()); ?>
                <div class="associate friend">
                        <a href="<?php the_field('url'); ?>" target="_blank"><?php the_post_thumbnail('friend_thumb', $thumbnail_args); ?></a>
                        <?php the_excerpt(); ?>
                </div>
        <?php endwhile; ?>
</div>
