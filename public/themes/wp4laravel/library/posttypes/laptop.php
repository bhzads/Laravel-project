<?php

// Register Custom Post Type
add_action('init', function () {
    $labels = array(
        'name'                => _x('Laptops', 'Laptops', 'wp4laravel'),
        'singular_name'       => _x('Laptop', 'Laptop', 'wp4laravel'),
        'menu_name'           => __('Laptops', 'wp4laravel'),
        'all_items'           => __('All Laptops', 'wp4laravel'),
        'view_item'           => __('Show Laptops', 'wp4laravel'),
        'add_new_item'        => __('Add Laptop', 'wp4laravel'),
        'add_new'             => __('Add Laptop', 'wp4laravel'),
        'edit_item'           => __('Edit Laptop', 'wp4laravel'),
        'update_item'         => __('Edit Laptop', 'wp4laravel'),
        'search_items'        => __('Search', 'wp4laravel'),
        'not_found'           => __('Not Laptops found', 'wp4laravel'),
        'not_found_in_trash'  => __('Not Laptops found in trash', 'wp4laravel'),
    );
    $args = array(
        'label'               => __('Laptops', 'wp4laravel'),
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
        'rewrite' => ['slug' => laptop_get_slug()],
    );
    register_post_type('laptop', $args);
}, 0);

/**
 * @return string
 */
function laptop_get_slug()
{
    switch (pll_current_language()) {
        case 'nl':
            $slug = 'laptop';
            break;
        default:
            $slug = 'laptop';
            break;
    }

    return $slug;
}
