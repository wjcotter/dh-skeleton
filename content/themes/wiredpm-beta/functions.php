<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'eleven40 theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/themes/eleven40' );

/** Create additional color style options */
add_theme_support( 'genesis-style-selector', array( 'eleven40-blue' => 'Blue', 'eleven40-green' => 'Green', 'eleven40-red' => 'Red' ) );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add new image sizes */
add_image_size( 'grid-thumbnail', 270, 100, TRUE );
add_image_size( 'related-thumbnail', 120, 120, TRUE );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'eleven40_viewport_meta_tag' );
function eleven40_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add the page title section */
add_action( 'genesis_before_content_sidebar_wrap', 'eleven40_page_title' );
function eleven40_page_title() {
if ( ! is_home( ) )
return;
genesis_widget_area( 'page-title', array(
'before' => '<div class="page-title widget-area">',
) );
}

/** Add the RP after post section */
add_action( 'genesis_after_post_content', 'eleven40_after_post_rp' );
function eleven40_after_post_rp() {
   if ( ! is_singular( 'post' ) )
       return;
   genesis_widget_area( 'after-post-rp', array(
       'before' => '<div class="after-post-rp widget-area"><h3>Related Posts...</h3>',
   ) );
}


/** Add the newsletter section */
add_action( 'genesis_after_post_content', 'eleven40_newsletter' );
function eleven40_newsletter() {
   if ( ! is_singular( 'post' ) )
       return;
   genesis_widget_area( 'newsletter', array(
       'before' => '<div class="newsletter">',
   ) );
}

/** Add the after post section */
add_action( 'genesis_after_post_content', 'eleven40_after_post' );
function eleven40_after_post() {
   if ( ! is_singular( 'post' ) )
       return;
   genesis_widget_area( 'after-post', array(
       'before' => '<div class="after-post widget-area">',
   ) );
}



/** Add 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Register widget areas */
genesis_register_sidebar( array(
    'id' => 'home-featured',
    'name' => __( 'Home Featured', 'eleven40' ),
    'description' => __( 'This is the home featured section.', 'eleven40' ),
) );

