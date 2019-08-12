<?php

// Register Custom Post Type
add_action('init', function () {
    $labels = array(
        'name'                => _x('Telefoons', 'Telefoons', 'wp4laravel'),
        'singular_name'       => _x('Telefoon', 'Telefoon', 'wp4laravel'),
        'menu_name'           => __('Telefoons', 'wp4laravel'),
        'all_items'           => __('All Telefoons', 'wp4laravel'),
        'view_item'           => __('Show Telefoons', 'wp4laravel'),
        'add_new_item'        => __('Add Telefoon', 'wp4laravel'),
        'add_new'             => __('Add Telefoon', 'wp4laravel'),
        'edit_item'           => __('Edit Telefoon', 'wp4laravel'),
        'update_item'         => __('Edit Telefoon', 'wp4laravel'),
        'search_items'        => __('Search', 'wp4laravel'),
        'not_found'           => __('Not Telefoons found', 'wp4laravel'),
        'not_found_in_trash'  => __('Not Telefoons found in trash', 'wp4laravel'),
    );
    $args = array(
        'label'               => __('Telefoons', 'wp4laravel'),
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
        'rewrite' => ['slug' => telefoon_get_slug()],
    );
    register_post_type('telefoon', $args);
}, 0);

/**
 * @return string
 */
function telefoon_get_slug()
{
    switch (pll_current_language()) {
        case 'nl':
            $slug = 'telefoon';
            break;
        default:
            $slug = 'telfon';
            break;
    }

    return $slug;
}
