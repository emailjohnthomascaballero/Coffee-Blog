<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogauthor
 */

?>
<!doctype html>
<html <?php language_attributes(); blogauthor_force_dark_mode();?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'blogauthor_before_site' ); ?>

<div id="page" class="site">

    <?php get_template_part( 'template-parts/header/loader' ); ?>

    <?php $ed_header_ad = blogauthor_get_option( 'ed_header_ad' );
    if ($ed_header_ad) {
        get_template_part( 'template-parts/header/welcome-screen-banner' );
    } ?>

    <?php get_template_part( 'template-parts/header/progressbar' ); ?>

    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'blogauthor'); ?></a>

    <div class="site-content-area">

    <?php do_action( 'blogauthor_before_header' ); ?>

    <?php get_template_part('template-parts/header/theme-header'); ?>

    <div class="main-page-wrapper">
    <?php do_action( 'blogauthor_before_content' ); ?>

    <?php $is_banner_section = blogauthor_get_option('enable_banner_section');
    if ($is_banner_section && (is_home() || is_front_page()) && !is_paged()) {
        get_template_part('template-parts/front-page/banner-section');
        get_template_part('template-parts/front-page/about-section');
        get_template_part('template-parts/front-page/categories-section');
    }

