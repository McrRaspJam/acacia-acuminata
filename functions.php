<?php

function show_tag_list ($id, $separator, $before) {
    $tags = wp_get_post_tags($id);

    if (!empty($tags)) {

        $tags_html = array();
        foreach ($tags as $tag) {
            $tags_html[] = "<a href='" . site_url() . "/tag/{$tag->slug}'>{$tag->name}</a>";
        }

        echo $before . join($separator, $tags_html);
    }
}

function meta_description() {
    if (is_single()) {
        the_excerpt();
    }
    else {
        echo 'The Manchester-based Raspberry Pi user group';
    }
}

function random_404_message() {
    $random_1 = rand(0, 2);
    $random_2 = rand(0, 2);

    $words = array(
        'Raspberry',
        'Jam',
        'Pi'
    );

    $word = $words[$random_1];

    $messages = array(
        "No {$word} here...",
        "This is not the {$word} you are looking for...",
        "The {$word} you requested could not be found",
    );

    echo $messages[$random_2];
}

/* Filters */

function my_embed_oembed_html($html, $url, $attr, $post_id) {
        return '<div class="video">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);

function modify_read_more_link() {
        return '<a class="more-link" href="' . get_permalink() . '"><span>Continue reading</span></a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/* Stylesheets */

wp_enqueue_style( 'mobile', get_stylesheet_directory_uri() . '/mobile.css' );
wp_enqueue_style( 'print', get_stylesheet_directory_uri() . '/print.css' );

/* Theme Support*/

register_nav_menu('primary', 'Nav Bar');
register_nav_menu('company', 'Footer Nav');

$headerargs = array(
	'width'         => 128,
	'height'        => 128,
	'default-image' => 'http://placehold.it/128x128',
);
add_theme_support( 'custom-header', $headerargs );
?>
