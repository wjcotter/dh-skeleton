<?php

/*
 * Template Name: Book Review
 * This template displays Book Review Details
 */

add_action('genesis_before_post_content', 'child_get_book_review_field'); //display meta-box content after the content

//Function to show the content
function child_get_book_review_field() {
        echo '<hr><strong>Title: '. genesis_get_custom_field( 'book_title' ) .'</strong>';
		echo '<p><strong>Author: </strong><em>'. genesis_get_custom_field( 'book_author' ) .'</em></p>';
				echo '<p><strong>Amazon Link:</strong><em> '. genesis_get_custom_field( 'book_website' ) .'</em></p><hr>';
						//echo '<p>'. genesis_get_custom_field( '_cmb_ds_artist_bio' ) .'</p><hr>';
}

/** Add the after post section */
add_action( 'genesis_after_post_content', 'eleven40_after_book_review' );
function eleven40_after_book_review() {
   if ( ! is_singular(array( 'book_review' ) ) )
       return;
   genesis_widget_area( 'after-post', array(
       'before' => '<div class="after-post widget-area">',
   ) );

}

 
genesis(); // requires Genesis 1.3+  