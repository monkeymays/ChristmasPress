<?php
/**
 * @package ChristmasPress
 * @since ChristmasPress 1.0
 */


function christmaspress_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'christmaspress_page_menu_args' );
 

function christmaspress_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }
 
    return $classes;
}
add_filter( 'body_class', 'christmaspress_body_classes' );
 

function christmaspress_enhanced_image_navigation( $url, $id ) {
    if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
        return $url;
 
    $image = get_post( $id );
    if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
        $url .= '#main';
 
    return $url;
}
add_filter( 'attachment_link', 'christmaspress_enhanced_image_navigation', 10, 2 );