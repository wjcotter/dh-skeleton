<?php
/**
 * Template Name: Archives
 */
 
 remove_action( 'genesis_loop', 'genesis_do_loop' );
 add_action( 'genesis_loop', 'custom_archives' );
function custom_archives() {  ?>

<h1 class="entry-title"><?php _e('WIREDPM Archives', 'genesis'); ?></h1>
<div class="entry-content">
    <p><?php _e('Interested in what I have to say by category?  Well you can search below...', 'genesis'); ?></p>
    <h4><?php _e('Theory', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query("cat=12&showposts=20"); while($recent->have_posts()) : $recent->the_post();?>
            <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> | <?php the_date(); ?></li>
            <?php endwhile;?>
        </ul>
		
		
		<h4><?php _e('Technique', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query("cat=17&showposts=20"); while($recent->have_posts()) : $recent->the_post();?>
            <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> | <?php the_date(); ?></li>
            <?php endwhile;?>
        </ul>
		
		<h4><?php _e('Toolbox', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query("cat=15&showposts=20"); while($recent->have_posts()) : $recent->the_post();?>
            <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> | <?php the_date(); ?></li>
            <?php endwhile;?>
        </ul>
		
		<h4><?php _e('Inspiration', 'genesis'); ?></h4>
        <ul>
            <?php $recent = new WP_Query("cat=6&showposts=20"); while($recent->have_posts()) : $recent->the_post();?>
            <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> | <?php the_date(); ?></li>
            <?php endwhile;?>
        </ul>
		
</div><!-- end .entry-content -->

<?php
}
genesis();