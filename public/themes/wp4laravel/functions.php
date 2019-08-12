<?php

/*	Name: WP4Laravel - Theme
 *  Author: IN10dev
 *  URL: in10.nl | @in10
 */

$path        =    get_template_directory().'/library/';
$directory    =    new \RecursiveDirectoryIterator($path);
$iterator     =    new \RecursiveIteratorIterator($directory);
$files = array();

foreach ($iterator as $info) {
    if (substr($info->__toString(), -4) == '.php') {
        require_once($info->getPathname());
    }
}

// disable gutenberg for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable gutenberg for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);


//function wpb_image_editor_default_to_gd( $editors ) {
//    $gd_editor = 'WP_Image_Editor_GD';
//    $editors = array_diff( $editors, array( $gd_editor ) );
//    array_unshift( $editors, $gd_editor );
//    return $editors;
//}
//add_filter( 'wp_image_editors', 'wpb_image_editor_default_to_gd' );

