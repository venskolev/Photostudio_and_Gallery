<?php

// Add a custom post type for clients
function photostudio_register_client_post_type() {
    $labels = array(
        'name'                  => __( 'Clients', 'photostudio' ),
        'singular_name'         => __( 'Client', 'photostudio' ),
        'menu_name'             => __( 'Clients', 'photostudio' ),
        'name_admin_bar'        => __( 'Client', 'photostudio' ),
        'add_new'               => __( 'Add New', 'photostudio' ),
        'add_new_item'          => __( 'Add New Client', 'photostudio' ),
        'new_item'              => __( 'New Client', 'photostudio' ),
        'edit_item'             => __( 'Edit Client', 'photostudio' ),
        'view_item'             => __( 'View Client', 'photostudio' ),
        'all_items'             => __( 'All Clients', 'photostudio' ),
        'search_items'          => __( 'Search Clients', 'photostudio' ),
        'parent_item_colon'     => __( 'Parent Clients:', 'photostudio' ),
        'not_found'             => __( 'No clients found.', 'photostudio' ),
        'not_found_in_trash'    => __( 'No clients found in Trash.', 'photostudio' )
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __( 'Description.', 'photostudio' ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'clients' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'         => false,
        'menu_position'         => null,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'             => 'dashicons-id'
    );

    register_post_type( 'photostudio_client', $args );
}
add_action( 'init', 'photostudio_register_client_post_type' );
