<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'blogauthor' ),
        'panel' => 'blogauthor_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'blogauthor_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'blogauthor' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogauthor_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'blogauthor' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'blogauthor' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'blogauthor' ),
            'theme-preloader-spinner-3' => __( 'Style 3', 'blogauthor' ),
            'theme-preloader-spinner-4' => __( 'Style 4', 'blogauthor' ),
        ),
        'active_callback' => 'blogauthor_is_show_preloader',

    )
);
