<?php
/**
 * Template Name: Archives
 */
 
 remove_action( 'genesis_loop', 'genesis_do_loop' );
 add_action( 'genesis_loop', 'custom_archives' );
function custom_archives() {  ?>

<h2 class="entry-title"><?php _e("Wired Project Management's Archives", 'genesis'); ?></h2>
<div class="entry-content">
    
    <h4><?php _e('Process', 'genesis'); ?></h4>
        
		
</div><!-- end .entry-content -->

<?php
}
genesis();