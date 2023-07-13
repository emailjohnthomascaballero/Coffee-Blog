<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogauthor
 * @since Blogauthor 1.0.0
 */
if ( absint(blogauthor_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}