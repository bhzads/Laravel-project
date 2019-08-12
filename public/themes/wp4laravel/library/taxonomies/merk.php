<?php

// hook into the init action and call create_book_taxonomies when it fires

add_action('init', function () {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x('Merks', 'Merks', 'wp4laravel'),
        'singular_name'     => _x('Merk', 'Merk', 'wp4laravel'),
        'search_items'      => __('Search Merks', 'wp4laravel'),
        'all_items'         => __('All Merks', 'wp4laravel'),
        'edit_item'         => __('Edit Merk', 'wp4laravel'),
        'update_item'       => __('Update Merk', 'wp4laravel'),
        'add_new_item'      => __('Add New Merk', 'wp4laravel'),
        'new_item_name'     => __('New Merk', 'wp4laravel'),
        'menu_name'         => __('Merks', 'wp4laravel'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => false,
    );

    register_taxonomy('merk', array( 'desktop','laptop','telefoon' ), $args);
});
