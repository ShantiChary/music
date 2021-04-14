<?php
  /*
  Plugin Name: Music Theme CPT & taxonomy
  Description: Music Theme Custom Post Types and Taxonomies
  Version: 1.0
  Author: Shanti Chary
  License: GPL 2.1
  */

  function music_register_custom_post_types() {
    //Band Custom Post type
    $labels = array(
        'name'               => _x( 'Bands', 'post type general name' ),
        'singular_name'      => _x( 'Band', 'post type singular name'),
        'menu_name'          => _x( 'Bands', 'admin menu' ),
        'name_admin_bar'     => _x( 'Band', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'band' ),
        'add_new_item'       => __( 'Add New Band' ),
        'new_item'           => __( 'New Band' ),
        'edit_item'          => __( 'Edit Band' ),
        'view_item'          => __( 'View Band' ),
        'all_items'          => __( 'All Bands' ),
        'search_items'       => __( 'Search Bands' ),
        'parent_item_colon'  => __( 'Parent Bands:' ),
        'not_found'          => __( 'No bands found.' ),
        'not_found_in_trash' => __( 'No bands found in Trash.' ),
        'archives'           => __( 'Band Archives'),
        'insert_into_item'   => __( 'Uploaded to this band'),
        'uploaded_to_this_item' => __( 'Band Archives'),
        'filter_item_list'   => __( 'Filter bands list'),
        'items_list_navigation' => __( 'Bands list navigation'),
        'items_list'         => __( 'Bands list'),
        'featured_image'     => __( 'Band feature image'),
        'set_featured_image' => __( 'Set band feature image'),
        'remove_featured_image' => __( 'Remove band feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'bands' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'menu_icon'          => 'dashicons-media-audio',
    );
    register_post_type( 'band', $args );


 //Organizers Custom Post type
 $labels = array(
     'name'               => _x( 'Organizers', 'post type general name' ),
     'singular_name'      => _x( 'Organizer', 'post type singular name'),
     'menu_name'          => _x( 'Organizers', 'admin menu' ),
     'name_admin_bar'     => _x( 'Organizer', 'add new on admin bar' ),
     'add_new'            => _x( 'Add New', 'organizer' ),
     'add_new_item'       => __( 'Add New Organizer' ),
     'new_item'           => __( 'New Organizer' ),
     'edit_item'          => __( 'Edit Organizer' ),
     'view_item'          => __( 'View Organizer' ),
     'all_items'          => __( 'All Organizers' ),
     'search_items'       => __( 'Search Organizers' ),
     'parent_item_colon'  => __( 'Parent Organizers:' ),
     'not_found'          => __( 'No Organizers found.' ),
     'not_found_in_trash' => __( 'No Organizers found in Trash.' ),
     'archives'           => __( 'Organizer Archives'),
     'insert_into_item'   => __( 'Uploaded to this Organizer'),
     'uploaded_to_this_item' => __( 'Organizer Archives'),
     'filter_item_list'   => __( 'Filter Organizers list'),
     'items_list_navigation' => __( 'Organizers list navigation'),
     'items_list'         => __( 'Organizers list'),
     'featured_image'     => __( 'Organizer feature image'),
     'set_featured_image' => __( 'Set Organizer feature image'),
     'remove_featured_image' => __( 'Remove Organizer feature image'),
     'use_featured_image' => __( 'Use as feature image'),
 );

 $args = array(
     'labels'             => $labels,
     'public'             => true,
     'publicly_queryable' => true,
     'show_ui'            => true,
     'show_in_menu'       => true,
     'show_in_nav_menus'  => true,
     'show_in_admin_bar'  => true,
     'query_var'          => true,
     'rewrite'            => array( 'slug' => 'organizers' ),
     'capability_type'    => 'post',
     'has_archive'        => true,
     'hierarchical'       => false,
     'menu_position'      => 5,
     'supports'           => array( 'title', 'thumbnail', 'editor' ),
     'menu_icon'          => 'dashicons-media-audio',
 );
 register_post_type( 'organizer', $args );
}

 add_action( 'init', 'music_register_custom_post_types' );

 function music_rewrite_flush() {
    music_register_custom_post_types();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'music_rewrite_flush' );



//--------------------------------------------------------------
// Taxonomies
//--------------------------------------------------------------
function music_register_taxonomies() {
   // Add Band Type taxonomy - hierarchical (like categories)
   $labels = array(
       'name'              => _x( 'Band Categories', 'taxonomy general name' ),
       'singular_name'     => _x( 'Band Category', 'taxonomy singular name' ),
       'search_items'      => __( 'Search Band Categories' ),
       'all_items'         => __( 'All Band Category' ),
       'parent_item'       => __( 'Parent Band Category' ),
       'parent_item_colon' => __( 'Parent Band Category:' ),
       'edit_item'         => __( 'Edit Band Category' ),
       'view_item'         => __( 'Vview Band Category' ),
       'update_item'       => __( 'Update Band Category' ),
       'add_new_item'      => __( 'Add New Band Category' ),
       'new_item_name'     => __( 'New Band Category Name' ),
       'menu_name'         => __( 'Band Category' ),
   );
   $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_in_menu'      => true,
       'show_in_nav_menu'  => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'band-categories' ),
   );
   register_taxonomy( 'band-category', array( 'band' ), $args );

   // Add Organizer Type taxonomy - hierarchical (like categories)
   $labels = array(
       'name'              => _x( 'Organizer Categories', 'taxonomy general name' ),
       'singular_name'     => _x( 'Organizer Category', 'taxonomy singular name' ),
       'search_items'      => __( 'Search Organizer Categories' ),
       'all_items'         => __( 'All Organizer Category' ),
       'parent_item'       => __( 'Parent Organizer Category' ),
       'parent_item_colon' => __( 'Parent Organizer Category:' ),
       'edit_item'         => __( 'Edit Organizer Category' ),
       'view_item'         => __( 'Vview Organizer Category' ),
       'update_item'       => __( 'Update Organizer Category' ),
       'add_new_item'      => __( 'Add New Organizer Category' ),
       'new_item_name'     => __( 'New Organizer Category Name' ),
       'menu_name'         => __( 'Organizer Category' ),
   );
   $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_in_menu'      => true,
       'show_in_nav_menu'  => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'organizer-categories' ),
   );
   register_taxonomy( 'organizer-category', array( 'organizer' ), $args );


}
add_action( 'init', 'music_register_taxonomies');
