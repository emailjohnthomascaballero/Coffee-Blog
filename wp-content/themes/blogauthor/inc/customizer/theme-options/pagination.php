<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'blogauthor' ),
        'panel' => 'blogauthor_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'blogauthor_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'blogauthor' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'blogauthor' ),
            'numeric' => __( 'Numeric', 'blogauthor' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'blogauthor' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'blogauthor' ),
        ),
    )
);
