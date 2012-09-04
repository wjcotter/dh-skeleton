<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'wiredpm theme' );
define( 'CHILD_THEME_URL', 'http://www.wiredpm.com' );

/** Create additional color style options */
add_theme_support( 'genesis-style-selector', array( 'wiredpm-blue' => 'Blue', 'wiredpm-green' => 'Green', 'wiredpm-red' => 'Red' ) );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add new image sizes */
add_image_size( 'grid-thumbnail', 270, 100, TRUE );
add_image_size( 'related-thumbnail', 120, 120, TRUE );
add_image_size( 'post-thumbnail', 120, 120, TRUE );


/** Register resources custom post type */
add_action( 'init', 'resources_post_type' );
function resources_post_type() {
    register_post_type( 'resources',
        array(
            'labels' => array(
                'name' => __( 'Resources' ),
                'singular_name' => __( 'Resource' ),
            ),
            'has_archive' => true,
            'public' => true,
            'rewrite' => array( 'slug' => 'resources' ),
            'supports' => array( 'title', 'editor', 'genesis-seo' ),
        )
    );
}


/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'wiredpm_viewport_meta_tag' );
function wiredpm_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add the page title section */
add_action( 'genesis_before_content_sidebar_wrap', 'wiredpm_page_title' );
function wiredpm_page_title() {
if ( ! is_home( ) )
return;
genesis_widget_area( 'page-title', array(
'before' => '<div class="page-title widget-area">',
) );
}

/** Customize search form input box text */
add_filter( 'genesis_search_text', 'custom_search_text' );
function custom_search_text($text) {
    return esc_attr('Enter key words, hit enter;');
}

/** Add the after post section */
add_action( 'genesis_after_post_content', 'wiredpm_after_post' );
function wiredpm_after_post() {
   if ( ! is_singular( 'post' ) )
       return;
   genesis_widget_area( 'after-post', array(
       'before' => '<div class="after-post widget-area">',
   ) );
}


/** Add the newsletter section */
add_action( 'genesis_after_post_content', 'wiredpm_newsletter' );
function wiredpm_newsletter() {
   if ( ! is_singular( 'post' ) )
       return;
   genesis_widget_area( 'newsletter', array(
       'before' => '<div class="newsletter">',
   ) );
}


/** Add 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Register widget areas */
genesis_register_sidebar( array(
    'id' => 'home-featured',
    'name' => __( 'Home Featured', 'wiredpm' ),
    'description' => __( 'This is the home featured section.', 'wiredpm' ),
) );

genesis_register_sidebar( array(
	'id'			=> 'page-title',
	'name'			=> __( 'Page Title', 'wiredpm' ),
	'description'	=> __( 'This is the page title section.', 'wiredpm' ),
) );

genesis_register_sidebar( array(
	'id'			=> 'after-post',
	'name'			=> __( 'After Post', 'wiredpm' ),
	'description'	=> __( 'This is the after post section.', 'wiredpm' ),
	'before_widget' => '<div class="widget">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',

) );

genesis_register_sidebar( array(
	'id'			=> 'newsletter',
	'name'			=> __( 'Newsletter', 'wiredpm' ),
	'description'	=> __( 'This is the Newsletter after post section.', 'wiredpm' ),
) );



/** Customize the post info function */
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
if (is_single()) {
    $post_info = '[post_date] by [post_author_posts_link] &middot; [tweetbutton]';
	}
	else {
	$post_info = '[post_date] by [post_author_posts_link]';
	}
    return $post_info;

}


/** Customize the post meta function */ 
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter($post_meta) {
if(!is_front_page()) {
    $post_meta = '[post_categories] [post_tags]';
	}
	else {
	remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
	}
	return $post_meta;
}



/** Remove the post meta function 
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
*/
