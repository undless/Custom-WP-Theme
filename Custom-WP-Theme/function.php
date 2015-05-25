<?php
add_theme_support( 'post-thumbnails' );

add_action('init', 'my_custom_init');
function my_custom_init()
{
	add_theme_support( 'menus' );
	if ( function_exists('register_sidebar') )
	    register_sidebar();

}

/*////////////////////// SECURITY //////////////////////*/
// REMOVE WP VERSION
remove_action('wp_head', 'wp_generator');
// REMOVE Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');

