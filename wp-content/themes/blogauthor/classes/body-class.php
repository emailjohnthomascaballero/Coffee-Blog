<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blogauthor_body_classes( $classes ) {
    global $post;
    $post_type = "";
    if (!empty($post)) {
        $post_type = get_post_type($post->ID);
    }
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    $enable_always_dark_mode = blogauthor_get_option('enable_always_dark_mode');
    if ($enable_always_dark_mode) {
        $classes[] = ' blogauthor-force-dark';
    }

    $header_style = blogauthor_get_option('header_style');
    $enable_fix_navigation_area = blogauthor_get_option( 'enable_fix_navigation_area'); 
    if ($enable_fix_navigation_area) {
        $classes[] = 'header-style-aside-fixed';
    }
    $classes[] = ' blogauthor-'.$header_style;

    if ($header_style == 'header_style_1') {
        $classes[] = 'header-style-aside';
    }
    // Get the color mode of the site.
    $enable_dark_mode = blogauthor_get_option( 'enable_dark_mode' );
    if ( $enable_dark_mode ) {
        $classes[] = 'blogauthor-dark-mode';
    } else {
        $classes[] = 'blogauthor-light-mode';
    }
    if ($post_type == 'product') {
        if ( ! is_active_sidebar( 'shop-sidebar' ) ) {
            $classes[] = 'no-sidebar';
        } else {
            $page_layout = blogauthor_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }
        }
    } else {
        if ($post_type != 'page') { 
        	$page_layout = blogauthor_get_page_layout();
            if('no-sidebar' != $page_layout ){
                $classes[] = 'has-sidebar '.esc_attr($page_layout);
            }else{

                $classes[] = esc_attr($page_layout);
            }
        }
    }


	return $classes;
}
add_filter( 'body_class', 'blogauthor_body_classes' );
