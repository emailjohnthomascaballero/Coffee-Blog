<?php
/**
 * Displays progressbar
 *
 * @package Blogauthor
 */

$show_progressbar = blogauthor_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = blogauthor_get_option( 'progressbar_position' );
	echo '<div id="blogauthor-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
