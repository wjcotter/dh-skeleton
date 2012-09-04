<?php
/**
 * Template Name: Wiredpm's Resource Archives
 */
 
remove_action( 'genesis_loop', 'genesis_do_loop' );
 
add_action( 'genesis_loop', 'wjc_resources' );
function wjc_resources() {  ?>
 
        <h2 class="entry-title"><?php _e('Wired Project Management Resources', 'genesis'); ?></h2>
		
		
		
		
		<div class="entry-content">
		
		<p>I'm always looking for code that I can use when building themes. I'm guessing you have the same problem, so feel free to use what you see.</p>
        <p>Below is a list of best practices when coding for the Genesis Framework:</p>
				
			
		
		<h4><?php _e('Process Resources', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'process-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
		   
		  <?php

?>
		   
            <?php endwhile;?>
			
        </ul>
		
		
		
		<h4><?php _e('Content Resources', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'content-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;?>
        </ul>
		
		<h4><?php _e('Dev Resources', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'dev-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;?>
        </ul>
		
		
		<h4><?php _e('Design Resources', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'design-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;?>
        </ul>
		
		
		<h4><?php _e('UX|UI Resources', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'ux-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;?>
        </ul>
		
		
		
		
		
		
		</div><!-- end .entry-content -->

<?php
}
genesis();