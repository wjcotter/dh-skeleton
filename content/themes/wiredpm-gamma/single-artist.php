<?php
/*
 * Template Name: Artist
 * This template displays Artist Details
 */

add_action('genesis_before_post_content', 'child_get_artists_field'); //display meta-box content after the content

//Function to show the content
function child_get_artists_field() {
        echo '<hr><strong>Artist: '. genesis_get_custom_field( '_cmb_ds_artist_name' ) .'</strong>';
		echo '<p><strong>Website: </strong><em>'. genesis_get_custom_field( '_cmb_ds_artist_website' ) .'</em></p>';
				echo '<p><strong>Media:</strong><em> '. genesis_get_custom_field( '_cmb_ds_artist_media' ) .'</em></p>';
						echo '<p>'. genesis_get_custom_field( '_cmb_ds_artist_bio' ) .'</p><hr>';
}

/** Add the after post section */
add_action( 'genesis_after_post_content', 'eleven40_after_artist' );
function eleven40_after_artist() {
   if ( ! is_singular(array( 'artist' ) ) )
       return;
   genesis_widget_area( 'after-post', array(
       'before' => '<div class="after-post widget-area">',
   ) );

}

 
genesis(); // requires Genesis 1.3+  
