<?php

// Add a custom post type for galleries
function photostudio_register_gallery_post_type() {
    $labels = array(
        'name'                  => __( 'Galleries', 'photostudio' ),
        'singular_name'         => __( 'Gallery', 'photostudio' ),
        'menu_name'             => __( 'Galleries', 'photostudio' ),
        'name_admin_bar'        => __( 'Gallery', 'photostudio' ),
        'add_new'               => __( 'Add New', 'photostudio' ),
        'add_new_item'          => __( 'Add New Gallery', 'photostudio' ),
        'new_item'              => __( 'New Gallery', 'photostudio' ),
        'edit_item'             => __( 'Edit Gallery', 'photostudio' ),
        'view_item'             => __( 'View Gallery', 'photostudio' ),
        'all_items'             => __( 'All Galleries', 'photostudio' ),
        'search_items'          => __( 'Search Galleries', 'photostudio' ),
        'parent_item_colon'     => __( 'Parent Galleries:', 'photostudio' ),
        'not_found'             => __( 'No galleries found.', 'photostudio' ),
        'not_found_in_trash'    => __( 'No galleries found in Trash.', 'photostudio' )
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __( 'Description.', 'photostudio' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'galleries' ),
        'capability_type'       => 'post',
        'has_archive'           => 'galleries',
        'hierarchical'         => false,
        'menu_position'         => null,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'post_tag' ),
        'menu_icon'             => 'dashicons-images-alt',
        'taxonomies' => array('post_tag'),
    );

//     register_post_type( 'photostudio_gallery', $args );
// }
register_post_type( 'photostudio_gallery', $args );

$archive_args = array(
  'labels' => array(
    'name' => __( 'Galleries Archive' ),
    'singular_name' => __( 'Galleries Archive' )
  ),
  'public' => true,
  'rewrite' => array(
    'slug' => 'galleries',
    'with_front' => false
  ),
  'has_archive' => true
);

register_post_type( 'photostudio_gallery_archive', $archive_args );
}
add_action( 'init', 'photostudio_register_gallery_post_type' );

