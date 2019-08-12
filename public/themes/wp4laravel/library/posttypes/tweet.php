<?php

// Register Custom Post Type
add_action('init', function () {
    $labels = array(
        'name'                => _x('Tweet', 'Tweet', 'wp4laravel'),
        'singular_name'       => _x('Tweet', 'Tweet', 'wp4laravel'),
        'menu_name'           => __('Tweet', 'wp4laravel'),
        'all_items'           => __('All Tweet', 'wp4laravel'),
        'view_item'           => __('Show Tweet', 'wp4laravel'),
        'add_new_item'        => __('Add Tweet', 'wp4laravel'),
        'add_new'             => __('Add Tweet', 'wp4laravel'),
        'edit_item'           => __('Edit Tweet', 'wp4laravel'),
        'update_item'         => __('Edit Tweet', 'wp4laravel'),
        'search_items'        => __('Search', 'wp4laravel'),
        'not_found'           => __('Not found', 'wp4laravel'),
        'not_found_in_trash'  => __('Not found in trash', 'wp4laravel'),
    );
    $args = array(
        'label'               => __('Tweet', 'wp4laravel'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'editor'),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 40,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'capability_type'     => 'post',
    );
    register_post_type('Tweet', $args);
}, 0);

/**
 * Only admin can view tweet content type
 */
function hide_tweet_post_type() {
    if( !current_user_can( 'administrator' ) ):
        remove_menu_page( 'edit.php?post_type=tweet' );
    endif;
}
add_action( 'admin_menu', 'hide_tweet_post_type' );
