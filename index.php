<?php get_header(); ?>

<?php
if (have_posts()):
    	while (have_posts()) {
        	the_post();
        	get_template_part( 'template-parts/post/content', get_post_type() );
    	}
   	get_template_part('prevnext');
else:
	get_template_part('part', '404');
endif; ?>

<?php get_footer(); ?>
