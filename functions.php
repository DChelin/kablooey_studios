<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_enqueue_script('jquery', ("/wp-content/themes/kablooey/js/jquery-1.8.2.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	

	if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
  set_post_thumbnail_size( 200, 150 ); 

}
	
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'homeporti-thumb', 300, 180, true );
		add_image_size( 'blogpost-thumb', 670, 230, true );
		add_image_size( 'portfolio-thumb', 460, 9999 );
		add_image_size( 'full-width-thumb', 670, 9999 );
		add_image_size( 'full-width-page-thumb', 928, 9999 );
		add_image_size( 'half-width-page-thumb', 440, 9999 );
}



function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');






register_sidebar(array(
'name' => 'page widgets',
    'before_widget' => '<div class="bluecontent">',
    'after_widget' => '</div>',
	'before_title' => '<h1 class="h1white">',
    'after_title' => '</h1>',
    ));


register_sidebar(array(
'name' => 'menu',
    'before_widget' => '',
    'after_widget' => '',
	'before_title' => '',
    'after_title' => '',
    ));


//Register multiple menus
	function register_my_menus() {
	  register_nav_menus(
		array(
		  'header-menu' => __( 'Main Menu' ),
		  'sidebar-menu' => __( 'Sidebar Menu' )
		)
	  );
	}
	add_action( 'init', 'register_my_menus' );
		
		

// this adds theme support for custom menus. Wordpress backend: Appearance ->Menus
add_theme_support( 'menus' );

?>