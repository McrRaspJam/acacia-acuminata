<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<title><?php wp_title('| ', true, 'right'); bloginfo('title'); ?></title>
		<meta name="description" content="<?php meta_description(); ?>" />
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
		<?php wp_head(); ?>
	</head>
	<body>
		<?php get_template_part('nav', 'header'); ?>
		<main id="page">
			<header>
				<a href="<?php echo get_home_url(); ?>">
					<h1><?php bloginfo('title'); ?></h1>
					<em><?php bloginfo('description'); ?></em>
				</a>
			</header>
