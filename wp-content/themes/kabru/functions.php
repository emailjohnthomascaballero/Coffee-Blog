<?php

// Theme Support

if ( ! function_exists( 'kabru_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @return void
     */
    function kabru_setup() {
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );
        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );
        // Add support for editor styles.
        add_theme_support( 'editor-styles' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
        // Add support for experimental link color control.
        add_theme_support( 'experimental-link-color' );
        // Add support for custom units.
        add_theme_support( 'custom-units' );

	    add_editor_style( 'style.css' );
    }
}
add_action( 'after_setup_theme', 'kabru_setup' );

/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLESHEETS
--------------------------------------------------------------------------------------------------- */

function kabru_styles() {

	wp_enqueue_style( 'kabru-styles', get_theme_file_uri( '/style.css' ), array(), wp_get_theme( 'kabru' )->get( 'Version' ) );

}
add_action( 'wp_enqueue_scripts', 'kabru_styles' );

/*	-----------------------------------------------------------------------------------------------
	BLOCK PATTERN CATEGORIES
	Register theme specific block pattern categories. The patterns themselves are stored in /patterns/.
--------------------------------------------------------------------------------------------------- */

function kabru_register_block_patterns() {

	register_block_pattern_category( 'kabru', array(
		'label'		=> esc_html__( 'Kabru Patterns', 'kabru' ),
	) );

}
add_action( 'init', 'kabru_register_block_patterns' );


/**
 * Register block styles.
 *
 * @since 1.0.0
 */
function kabru_register_block_styles()
{
    $block_styles = array(
        'core/button' => array(
            'no-outline'        => esc_html__('No Outline', 'kabru'),
            'drop-shadow'      => esc_html__('Drop Shadow', 'kabru'),
            'rounded-drop-shadow'        => esc_html__('Rounded Drop Shadow', 'kabru'),
            'rounded'            => esc_html__('Rounded', 'kabru'),
        ),
    ); 

    foreach ($block_styles as $block => $styles) {
        foreach ($styles as $style_name => $style_label) {
            register_block_style(
                $block,
                array(
                    'name'  => $style_name,
                    'label' => $style_label,
                )
            );
        }
    }

}

add_action('init', 'kabru_register_block_styles');

