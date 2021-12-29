<?php
get_template_part( 'inc/custom_post_type' );
//get_template_part( 'inc/functions/woocommerce-functions' );
//get_template_part( 'inc/add-to-cart-form-submission/add-custom-data-to-cart' );

/**************************************************
            Declare WooCommerce support
**************************************************/
//add_theme_support( 'woocommerce' );
/**************************************************
                REMOVE ADMIN MENU
**************************************************/
function remove_menus(){
  // remove_menu_page( 'index.php' );               //Dashboard
  remove_menu_page( 'edit.php' );    
  // remove_menu_page( 'upload.php' );              //Media
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'plugins.php' );             //Plugins
  // remove_menu_page( 'users.php' );               //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );     //Settings
}
add_action( 'admin_menu', 'remove_menus' );

/**************************************************
            REGISTER HEADER AND FOOTER
**************************************************/
register_nav_menus( array(
  'header'  => __( 'Header', 'sitename' ),
  'footer'  => __( 'Footer', 'sitename' ),
  'Services'  => __( 'Services', 'sitename' ),
) );
add_theme_support( 'menus' );

/**************************************************
               ADD ADMIN STYLE
**************************************************/
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo "<style>
    input[type=checkbox]:checked::before{
      content: url(data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%3E%3Cpath%20d%3D%27M14.83%204.89l1.34.94-5.81%208.38H9.02L5.78%209.67l1.34-1.25%202.57%202.4z%27%20fill%3D%27%233582c4%27%2F%3E%3C%2Fsvg%3E); !important;
    }
  </style>";
}
/**************************************************
            Add Class in Menu
**************************************************/
function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
  if ( $depth == 0 && 'header' == $args->theme_location ) {
    $item_output = preg_replace('/<a /', '<a class="nav-link" ', $item_output, 1);
  }
  return $item_output;
}
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);


/**************************************************
            ACF THEME SETTINGS PAGE
**************************************************/
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
      'page_title' => 'Theme General Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
  ));
}
/**************************************************
          Span option enabled in editor
**************************************************/
function override_mce_options($initArray)
{
  $opts = '*[*]';
  $initArray['valid_elements'] = $opts;
  $initArray['extended_valid_elements'] = $opts;
  return $initArray;
 }
 add_filter('tiny_mce_before_init', 'override_mce_options');


/**************************************************
      add class in image uploading in editor
**************************************************/
function nddt_add_class_to_images($class){
  $class .= ' img-fluid';
  return $class;
}
add_filter('get_image_tag_class','nddt_add_class_to_images');


/**************************************************
                Feature Image
**************************************************/
add_theme_support( 'post-thumbnails' );
add_post_type_support( 'featured_image', 'thumbnail' );
function create_post_type() {
  register_post_type( 'featured_image',
    array(
      'labels'      => array(
        'name'          => __( 'Featured Image' ),
        'singular_name' => __( 'featured image' )
      ),
      'public'      => true,
      'has_archive' => true
    )
  );
}
?>
