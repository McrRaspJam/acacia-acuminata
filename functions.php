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

/* Custom field posts */

add_action('init', 'create_events_post_type');
add_action('init', 'create_supporters_post_type');
add_action('init', 'create_friends_post_type');

function create_events_post_type() {
        register_post_type('events',
                array(
                        'labels' => array(
                                'name' => 'Events',
                                'singular_name' => 'Event',
                                'add_new' => 'Add New',
                                'add_new_item' => 'Add New Event',
                                'edit_item' => 'Edit Event',
                                'new_item' => 'New Event',
                                'all_items' => 'All Events',
                                'view_item' => 'View Event',
                                'search_items' => 'Search Events',
                                'not_found' =>  'No Events Found',
                                'not_found_in_trash' => 'No Events found in Trash',
                                'menu_name' => 'Events',
                        ),
                        'public' => true,
                        'has_archive' => true,
                        'supports' => array('title', 'thumbnail'),
                        'menu_position' => 5,
                        'menu_icon' => 'dashicons-calendar-alt'
                )
        );

        add_theme_support('post-thumbnails', array('events'));
}

function create_supporters_post_type() {
        register_post_type('supporters',
                array(
                        'labels' => array(
                                'name' => 'Supporters',
                                'singular_name' => 'Supporter',
                                'add_new' => 'Add New',
                                'add_new_item' => 'Add New Supporter',
                                'edit_item' => 'Edit Supporter',
                                'new_item' => 'New Supporter',
                                'all_items' => 'All Supporters',
                                'view_item' => 'View Supporter',
                                'search_items' => 'Search Supporters',
                                'not_found' =>  'No Supporters Found',
                                'not_found_in_trash' => 'No Supporters found in Trash',
                                'menu_name' => 'Supporters'
                        ),
                        'public' => true,
                        'has_archive' => false,
                        'rewrite' => array('slug' => 'supporter'),
                        'supports' => array('title', 'excerpt', 'thumbnail'),
                        'menu_icon' => 'dashicons-groups'
                )
        );

        add_theme_support('post-thumbnails', array('supporters'));
}


        function create_friends_post_type() {
                register_post_type('friends',
                        array(
                                'labels' => array(
                                        'name' => 'Friends',
                                        'singular_name' => 'Friend',
                                        'add_new' => 'Add New',
                                        'add_new_item' => 'Add New Friend',
                                        'edit_item' => 'Edit Friend',
                                        'new_item' => 'New Friend',
                                        'all_items' => 'All Friends',
                                        'view_item' => 'View Friend',
                                        'search_items' => 'Search Friends',
                                        'not_found' =>  'No Friends Found',
                                        'not_found_in_trash' => 'No Friends found in Trash',
                                        'menu_name' => 'Friends'
                                ),
                                'public' => true,
                                'has_archive' => false,
                                'rewrite' => array('slug' => 'friend'),
                                'supports' => array('title', 'excerpt', 'thumbnail'),
                                'menu_icon' => 'dashicons-groups'
                        )
                );

                add_theme_support('post-thumbnails', array('friends'));
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

wp_enqueue_style( 'mobile', get_stylesheet_directory_uri() . '/assets/css/mobile.css' );
/* wp_enqueue_style( 'print', get_stylesheet_directory_uri() . '/assets/css/print.css' ); */
wp_enqueue_style( 'events', get_stylesheet_directory_uri() . '/assets/css/events.css' );

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
