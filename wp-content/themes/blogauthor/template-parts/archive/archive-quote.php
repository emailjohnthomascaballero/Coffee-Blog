<?php
/**
 * Show the appropriate content for the Quote post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogauthor
 * @since Blogauthor 1.0.0
 */


$content = get_the_content();

// If there is no quote or pullquote print the content.
if ( has_block( 'core/quote', $content ) ) {
	blogauthor_print_first_instance_of_block( 'core/quote', $content );
} elseif ( has_block( 'core/pullquote', $content ) ) {
	blogauthor_print_first_instance_of_block( 'core/pullquote', $content );
} else {
    if ( absint(blogauthor_get_option( 'excerpt_length' )) != '0'){
	   the_excerpt();
    }
}