genesis_register_sidebar( array(
	'id'			=> 'page-title',
	'name'			=> __( 'Page Title', 'eleven40' ),
	'description'	=> __( 'This is the page title section.', 'eleven40' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'after-post-rp',
	'name'			=> __( 'After Post RP', 'eleven40' ),
	'description'	=> __( 'This is the RP after post section.', 'eleven40' ),
) );

genesis_register_sidebar( array(
	'id'			=> 'newsletter',
	'name'			=> __( 'Newsletter', 'eleven40' ),
	'description'	=> __( 'This is the Newsletter after post section.', 'eleven40' ),
) );

genesis_register_sidebar( array(
	'id'			=> 'after-post',
	'name'			=> __( 'After Post', 'eleven40' ),
	'description'	=> __( 'This is the after post section.', 'eleven40' ),
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

/** Remove the post meta function */
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

/** Content Social Buttons 
add_filter( 'the_content', 'wjc_social_buttons' );

function wjc_social_buttons( $content ) {
$add = '<div>';
$add = '<ul class="social-media">';

     $add .= '<li>';
	 $add .= '<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwiredpm.com%2Falpha&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe>';
	 $add .= '</li>';
	 $add .= '<li>';
	 $add .= '<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/tweet_button.html"
style="width:130px; height:20px;"></iframe>';
	 $add .= '</li>';
	 $add .= '<li>';
	 $add .= '<iframe id="I1_1331708565341" width="100%" scrolling="no" frameborder="0" title="+1" vspace="0" tabindex="0" style="position: static; left: 0pt; top: 0pt; width: 90px; margin: 0px; border-style: none; visibility: visible; height: 20px;" src="https://plusone.google.com/_/+1/fastbutton?url=http%3A%2F%2Fwiredpm.com%2Falpha%2F15%2Finspiration%2F&size=medium&count=true&align=left&annotation=bubble&hl=en-US&jsh=m%3B%2F_%2Fapps-static%2F_%2Fjs%2Fgapi%2F__features__%2Frt%3Dj%2Fver%3Dt_fRXLZrGUk.en_US.%2Fsv%3D1%2Fam%3D!wJ3zzZyr7MyIPjLesA%2Fd%3D1#id=I1_1331708565341&parent=http%3A%2F%2Fwiredpm.com&rpctoken=185334342&_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart" name="I1_1331708565341" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true"></iframe>';
	 $add .= '</li>';
	$add .= '<li>';
	 $add .= '<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="wiredpm.com/alpha/" data-counter="right"></script>';
	 $add .= '</li>';
	 
     $add .= '</ul>';
	 


     return $content . $add;
}

**/


/** Content Social Buttons 
add_filter( 'the_content', 'wjc_social_buttons' );

function wjc_social_buttons( $content ) {

     $add = '<div class="social-media">';

     $add .= '[fb-like]';
	 $add .= '[tweetbutton]';
	 $add .= '[google-plusone]';

     $add .= '</div>';

     return $content . $add;
}


**/

/* SFC Like Button Shortcode 
function sfc_like_shortcode($atts) {
	global $sfc_like_defaults;

	$options = get_option('sfc_options');
	if (!empty($options['like_layout'])) $sfc_like_defaults['layout']=$options['like_layout'];
	if (!empty($options['like_action'])) $sfc_like_defaults['action']=$options['like_action'];
	if (!empty($options['like_send'])) $sfc_like_defaults['send']=$options['like_send'];
	
	$args = shortcode_atts($sfc_like_defaults, $atts);

	return get_sfc_like_button($args);
}
add_shortcode('fb-like', 'sfc_like_shortcode');

/* SGC Plusone Shortcode 
function sgc_plusone_shortcode($atts) {

	global $sgc_plusone_defaults;



	$args = shortcode_atts($sgc_plusone_defaults, $atts);



	return get_sgc_plusone_button($args);

}

add_shortcode('google-plusone', 'sgc_plusone_shortcode');


/* STC Tweet button Shortcode Example use: [tweetbutton source="ottodestruct"] or [tweetbutton id="123"] 

 

function stc_tweetbutton_shortcode($atts) {

	global $stc_tweetbutton_defaults;

	$args = shortcode_atts($stc_tweetbutton_defaults, $atts);

	return get_stc_tweetbutton($args);

}



add_shortcode('tweetbutton', 'stc_tweetbutton_shortcode');


*/

/**
add_action( 'wp_print_scripts', 'child_add_tweet_button' );
 
/**
 * Add tweet link and script.
 *
 * @author Gary Jones
 * @link http://dev.studiopress.com/alternative-tweet-button.htm
 
function child_add_tweet_button() {
 
    // Only add this to anything not a page
    if ( is_single() ) {
 
        // Add a script to the bottom of the source
        wp_enqueue_script( 'tweet-button', 'http://platform.twitter.com/widgets.js', array( ), '', true );
 
        // Filter in the required Twitter link for limited and unlimited content
        add_filter( 'genesis_post_info', 'child_add_tweet_button_link' );
    }
}
 
/**
 * Add tweet link.
 *
 * @author Gary Jones
 * @link http://dev.studiopress.com/alternative-tweet-button.htm
 *
 * @param string $content HTML markup for post content
 * @return string HTML markup for post content
 
function child_add_tweet_button_link() {
    global $post;
 
    $termlist = ' #wjcotter';
    $title = get_the_title( $post->ID );
    $terms = wp_get_object_terms( $post->ID, array( 'category', 'post_tag' ) );
 
    foreach ( $terms as $term ) {
 
        if ( in_array( $term->slug, array( 'uncategorized', 'all' ) ) )
            continue;
 
        if ( strlen( $title . str_replace( ' ', '', $term->name ) . $termlist ) >= 115 )
            continue;
 
        $termlist .= ' #' . str_replace( ' ', '', $term->name );
    }
 
    $query_string_parameters = array(
        // URL of the page to share
        'url' => get_permalink(),
        // Screen name of the user to attribute the Tweet to
        'via' => 'wjcotter',
        // Default Tweet text - here, the post title
        'text' => $title.$termlist,
        // Related accounts that will be suggested to follow once tweet has been shared
        'related' => 'wjcotter',
        // Count box position - 'horizontal', 'vertical' or 'none'
        'count' => 'horizontal',
        // The language for the Tweet Button - default is English (en)
        'lang' => 'en',
        // The URL to which your shared URL resolves to
        'counturl' => get_permalink()
    );
 
    // Optionally use this if you have custom shortlinks set up. Uncomment to use.
    //$query_string_parameters['url'] = wp_get_shortlink();
    // Construct our URL to pass to Twitter - gets urlencoded here
    $twitter_url = add_query_arg( $query_string_parameters, '//twitter.com/share' );
 
    //$twitter_url = str_replace( '&via', '?via', $twitter_url );
 
    return '<div class="post-info">Posted [post_date]  By [post_author_posts_link]  &middot;  <span class="twitter-share-button"><a href="' . htmlspecialchars( $twitter_url ) . '" class="twitter-share-button">Tweet</a></span></div>';
}
**/
