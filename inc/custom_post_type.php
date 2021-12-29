<?php
/**************************************************
                Services CPT
**************************************************/
function SERVICES() {
  register_post_type( 'Services',
    array(
        'labels' => array(
            'name' => __( 'Services'),
            'singular_name' => __( 'Services')
        ),
        'public' => true,
            'menu_icon' => 'dashicons-list-view',
            'rewrite' => array('slug' => 'Services'),
        )
    );
}
add_action( 'init', 'SERVICES' );
function SERVICES_a() {
  $labels = array(
    'name'                => _x( 'Services', 'Post Type General Name', 'sitename' ),
    'singular_name'       => _x( 'Services', 'Post Type Singular Name', 'sitename' ),
    'menu_name'           => __( 'Services', 'sitename' ),
    'parent_item_colon'   => __( 'Services', 'sitename' ),
    'all_items'           => __( 'All Services', 'sitename' ),
    'view_item'           => __( 'View Services', 'sitename' ),
    'add_new_item'        => __( 'Add New Services', 'sitename' ),
    'add_new'             => __( 'Add New', 'sitename' ),
    'edit_item'           => __( 'Edit Services', 'sitename' ),
    'update_item'         => __( 'Update Services', 'sitename' ),
    'search_items'        => __( 'Search Services', 'sitename' ),
    'not_found'           => __( 'Not Found', 'sitename' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'sitename' ),
    'attributes' => 'Page Attributes',
  );
  $args = array(
    'label'               => __( 'Services', 'sitename' ),
    'description'         => __( 'Services', 'sitename' ),
    'labels'              => $labels,
    'supports'            => array( 'title','thumbnail'),
    'taxonomies'          => array( 'genres' ),
    'hierarchical'        => true,
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 1,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'SERVICES', $args );
}
add_action( 'init', 'SERVICES_a', 0 );

?>