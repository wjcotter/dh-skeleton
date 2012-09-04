<?php
/**
 * Template Name: WPM Resource Archives
 */
 
remove_action( 'genesis_loop', 'genesis_do_loop' );
 
add_action( 'genesis_loop', 'wpm_resources' );
function wpm_resources() {  ?>
 
        <h2 class="entry-title"><?php _e('Wired Project Management Resources', 'genesis'); ?></h2>
		
		
		
		
		<div class="entry-content">
		
		<p>From time to time I find myself looking for code that I can use when building themes. I'm guessing you have the same problem, so feel free to use what you see.</p>
        <p>Below is a list of best practices when coding for the Genesis Framework:</p>
				
				
				
    <div class="cpt"><h4><?php _e('Process Resources', 'genesis'); ?></h4></div>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'process-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			 
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;?>
        </ul>
		
		<div class="cpt"><h4><?php _e('Content Resources', 'genesis'); ?></h4></div>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'content-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;?>
        </ul>
		
		<div class="cpt"><h4><?php _e('Design Resources', 'genesis'); ?></h4></div>
        <ul>
            <?php $recent = new WP_Query( array( 'post_type' => 'design-resources', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 10 ) ); while($recent->have_posts()) : $recent->the_post();?>
			
			 
           <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile;?>
        </ul>
		
		
		
		
		</div><!-- end .entry-content -->

<?php
}
genesis();