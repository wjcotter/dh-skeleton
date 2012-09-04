<?php
/**
 * Template Name: Test
*/

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'custom_do_loop');
function custom_do_loop() {
     global $paged;
    $args = array('post_type' => 'test');
        //$args = array('post_type' => 'books');
 
    genesis_custom_loop( $args );
 }
genesis();

