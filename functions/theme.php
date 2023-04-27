<?php


//CUSTOM CSS AND JS

function keweb_script_enqueue()
{
  wp_enqueue_style('aos-css', get_template_directory_uri() . '/include/aos/aos.css', array(), null, 'all');
  wp_enqueue_script('aos-js', get_template_directory_uri() . '/include/aos/aos.js', array(), '1.0.0', true);
  wp_enqueue_style('slick-css', get_template_directory_uri() . '/include/slick/slick.css', array(), null, 'all');
  wp_enqueue_script('slick-js', get_template_directory_uri() . '/include/slick/slick.min.js', array(), '1.0.0', true);
  wp_enqueue_style('main-css', get_template_directory_uri() . '/dist/style.min.css', array(), filemtime(get_stylesheet_directory() . '/dist/style.min.css'), 'all');
  wp_enqueue_script('js', get_template_directory_uri() . '/dist/keweb.min.js', array(), filemtime(get_stylesheet_directory() . '/dist/keweb.min.js'), true);

  // Dequeue default jquery and add new
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/js/jquery.min.js', array(), null, false);
}

add_action('wp_enqueue_scripts', 'keweb_script_enqueue');


//MENUS

function keweb_theme_setup()
{
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
  add_theme_support('post-formats', array('aside', 'image', 'video'));
  register_nav_menu('primary', 'Primary Header Navigation');
}

add_action('init', 'keweb_theme_setup');


//Custom-Logo

add_theme_support('custom-logo');

add_filter('acf/settings/remove_wp_meta_box', '__return_false');


//Image sizes

add_image_size('large-thumb', 600);


//WP SECURITY

function wpb_remove_version()
{
  return '';
}
add_filter('the_generator', 'wpb_remove_version');

function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

add_filter( 'rest_endpoints', function( $endpoints ){
  if ( isset( $endpoints['/wp/v2/users'] ) ) {
      unset( $endpoints['/wp/v2/users'] );
  }
  if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
      unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
  }
  return $endpoints;
});

if (!is_admin()) {
	// default URL format
	if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
	add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request) {
	// permalink URL format
	if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
	else return $redirect;
}


//REMOVE WELCOME PANEL

remove_action('welcome_panel', 'wp_welcome_panel');

//DISABLE XML-RPC

add_filter('xmlrpc_enabled', '__return_false');

add_filter('show_admin_bar', '__return_false');