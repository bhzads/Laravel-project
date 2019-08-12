<?php

// Register Custom Post Type
add_action('init', function () {
    $labels = array(
        'name'                => _x('Desktops', 'Desktops', 'wp4laravel'),
        'singular_name'       => _x('Desktop', 'Desktop', 'wp4laravel'),
        'menu_name'           => __('Desktops', 'wp4laravel'),
        'all_items'           => __('All Desktops', 'wp4laravel'),
        'view_item'           => __('Show Desktops', 'wp4laravel'),
        'add_new_item'        => __('Add Desktop', 'wp4laravel'),
        'add_new'             => __('Add Desktop', 'wp4laravel'),
        'edit_item'           => __('Edit Desktop', 'wp4laravel'),
        'update_item'         => __('Edit Desktop', 'wp4laravel'),
        'search_items'        => __('Search', 'wp4laravel'),
        'not_found'           => __('Not Desktops found', 'wp4laravel'),
        'not_found_in_trash'  => __('Not Desktops found in trash', 'wp4laravel'),
    );
    $args = array(
        'label'               => __('Desktops', 'wp4laravel'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'excerpt'),
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
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite' => ['slug' => desktop_get_slug()],
    );
    register_post_type('desktop', $args);
}, 0);

/**
 * @return string
 */
function desktop_get_slug()
{
    switch (pll_current_language()) {
        case 'nl':
            $slug = 'desktop';
            break;
        default:
            $slug = 'disktop';
            break;
    }

    return $slug;
}
