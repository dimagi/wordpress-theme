<?php
/**
 * @package Dimagi
 * @subpackage Dimagi_4
 */

add_action( 'init', 'create_my_taxonomies', 0 );

function create_my_taxonomies() {
	register_taxonomy( 'technologies', 'post', array( 'hierarchical' => false, 'label' => 'Technologies', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'projects', 'post', array( 'hierarchical' => false, 'label' => 'Case Studies', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'areas', 'post', array( 'hierarchical' => false, 'label' => 'Sectors', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'services', 'post', array( 'hierarchical' => false, 'label' => 'Services', 'query_var' => true, 'rewrite' => true ) );
}

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
